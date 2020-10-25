<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyProjectNatureRequest;
use App\Http\Requests\Admin\StoreProjectNatureRequest;
use App\Http\Requests\Admin\UpdateProjectNatureRequest;
use App\Models\ProjectNature;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProjectNaturesController extends Controller
{
	public function index(Request $request)
	{
		abort_if(Gate::denies('project_nature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		if ($request->ajax()) {
			$query = ProjectNature::query()->select(sprintf('%s.*', (new ProjectNature)->table));
			$table = Datatables::of($query);

			$table->addColumn('placeholder', '&nbsp;');
			$table->addColumn('actions', '&nbsp;');

			$table->editColumn('actions', function ($row) {
				$viewGate      = 'project_nature_show';
				$editGate      = 'project_nature_edit';
				$deleteGate    = 'project_nature_delete';
				$crudRoutePart = 'project-natures';

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

		return view('admin.projectNatures.index');
	}

	public function create()
	{
		abort_if(Gate::denies('project_nature_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return view('admin.projectNatures.create');
	}

	public function store(StoreProjectNatureRequest $request)
	{
		$projectNature = ProjectNature::create($request->all());

		return redirect()->route('admin.project-natures.index');
	}

	public function edit(ProjectNature $projectNature)
	{
		abort_if(Gate::denies('project_nature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return view('admin.projectNatures.edit', compact('projectNature'));
	}

	public function update(UpdateProjectNatureRequest $request, ProjectNature $projectNature)
	{
		$projectNature->update($request->all());

		return redirect()->route('admin.project-natures.index');
	}

	public function show(ProjectNature $projectNature)
	{
		abort_if(Gate::denies('project_nature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$projectNature->load('natureprojects');

		return view('admin.projectNatures.show', compact('projectNature'));
	}

	public function destroy(ProjectNature $projectNature)
	{
		abort_if(Gate::denies('project_nature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$projectNature->delete();

		return back();
	}

	public function massDestroy(MassDestroyProjectNatureRequest $request)
	{
		ProjectNature::whereIn('id', request('ids'))->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
