<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QuantityController extends Controller
{


    public function index(Request $request)
    {
        abort_if(Gate::denies('quantity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Quantity::query()->select(sprintf('%s.*', (new Quantity)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'quantity_show';
                $editGate      = 'quantity_edit';
                $deleteGate    = 'quantity_delete';
                $crudRoutePart = 'quantities';

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
            $table->editColumn('tender_code', function ($row) {
                return $row->render ? $row->tender->code : "";
            });
            $table->editColumn('tender_name', function ($row) {
                return $row->render ? $row->tender->name : "";
            });
            $table->rawColumns(['actions', 'placeholder']);
            return $table->make(true);
        }
        return view('admin.quantities.index');
    }

    public function create()
    {
        abort_if(Gate::denies('quantity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.quantities.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('quantity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
                               'title'       => ['string',
                                                 'min:4',
                                                 'max:25',
                                                 'required',
                                                 'unique:quantities'],
                               'description' => ['string',
                                                 'min:4',
                                                 'max:100',],
                           ]);
        Quantity::create($request->only(['title', 'description']));
        return redirect()->route('admin.quantities.index');
    }

    public function show(Quantity $quantity)
    {
        abort_if(Gate::denies('quantity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.quantities.show', compact('quantity'));
    }

    public function edit(Quantity $quantity)
    {
        abort_if(Gate::denies('quantity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.quantities.edit', compact('quantity'));
    }

    public function update(Request $request, Quantity $quantity)
    {
        $request->validate([
                               'title'       => ['string',
                                                 'min:4',
                                                 'max:25',
                                                 'required',
                                                 'unique:quantities,title,' . $quantity->id,],
                               'description' => ['string',
                                                 'min:4',
                                                 'max:100',],
                           ]);
        $quantity->update($request->only(['title', 'description']));
        return redirect()->route('admin.quantities.index');
    }

    public function destroy(Quantity $quantity)
    {
        abort_if(Gate::denies('quantity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $quantity->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('quantity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
                               'ids'   => ['required', 'array'],
                               'ids.*' => ['exists:quantities,id'],
                           ]);
        Quantity::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
