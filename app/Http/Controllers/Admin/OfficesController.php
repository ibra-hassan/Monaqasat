<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyOfficeRequest;
use App\Http\Requests\Admin\StoreOfficeRequest;
use App\Http\Requests\Admin\UpdateOfficeRequest;
use App\Models\Directorate;
use App\Models\GeneralManager;
use App\Models\Office;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OfficesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('office_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Office::with(['directorate'])->select(sprintf('%s.*', (new Office)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'office_show';
                $editGate      = 'office_edit';
                $deleteGate    = 'office_delete';
                $crudRoutePart = 'offices';

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
            $table->addColumn('directorate_name', function ($row) {
                return $row->directorate ? $row->directorate->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'directorate']);

            return $table->make(true);
        }

        return view('admin.offices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('office_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorates = Directorate::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $managers     = GeneralManager::where('manageable_type', 'Null')->pluck('name', 'id')
                                      ->prepend(trans('global.pleaseSelect'), '');

        return view('admin.offices.create', compact('directorates', 'managers'));
    }

    public function store(StoreOfficeRequest $request)
    {
        $office  = Office::create($request->only(['name', 'phone', 'directorate_id']));
        $manager = GeneralManager::FindOrFail($request->get('manager_id'))->update([
                                                                                       'manageable_id'   => $office->id,
                                                                                       'manageable_type' => 'App\Models\Office'
                                                                                   ]);

        return redirect()->route('admin.offices.index');
    }

    public function edit(Office $office)
    {
        abort_if(Gate::denies('office_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directorates = Directorate::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $managers     = GeneralManager::where('manageable_type', 'Null')->pluck('name', 'id');
        $managers->prepend($office->manager->name, $office->manager->id);
        $managers->prepend(trans('global.pleaseSelect'), '');

        $office->load('directorate', 'manager');

        return view('admin.offices.edit', compact('directorates', 'office', 'managers'));
    }

    public function update(UpdateOfficeRequest $request, Office $office)
    {
        if ($office->manager->id != $request->get('manager_id')) {
            $old_manager = GeneralManager::where('manageable_id', $office->id)
                                         ->where('manageable_type', 'App\Models\Office')->first()->update([
                                                                                                              'manageable_id'   => 0,
                                                                                                              'manageable_type' => 'Null'
                                                                                                          ]);
        }
        $office->update($request->only(['name', 'phone', 'directorate_id']));
        $manager = GeneralManager::FindOrFail($request->get('manager_id'))->update([
                                                                                       'manageable_id'   => $office->id,
                                                                                       'manageable_type' => 'App\Models\Office'
                                                                                   ]);

        return redirect()->route('admin.offices.index');
    }

    public function show(Office $office)
    {
        abort_if(Gate::denies('office_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $office->load('directorate');

        return view('admin.offices.show', compact('office'));
    }

    public function destroy(Office $office)
    {
        abort_if(Gate::denies('office_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $office->delete();

        return back();
    }

    public function massDestroy(MassDestroyOfficeRequest $request)
    {
        Office::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
