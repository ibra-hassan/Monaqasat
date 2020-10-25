<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\RequiredDoc;
use App\Models\Tender;
use App\Models\TenderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TenderController extends Controller
{
    public function index2()
    {
        $rows = Tender::all();
        return view('admin.tenders.index', compact('rows'));
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('tender_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Tender::query()->select(sprintf('%s.*', (new Tender)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'tender_show';
                $editGate      = 'tender_edit';
                $deleteGate    = 'tender_delete';
                $crudRoutePart = 'tenders';

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
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : "";
            });
            $table->editColumn('project_name', function ($row) {
                return $row->project ? $row->project->name : "";
            });
            $table->rawColumns(['actions', 'placeholder']);
            return $table->make(true);
        }
        $rows = Tender::where('tender_status_id', 4)->orderBy('name')->get();
        return view('admin.tenders.index', compact('rows'));
    }

    public function create()
    {
        abort_if(Gate::denies('tender_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $projects      = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $required_docs = RequiredDoc::all()->pluck('title', 'id');
        return view('admin.tenders.create', compact('projects', 'required_docs'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('tender_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'name'       => [
                'string',
                'min:4',
                'max:25',
                'required',
                'unique:tenders'
            ],
            'code'       => [
                'string',
                'min:4',
                'max:100',
            ],
            'project_id' => [
                'required',
                'integer',
            ],
        ]);
        $tender = Tender::create($request->all());
        if ($request->hasFile('file_path')) {
            $tender->file_path = $this->storeFile($request);
            $tender->save();
        }
        return redirect()->route('admin.tenders.index');
    }

    public function show(Tender $tender)
    {
        abort_if(Gate::denies('tender_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.tenders.show', compact('tender'));
    }

    public function edit(Tender $tender)
    {
        abort_if(Gate::denies('tender_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $projects      = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $required_docs = RequiredDoc::all()->pluck('title', 'id');
        return view('admin.tenders.edit', compact('tender', 'projects', 'required_docs'));
    }

    public function update(Request $request, Tender $tender)
    {
        $request->validate([
            'name'       => [
                'string',
                'min:4',
                'max:25',
                'required',
                'unique:tenders,name,' . $tender->id,
            ],
            'code'       => [
                'string',
                'min:4',
                'max:100',
            ],
            'project_id' => [
                'required',
                'integer',
                'unique:tenders,project_id,' . $tender->id,
            ],
        ]);
        $tender->update($request->except(['file_path']));
        if ($request->hasFile('file_path')) {
            $tender->file_path = $this->storeFile($request);
            $tender->save();
        }
        return redirect()->route('admin.tenders.index');
    }

    public function destroy(Tender $tender)
    {
        abort_if(Gate::denies('tender_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tender->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('tender_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'ids'   => ['required', 'array'],
            'ids.*' => ['exists:tenders,id'],
        ]);
        Tender::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    protected function storeFile(Request $request)
    {
        $file_path = $request->file('file_path')->store('public/tenders');
        return substr($file_path, strlen('public/'));
    }

    public function announcement($id)
    {
        abort_if(Gate::denies('ad_tender'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tender = Tender::findOrFail($id);
        if ($tender->ad == null) {
            return redirect()->route('admin.tenders.edit', $tender->id)
                ->with('error', 'خطأ...، الرجاء إدخال نص المناقصة اولاً');
        } else {
            $tender->status()->associate(TenderStatus::findOrFail(3));
            $tender->save();
        }
        return redirect()->route('admin.tenders.index')->with('message', 'تم الأعلان عن المناقصة');
    }
}
