<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $modelData = Subject::query()->orderByDesc('id');

            return Datatables::of($modelData)->addColumn('action', function ($row) {
                return custommodalButton($row, 'subject', 'subjects');
            })->rawColumns(['action'])->toJson();
        }
        return view('app.general_setting.subjects.index');
    }
    // {
    //     $model = Subject::orderBy('id', 'DESC')->get();
    //     return view('app.general_setting.subjects.index', compact('model'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:subjects,name,',
        ]);
        if ($validator->fails()) {

            Alert::toast('The Subject Name must be Unique', 'error')->timerProgressBar();
            return redirect()->back();
        }

        $model = new Subject();
        $data['name'] = $request->name;
        $data['code'] = $request->code;
        $model->fill($data);
        $model->save();
        Alert::toast('The Subject added Successfuly', 'success')->timerProgressBar();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Subject::findOrFail($id);
        return view('general_setting.subjects.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:subjects,name,',
        ]);
        if ($validator->fails()) {

            Alert::toast('The Subject Name must be Unique', 'error')->timerProgressBar();
            return redirect()->back();
        }
        $model = Subject::findOrFail($request->id);
        $model->fill($request->all());
        $model->save();
        Alert::toast('The Subject Updated Successfuly', 'success')->timerProgressBar();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Subject::find($id)->delete();
        Alert::toast('The Subject Deleted Successfuly', 'success');
        return redirect()->back();
    }
}
