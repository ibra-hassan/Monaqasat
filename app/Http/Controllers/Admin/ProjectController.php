<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyProjectRequest;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Models\Directorate;
use App\Models\Project;
use App\Models\ProjectNature;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Project::with(['type', 'nature', 'directorate'])->select(sprintf('%s.*', (new Project)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'project_show';
                $editGate      = 'project_edit';
                $deleteGate    = 'project_delete';
                $crudRoutePart = 'projects';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('target_number', function ($row) {
                return $row->target_number ? $row->target_number : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->editColumn('cost_primary', function ($row) {
                return $row->cost_primary ? $row->cost_primary : "";
            });
            $table->addColumn('type_title', function ($row) {
                return $row->type ? $row->type->title : '';
            });

            $table->addColumn('nature_title', function ($row) {
                return $row->nature ? $row->nature->title : '';
            });

            $table->addColumn('directorate_name', function ($row) {
                return $row->directorate ? $row->directorate->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'type', 'nature']);

            return $table->make(true);
        }

        return view('admin.projects.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types        = ProjectType::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $natures      = ProjectNature::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $directorates = Directorate::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projects.create', compact('types', 'natures', 'directorates'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project            = Project::create($request->except('file_path'));
        $project->file_path = $this->storeFile($request);
        $project->save();

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types        = ProjectType::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $natures      = ProjectNature::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $directorates = Directorate::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project->load('type', 'nature', 'directorate');
        return view('admin.projects.edit', compact('types', 'natures', 'project', 'directorates'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->except('file_path'));
        if ($request->hasFile('file_path')) {
            $project->file_path = $this->storeFile($request);
            $project->save();
        }

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('type', 'nature');

        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    protected function storeFile(Request $request)
    {
        $file_path = $request->file('file_path')->store('public/projects');
        return substr($file_path, strlen('public/'));
    }

    public function acceptable(Request $request)
    {
        abort_if(Gate::denies('accept_project'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rows = Project::where('is_accepted', 0)->orderBy('name')->get();
        return view('admin.projects.acceptable', compact('rows'));
    }

    public function accepted($id)
    {
        $project = Project::findOrFail($id);
        $direc   = $project->directorate;
        if (!$this->calculate_budget($direc, $project)) {
            return redirect()->back()->with('error', 'خطأ، لا توجد ميزانية كافية للموافقة على المشروع');
        }
        $project->is_accepted = 1;
        $project->employee_id = Auth::user()->id;
        $project->save();
        return redirect()->back()->with('message', 'تم الموافقة على المشروع');
    }

    protected function calculate_budget(Directorate $directorate, Project $project)
    {
        $b_project_per_year = $project->cost_primary / $project->estimated_year;
        $old_b              = $directorate->total_budget;
        if ($b_project_per_year < $old_b) {
            $directorate->total_budget = $old_b - $b_project_per_year;
            $directorate->save();
            return 1;
        }
        return 0;
    }
}
