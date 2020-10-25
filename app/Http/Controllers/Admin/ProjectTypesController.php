<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyProjectTypeRequest;
use App\Http\Requests\Admin\StoreProjectTypeRequest;
use App\Http\Requests\Admin\UpdateProjectTypeRequest;
use App\Models\ProjectType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProjectTypesController extends Controller
{
	public function index(Request $request)
	{
		abort_if(Gate::denies('project_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		if ($request->ajax()) {
			$query = ProjectType::query()->select(sprintf('%s.*', (new ProjectType)->table));
			$table = Datatables::of($query);

			$table->addColumn('placeholder', '&nbsp;');
			$table->addColumn('actions', '&nbsp;');

			$table->editColumn('actions', function ($row) {
				$viewGate      = 'project_type_show';
				$editGate      = 'project_type_edit';
				$deleteGate    = 'project_type_delete';
				$crudRoutePart = 'project-types';

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
			$table->editColumn('title', function ($row) {
				return $row->title ? $row->title : "";
			});

			$table->rawColumns(['actions', 'placeholder']);

			return $table->make(true);
		}

		return view('admin.projectTypes.index');
	}

	public function create()
	{
		abort_if(Gate::denies('project_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return view('admin.projectTypes.create');
	}

	public function store(StoreProjectTypeRequest $request)
	{
		$projectType = ProjectType::create($request->all());

		return redirect()->route('admin.project-types.index');
	}

	public function edit(ProjectType $projectType)
	{
		abort_if(Gate::denies('project_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return view('admin.projectTypes.edit', compact('projectType'));
	}

	public function update(UpdateProjectTypeRequest $request, ProjectType $projectType)
	{
		$projectType->update($request->all());

		return redirect()->route('admin.project-types.index');
	}

	public function show(ProjectType $projectType)
	{
		abort_if(Gate::denies('project_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$projectType->load('typeprojects');

		return view('admin.projectTypes.show', compact('projectType'));
	}

	public function destroy(ProjectType $projectType)
	{
		abort_if(Gate::denies('project_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$projectType->delete();

		return back();
	}

	public function massDestroy(MassDestroyProjectTypeRequest $request)
	{
		ProjectType::whereIn('id', request('ids'))->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
