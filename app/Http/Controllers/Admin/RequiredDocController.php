<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequiredDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RequiredDocController extends Controller
{

    public function index(Request $request)
    {
        abort_if(Gate::denies('required_doc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RequiredDoc::query()->select(sprintf('%s.*', (new RequiredDoc)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'required_doc_show';
                $editGate      = 'required_doc_edit';
                $deleteGate    = 'required_doc_delete';
                $crudRoutePart = 'required-docs';

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
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->rawColumns(['actions', 'placeholder']);
            return $table->make(true);
        }
        return view('admin.required_docs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('required_doc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.required_docs.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('required_doc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
                               'title'       => ['string',
                                                 'min:4',
                                                 'max:25',
                                                 'required',
                                                 'unique:required_docs'],
                               'description' => ['string',
                                                 'min:4',
                                                 'max:100',],
                           ]);
        RequiredDoc::create($request->only(['title', 'description']));
        return redirect()->route('admin.required-docs.index');
    }

    public function show(RequiredDoc $required_doc)
    {
        abort_if(Gate::denies('required_doc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.required_docs.show', compact('required_doc'));
    }

    public function edit(RequiredDoc $required_doc)
    {
        abort_if(Gate::denies('required_doc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.required_docs.edit', compact('required_doc'));
    }

    public function update(Request $request, RequiredDoc $required_doc)
    {
        $request->validate([
                               'title'       => ['string',
                                                 'min:4',
                                                 'max:25',
                                                 'required',
                                                 'unique:required_docs,title,' . $required_doc->id,],
                               'description' => ['string',
                                                 'min:4',
                                                 'max:100',],
                           ]);
        $required_doc->update($request->only(['title', 'description']));
        return redirect()->route('admin.required-docs.index');
    }

    public function destroy(RequiredDoc $required_doc)
    {
        abort_if(Gate::denies('required_doc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $required_doc->delete();
        return back();
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('required_doc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
                               'ids'   => ['required', 'array'],
                               'ids.*' => ['exists:required_docs,id'],
                           ]);
        RequiredDoc::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
