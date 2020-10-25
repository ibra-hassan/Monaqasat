<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyGeneralManagerRequest;
use App\Http\Requests\Admin\StoreGeneralManagerRequest;
use App\Http\Requests\Admin\UpdateGeneralManagerRequest;
use App\Models\GeneralManager;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GeneralManagersController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('general_manager_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GeneralManager::query()->select(sprintf('%s.*', (new GeneralManager)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'general_manager_show';
                $editGate      = 'general_manager_edit';
                $deleteGate    = 'general_manager_delete';
                $crudRoutePart = 'general-managers';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.generalManagers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('general_manager_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalManagers.create');
    }

    public function store(StoreGeneralManagerRequest $request)
    {
        $generalManager = GeneralManager::create($request->all());

        return redirect()->route('admin.general-managers.index');
    }

    public function edit(GeneralManager $generalManager)
    {
        abort_if(Gate::denies('general_manager_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalManagers.edit', compact('generalManager'));
    }

    public function update(UpdateGeneralManagerRequest $request, GeneralManager $generalManager)
    {
        $generalManager->update($request->all());

        return redirect()->route('admin.general-managers.index');
    }

    public function show(GeneralManager $generalManager)
    {
        abort_if(Gate::denies('general_manager_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalManagers.show', compact('generalManager'));
    }

    public function destroy(GeneralManager $generalManager)
    {
        abort_if(Gate::denies('general_manager_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $generalManager->delete();

        return back();
    }

    public function massDestroy(MassDestroyGeneralManagerRequest $request)
    {
        GeneralManager::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
