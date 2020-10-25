<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CommitteeMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CommitteeMemberController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('committee_member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CommitteeMember::query()->select(sprintf('%s.*', (new CommitteeMember)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'committee_member_show';
                $editGate      = 'committee_member_edit';
                $deleteGate    = 'committee_member_delete';
                $crudRoutePart = 'committee-members';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->editColumn('committee_name', function ($row) {
                return $row->committee ? $row->committee->name : "";
            });
            $table->rawColumns(['actions', 'placeholder']);
            return $table->make(true);
        }
        return view('admin.committee-members.index');
    }

    public function create()
    {
        abort_if(Gate::denies('committee_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $committees = Committee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.committees.create_member', compact('committees'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('committee_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
                               'name'         => ['string',
                                                  'min:4',
                                                  'max:25',
                                                  'required',
                                                  'unique:committee_members'],
                               'phone'        => ['string',
                                                  'min:4',
                                                  'max:100',],
                               'committee_id' => ['required',
                                                  'integer'],
                           ]);
        if ($request->input('president', false)) {
            $committee = Committee::findOrFail($request->input('committee_id'));
            if (!$committee->president()->exists()) {
                $member = CommitteeMember::create($request->all());
                $committee->president()->associate($member);
                $committee->save();
                $member->is_president = true;
                $member->save();
            }
            else {
                return redirect()->back()->with('error', 'خطأ...، اللجنة لديها رئيس مسبق');
            }
        }
        else {
            CommitteeMember::create($request->all());
        }
        return redirect()->route('admin.committees.index');
    }

    public function show(CommitteeMember $committee_member)
    {
        abort_if(Gate::denies('committee_member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.committees.show_member', compact('committee_member'));
    }

    public function edit(CommitteeMember $committee_member)
    {
        abort_if(Gate::denies('committee_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.committee-members.edit', compact('committee_member'));
    }

    public function update(Request $request, CommitteeMember $committee_member)
    {
        $request->validate([
                               'name'  => ['string',
                                           'min:4',
                                           'max:25',
                                           'required',
                                           'unique:committee_members,name,' . $committee_member->id,],
                               'phone' => ['string',
                                           'min:4',
                                           'max:100',],
                           ]);
        $committee_member->update($request->only(['name', 'phone']));
        return redirect()->route('admin.committee-members.index');
    }

    public function destroy(CommitteeMember $committee_member)
    {
        abort_if(Gate::denies('committee_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $committee_member->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('committee_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
                               'ids'   => ['required', 'array'],
                               'ids.*' => ['exists:committee_members,id'],
                           ]);
        CommitteeMember::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
