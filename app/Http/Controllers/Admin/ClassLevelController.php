<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;


class ClassLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $modelData = ClassLevel::query();

            return Datatables::of($modelData)->addColumn('action', function ($row) {
                return custommodalButton($row, 'class', 'classlevels');
            })->rawColumns(['action'])->toJson();
        }
        return view('app.general_setting.classlavel.index');
    }

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
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:class_levels,name,',
        ]);
        if ($validator->fails()) {
            // $errors = $validator->errors();
            
            Alert::toast('The Class Name must be Unique','error')->timerProgressBar();
            return redirect()->back();
        }
        $model = new ClassLevel();
        $data['name'] = $request->name;
        $model->fill($data);
        $model->save();
        Alert::toast('The Class added Successfuly','success')->timerProgressBar();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassLevel  $classLevel
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $model = ClassLevel::findOrFail($id);
        return view('general_setting.classlavel.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassLevel  $classLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassLevel $classLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassLevel  $classLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:class_levels,name,',
        ]);
        if ($validator->fails()) {
            
            Alert::toast('The Class Name must be Unique','error')->timerProgressBar();
            return redirect()->back();
        }
        $model = ClassLevel::findOrFail($request->id);
        // dd($model);
        $model->fill($request->all());
        $model->save();
        Alert::toast('The Class Updated Successfuly','success')->timerProgressBar();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassLevel  $classLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ClassLevel::find($id);
        $model->delete();
        Alert::toast('The Class Deleted Successfuly','success');
        return redirect()->back();
    }
}