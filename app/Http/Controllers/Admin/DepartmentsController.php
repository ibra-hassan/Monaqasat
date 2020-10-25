<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyDepartmentRequest;
use App\Http\Requests\Admin\StoreDepartmentRequest;
use App\Http\Requests\Admin\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\GeneralManager;
use App\Models\Province;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DepartmentsController extends Controller
{
	public function index(Request $request)
	{
		abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		if ($request->ajax()) {
			$query = Department::with(['province'])->select(sprintf('%s.*', (new Department)->table));
			$table = Datatables::of($query);

			$table->addColumn('placeholder', '&nbsp;');
			$table->addColumn('actions', '&nbsp;');

			$table->editColumn('actions', function ($row) {
				$viewGate      = 'department_show';
				$editGate      = 'department_edit';
				$deleteGate    = 'department_delete';
				$crudRoutePart = 'departments';

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
			$table->addColumn('province_name', function ($row) {
				return $row->province ? $row->province->name : '';
			});

			$table->rawColumns(['actions', 'placeholder', 'province']);

			return $table->make(true);
		}

		return view('admin.departments.index');
	}

	public function create()
	{
		abort_if(Gate::denies('department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$provinces = Province::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
		$managers  = GeneralManager::where('manageable_type', 'Null')->pluck('name', 'id')
								   ->prepend(trans('global.pleaseSelect'), '');

		return view('admin.departments.create', compact('provinces', 'managers'));
	}

	public function store(StoreDepartmentRequest $request)
	{
		$department = Department::create($request->only(['name', 'phone', 'province_id']));
		$manager    = GeneralManager::FindOrFail($request->get('manager_id'))->update([
																						  'manageable_id'   => $department->id,
																						  'manageable_type' => 'App\Models\Department'
																					  ]);

		return redirect()->route('admin.departments.index');
	}

	public function edit(Department $department)
	{
		abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$provinces = Province::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
		$managers  = GeneralManager::where('manageable_type', 'Null')->pluck('name', 'id');
		$managers->prepend($department->manager->name, $department->manager->id);
		$managers->prepend(trans('global.pleaseSelect'), '');

		$department->load('province', 'manager');

		return view('admin.departments.edit', compact('provinces', 'department', 'managers'));
	}

	public function update(UpdateDepartmentRequest $request, Department $department)
	{
		if ($department->manager->id != $request->get('manager_id')) {
			$old_manager = GeneralManager::where('manageable_id', $department->id)
										 ->where('manageable_type', 'App\Models\Department')->first()->update([
																												  'manageable_id'   => 0,
																												  'manageable_type' => 'Null'
																											  ]);
		}
		$department->update($request->only(['name', 'phone', 'province_id']));
		$manager = GeneralManager::FindOrFail($request->get('manager_id'))->update([
																					   'manageable_id'   => $department->id,
																					   'manageable_type' => 'App\Models\Department'
																				   ]);

		return redirect()->route('admin.departments.index');
	}

	public function show(Department $department)
	{
		abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$department->load('province');

		return view('admin.departments.show', compact('department'));
	}

	public function destroy(Department $department)
	{
		abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$department->delete();

		return back();
	}

	public function massDestroy(MassDestroyDepartmentRequest $request)
	{
		Department::whereIn('id', request('ids'))->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
