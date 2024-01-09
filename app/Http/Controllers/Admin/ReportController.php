<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Gate;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:report-list|report-create|report-edit|report-delete', ['only' => ['index', 'store', 'visitors']]);
        $this->middleware('permission:report-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:report-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:report-delete', ['only' => ['destroy']]);
    }

    public function visitors(Request $request)
    {

        $from = date('Y-m-d');
        $to = date('Y-m-d');

        if ($request->has('from_date')) {
            $from = $request->from_date;
        }
        if ($request->has('to_date')) {
            $to = $request->to_date;
        }


        $startDate = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d',  $to)->endOfDay();
        $cond = [$startDate, $endDate];


        $total = Visitor::whereBetween('created_at', $cond)->count();
        $departments = Department::with('visitors')->withCount(['visitors' => function ($q) use ($cond) {
            $q->whereBetween('created_at', $cond);
        }])->get();

        $gates = Gate::with('visitors')->withCount(['visitors' => function ($q) use ($cond) {
            $q->whereBetween('created_at', $cond);
        }])->get();

        return view('app.reports.visitors', compact('total', 'departments', 'gates', 'from', 'to'));
    }
}
