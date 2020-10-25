<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyGovernorAgentRequest;
use App\Http\Requests\Admin\StoreGovernorAgentRequest;
use App\Http\Requests\Admin\UpdateGovernorAgentRequest;
use App\Models\Governor;
use App\Models\GovernorAgent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GovernorAgentsController extends Controller
{
	public function index(Request $request)
	{
		abort_if(Gate::denies('governor_agent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		if ($request->ajax()) {
			$query = GovernorAgent::with(['governor'])->select(sprintf('%s.*', (new GovernorAgent)->table));
			$table = Datatables::of($query);

			$table->addColumn('placeholder', '&nbsp;');
			$table->addColumn('actions', '&nbsp;');

			$table->editColumn('actions', function ($row) {
				$viewGate      = 'governor_agent_show';
				$editGate      = 'governor_agent_edit';
				$deleteGate    = 'governor_agent_delete';
				$crudRoutePart = 'governor-agents';

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
			$table->addColumn('governor_name', function ($row) {
				return $row->governor ? $row->governor->name : '';
			});

			$table->rawColumns(['actions', 'placeholder', 'governor']);

			return $table->make(true);
		}

		return view('admin.governorAgents.index');
	}

	public function create()
	{
		abort_if(Gate::denies('governor_agent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$governors = Governor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

		return view('admin.governorAgents.create', compact('governors'));
	}

	public function store(StoreGovernorAgentRequest $request)
	{
		$governorAgent = GovernorAgent::create($request->all());

		return redirect()->route('admin.governor-agents.index');
	}

	public function edit(GovernorAgent $governorAgent)
	{
		abort_if(Gate::denies('governor_agent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$governors = Governor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

		$governorAgent->load('governor');

		return view('admin.governorAgents.edit', compact('governors', 'governorAgent'));
	}

	public function update(UpdateGovernorAgentRequest $request, GovernorAgent $governorAgent)
	{
		$governorAgent->update($request->all());

		return redirect()->route('admin.governor-agents.index');
	}

	public function show(GovernorAgent $governorAgent)
	{
		abort_if(Gate::denies('governor_agent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$governorAgent->load('governor');

		return view('admin.governorAgents.show', compact('governorAgent'));
	}

	public function destroy(GovernorAgent $governorAgent)
	{
		abort_if(Gate::denies('governor_agent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$governorAgent->delete();

		return back();
	}

	public function massDestroy(MassDestroyGovernorAgentRequest $request)
	{
		GovernorAgent::whereIn('id', request('ids'))->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
