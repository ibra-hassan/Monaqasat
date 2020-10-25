<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyGovernorRequest;
use App\Http\Requests\Admin\StoreGovernorRequest;
use App\Http\Requests\Admin\UpdateGovernorRequest;
use App\Models\Governor;
use App\Models\Province;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GovernorsController extends Controller
{
	public function index(Request $request)
	{
		abort_if(Gate::denies('governor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		if ($request->ajax()) {
			$query = Governor::with(['province'])->select(sprintf('%s.*', (new Governor)->table));
			$table = Datatables::of($query);

			$table->addColumn('placeholder', '&nbsp;');
			$table->addColumn('actions', '&nbsp;');

			$table->editColumn('actions', function ($row) {
				$viewGate      = 'governor_show';
				$editGate      = 'governor_edit';
				$deleteGate    = 'governor_delete';
				$crudRoutePart = 'governors';

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

		return view('admin.governors.index');
	}

	public function create()
	{
		abort_if(Gate::denies('governor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$provinces = Province::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

		return view('admin.governors.create', compact('provinces'));
	}

	public function store(StoreGovernorRequest $request)
	{
		$governor = Governor::create($request->all());

		return redirect()->route('admin.governors.index');
	}

	public function edit(Governor $governor)
	{
		abort_if(Gate::denies('governor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$provinces = Province::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

		$governor->load('province');

		return view('admin.governors.edit', compact('provinces', 'governor'));
	}

	public function update(UpdateGovernorRequest $request, Governor $governor)
	{
		$governor->update($request->all());

		return redirect()->route('admin.governors.index');
	}

	public function show(Governor $governor)
	{
		abort_if(Gate::denies('governor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$governor->load('province', 'governorGovernorAgents');

		return view('admin.governors.show', compact('governor'));
	}

	public function destroy(Governor $governor)
	{
		abort_if(Gate::denies('governor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$governor->delete();

		return back();
	}

	public function massDestroy(MassDestroyGovernorRequest $request)
	{
		Governor::whereIn('id', request('ids'))->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
