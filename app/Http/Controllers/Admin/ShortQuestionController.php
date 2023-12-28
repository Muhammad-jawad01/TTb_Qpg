<?php

namespace App\Http\Controllers\Admin;
use App\Models\Short_Question;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Term;
use App\Models\ClassLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ShortQuestionController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:short_question-list|short_question-create|short_question-edit|short_question-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:short_question-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:short_question-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:short_question-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Short_Question::get();

        return view('data_bank.short_question.index', compact('model'));
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
        return view('data_bank.short_question.create', compact('classlevel','term','chapter','subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currenttime =Carbon::now()->timestamp;
        foreach ($request->data as $key => $value) {

            $model = new Short_Question();

            $model->fill($value);
            $model->current_time= $currenttime;
            $model->class_id=$request->class_id;
            $model->subject_id=$request->subject_id;
            $model->chapter_id=$request->chapter_id;
            $model->term_id=$request->term_id;
            // dd($model);
            $model->save();
        }
        Alert::toast('The Short_Question Added Successfuly','success')->timerProgressBar();

        return redirect()->route('shortQuestions.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Short_Question  $short_Question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modal = Short_Question::find($id);
        return view('data_bank.short_question.show', compact('modal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short_Question  $short_Question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classlevel =ClassLevel::get();
        $term = Term::get();
        $chapter = Chapter::get();
        $subject = Subject::get();
        $model = Short_Question::findorfail($id);
        $questions=Short_Question::where('id',$id)->get();

        return view('data_bank.short_question.edit', compact('questions','model','classlevel','term','chapter','subject'));
    }
    public function bulkedit($id)
    {
        $classlevel =ClassLevel::get();
        $term = Term::get();
        $chapter = Chapter::get();
        $subject = Subject::get();
        $model = Short_Question::find($id);
        $questions=Short_Question::where('current_time',$model->current_time)->get();
        //  dd($model);
        return view('data_bank.short_question.edit', compact('questions','model','classlevel','term','chapter','subject'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Short_Question  $short_Question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd("test");
         foreach ($request->data as $key => $value)
          {
                $model = Short_Question::where('id',$value['input_id'])->first();
                $model->fill($value);
                $model->class_id=$request->class_id;
                $model->subject_id=$request->subject_id;
                $model->chapter_id=$request->chapter_id;
                $model->term_id=$request->term_id;
                $model->type=$request->type;
                $model->save();
            } 
            Alert::toast('The Short_Question Updated Successfuly','success')->timerProgressBar();

        return redirect()->route('shortQuestions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Short_Question  $short_Question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Short_Question::where('id', $id)->delete();
        Alert::toast("Short Question Deleted Successfully", 'success')->timerProgressBar();

        return redirect()->back();
    }
}
