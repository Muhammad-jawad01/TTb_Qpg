<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;


class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $modelData = Term::query();

            return Datatables::of($modelData)->addColumn('action', function ($row) {
                return custommodalButton($row, 'term', 'terms');
            })->rawColumns(['action'])->toJson();
        }
        return view('app.general_setting.terms.index');
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
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:terms,name,',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            Alert::toast($errors->get('name'),'error')->timerProgressBar();

            return redirect()->back();
        }  

          $model = new Term();
        $data['name'] = $request->name;
        $model->fill($data);
        $model->save();
        Alert::toast('The Term Added Successfuly','success')->timerProgressBar();

return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $model = Term::findOrFail($id);
        return view('general_setting.terms.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:terms,name,',
        ]);
        if ($validator->fails()) {
            
            
            Alert::toast('The Term must be Unique','error')->timerProgressBar();
            return redirect()->back();
        }
       
        $model = Term::findOrFail($request->id);
        // dd($model);
        $model->fill($request->all());
        $model->save();
        Alert::toast('The Term Updated Successfuly','success')->timerProgressBar();

        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $model = Term::find($id);
        $model->delete();
        Alert::toast('The Term Deleted Successfuly','success');
        return redirect()->back();
    }
}