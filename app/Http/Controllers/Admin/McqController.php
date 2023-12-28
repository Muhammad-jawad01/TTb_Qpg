<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mcq;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Term;
use App\Models\ClassLevel;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
// use RealRashid\SweetAlert\Facades\Alert;
Use Alert;


class McqController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:mcq-list|mcq-create|mcq-edit|mcq-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:mcq-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mcq-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mcq-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $model = Mcq::get();

        return view('data_bank.mcq.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classlevel =ClassLevel::get();
        $term = Term::get();
        $chapter = Chapter::get();
        $subject = Subject::get();
        return view('data_bank.mcq.create', compact('classlevel','term','chapter','subject'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        foreach ($request->data as $key => $value) {

            $model = new Mcq();

            $model->fill($value);
            $model->class_id=$request->class_id;
            $model->subject_id=$request->subject_id;
            $model->chapter_id=$request->chapter_id;
            $model->term_id=$request->term_id;
            // dd($model);
            $model->save();
        }
        Alert::toast('The MCQ Added Successfuly','success')->timerProgressBar();

        return redirect()->route('mcqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mcq  $mcq
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modal = Mcq::find($id);
        // dd("test");

        return view('data_bank.mcq.show', compact('modal'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mcq  $mcq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classlevel =ClassLevel::get();
        $term = Term::get();
        $chapter = Chapter::get();
        $subject = Subject::get();
        $model = Mcq::find($id);
        return view('data_bank.mcq.edit', compact('model','classlevel','term','chapter','subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mcq  $mcq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        foreach ($request->data as $key => $value) {
            $model = Mcq::findOrFail($id);
            $model->fill($value);
            $model->class_id=$request->class_id;
            $model->subject_id=$request->subject_id;
            $model->chapter_id=$request->chapter_id;
            $model->term_id=$request->term_id;
            $model->save();
        } 
        Alert::toast('The MCQ Updated Successfuly','success')->timerProgressBar();

        return redirect()->route('mcqs.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mcq  $mcq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Mcq::find($id);
        $model->delete();
        Alert::toast('The MCQ Deleted Successfuly','success');
        return redirect()->back();
    }
}
