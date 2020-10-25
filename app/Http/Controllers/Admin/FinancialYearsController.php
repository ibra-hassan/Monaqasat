<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyFinancialYearRequest;
use App\Http\Requests\Admin\StoreFinancialYearRequest;
use App\Http\Requests\Admin\UpdateFinancialYearRequest;
use App\Models\FinancialYear;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FinancialYearsController extends Controller
{
	public function index(Request $request)
	{
		abort_if(Gate::denies('financial_year_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		if ($request->ajax()) {
			$query = FinancialYear::query()->select(sprintf('%s.*', (new FinancialYear)->table));
			$table = Datatables::of($query);

			$table->addColumn('placeholder', '&nbsp;');
			$table->addColumn('actions', '&nbsp;');

			$table->editColumn('actions', function ($row) {
				$viewGate      = 'financial_year_show';
				$editGate      = 'financial_year_edit';
				$deleteGate    = 'financial_year_delete';
				$crudRoutePart = 'financial-years';

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
			$table->editColumn('year', function ($row) {
				return $row->year ? $row->year : "";
			});

			$table->rawColumns(['actions', 'placeholder']);

			return $table->make(true);
		}

		return view('admin.financialYears.index');
	}

	public function create()
	{
		abort_if(Gate::denies('financial_year_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return view('admin.financialYears.create');
	}

	public function store(StoreFinancialYearRequest $request)
	{
		$financialYear = FinancialYear::create($request->all());

		return redirect()->route('admin.financial-years.index');
	}

	public function edit(FinancialYear $financialYear)
	{
		abort_if(Gate::denies('financial_year_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return view('admin.financialYears.edit', compact('financialYear'));
	}

	public function update(UpdateFinancialYearRequest $request, FinancialYear $financialYear)
	{
		$financialYear->update($request->all());

		return redirect()->route('admin.financial-years.index');
	}

	public function show(FinancialYear $financialYear)
	{
		abort_if(Gate::denies('financial_year_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		return view('admin.financialYears.show', compact('financialYear'));
	}

	public function destroy(FinancialYear $financialYear)
	{
		abort_if(Gate::denies('financial_year_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$financialYear->delete();

		return back();
	}

	public function massDestroy(MassDestroyFinancialYearRequest $request)
	{
		FinancialYear::whereIn('id', request('ids'))->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
