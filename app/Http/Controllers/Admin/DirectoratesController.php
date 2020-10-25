<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyDirectorateRequest;
use App\Http\Requests\Admin\StoreDirectorateRequest;
use App\Http\Requests\Admin\UpdateDirectorateRequest;
use App\Models\Directorate;
use App\Models\GeneralManager;
use App\Models\Province;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DirectoratesController extends Controller
{
	public function index(Request $request)
	{
		abort_if(Gate::denies('directorate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		if ($request->ajax()) {
			$query = Directorate::with(['province'])->select(sprintf('%s.*', (new Directorate)->table));
			$table = Datatables::of($query);

			$table->addColumn('placeholder', '&nbsp;');
			$table->addColumn('actions', '&nbsp;');

			$table->editColumn('actions', function ($row) {
				$viewGate      = 'directorate_show';
				$editGate      = 'directorate_edit';
				$deleteGate    = 'directorate_delete';
				$crudRoutePart = 'directorates';

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

		return view('admin.directorates.index');
	}

	public function create()
	{
		abort_if(Gate::denies('directorate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$provinces = Province::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
		$managers  = GeneralManager::where('manageable_type', 'Null')->pluck('name', 'id')
								   ->prepend(trans('global.pleaseSelect'), '');

		return view('admin.directorates.create', compact('provinces', 'managers'));
	}

	public function store(StoreDirectorateRequest $request)
	{
		$directorate = Directorate::create($request->only(['name', 'phone', 'province_id']));
		$manager     = GeneralManager::FindOrFail($request->get('manager_id'))->update([
																						   'manageable_id'   => $directorate->id,
																						   'manageable_type' => 'App\Models\Directorate'
																					   ]);

		return redirect()->route('admin.directorates.index');
	}

	public function edit(Directorate $directorate)
	{
		abort_if(Gate::denies('directorate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		$provinces = Province::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
		$managers  = GeneralManager::where('manageable_type', 'Null')->pluck('name', 'id');
		$managers->prepend($directorate->manager->name, $directorate->manager->id);
		$managers->prepend(trans('global.pleaseSelect'), '');
		$directorate->load('province', 'manager');

		return view('admin.directorates.edit', compact('provinces', 'directorate', 'managers'));
	}

	public function update(UpdateDirectorateRequest $request, Directorate $directorate)
	{
		if ($directorate->manager->id != $request->get('manager_id')) {
			$old_manager = GeneralManager::where('manageable_id', $directorate->id)
										 ->where('manageable_type', 'App\Models\Directorate')->first()->update([
																												   'manageable_id'   => 0,
																												   'manageable_type' => 'Null'
																											   ]);
		}
		$directorate->update($request->only(['name', 'phone', 'province_id']));
		$manager = GeneralManager::FindOrFail($request->get('manager_id'))->update([
																					   'manageable_id'   => $directorate->id,
																					   'manageable_type' => 'App\Models\Directorate'
																				   ]);

		return redirect()->route('admin.directorates.index');
	}

	public function show(Directorate $directorate)
	{
		abort_if(Gate::denies('directorate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$directorate->load('province', 'directorateOffices');

		return view('admin.directorates.show', compact('directorate'));
	}

	public function destroy(Directorate $directorate)
	{
		abort_if(Gate::denies('directorate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$directorate->delete();

		return back();
	}

	public function massDestroy(MassDestroyDirectorateRequest $request)
	{
		Directorate::whereIn('id', request('ids'))->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
