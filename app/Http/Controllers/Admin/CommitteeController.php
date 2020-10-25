<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CommitteeController extends Controller
{

    public function index(Request $request)
    {
        abort_if(Gate::denies('committee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Committee::query()->select(sprintf('%s.*', (new Committee)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'committee_show';
                $editGate      = 'committee_edit';
                $deleteGate    = 'committee_delete';
                $crudRoutePart = 'committees';

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
            $table->editColumn('project_name', function ($row) {
                return $row->project ? $row->project->name : "";
            });
            $table->editColumn('president_name', function ($row) {
                return $row->president ? $row->president->name : "";
            });
            $table->rawColumns(['actions', 'placeholder']);
            return $table->make(true);
        }
        return view('admin.committees.index');
    }

    public function create()
    {
        abort_if(Gate::denies('committee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $projects   = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $presidents = CommitteeMember::query()->where('is_president', '=', false)
                                     ->get()->pluck('name', 'id')
                                     ->prepend(trans('global.pleaseSelect'), '');
        return view('admin.committees.create', compact('projects', 'presidents'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('committee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
                               'name'       => ['string',
                                                'min:4',
                                                'max:50',
                                                'required',
                                                'unique:committees'],
                               'project_id' => ['required',
                                                'integer'],
                           ]);
        Committee::create($request->all());
        return redirect()->route('admin.committees.index');
    }

    public function show(Committee $committee)
    {
        abort_if(Gate::denies('committee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.committees.show', compact('committee'));
    }

    public function edit(Committee $committee)
    {
        abort_if(Gate::denies('committee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $projects   = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $presidents = CommitteeMember::query()->where('is_president', '=', false)
                                     ->get()->pluck('name', 'id');
        if ($committee->president()->exists()) {
            $presidents->prepend($committee->president->name, $committee->president->id);
        }
        $presidents->prepend(trans('global.pleaseSelect'), '');
        return view('admin.committees.edit', compact('committee', 'projects', 'presidents'));
    }

    public function update(Request $request, Committee $committee)
    {
        $request->validate([
                               'name'       => ['string',
                                                'min:4',
                                                'max:50',
                                                'required',
                                                'unique:committees,name,' . $committee->id,],
                               'project_id' => ['required',
                                                'integer'],
                           ]);
        if ($committee->president()->exists()) {
            if ($committee->president->id != $request->input('president_id')) {
                $committee->president->is_president = false;
                $committee->president->save();
                $committee->update($request->all());
                $committee->president()->associate(CommitteeMember::findOrFail($request->input('president_id')));
                $committee->president->is_president = true;
                $committee->president->save();
            }
            else {
                $committee->update($request->all());
            }
        }
        return redirect()->route('admin.committees.index');
    }

    public function destroy(Committee $committee)
    {
        abort_if(Gate::denies('committee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $committee->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('committee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
                               'ids'   => ['required', 'array'],
                               'ids.*' => ['exists:committees,id'],
                           ]);
        Committee::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
