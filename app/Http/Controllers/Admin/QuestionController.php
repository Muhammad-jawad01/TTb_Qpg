<?php

namespace App\Http\Controllers\Admin;
use App\Models\Question;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Term;
use App\Models\ClassLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Exception;
use Yajra\Datatables\Datatables;


class QuestionController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:question-list|question-create|question-edit|question-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:question-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:question-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:question-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
    {
        if ($request->ajax()) {
            $modelData = Question::query()->with('term','chapter','subject','class')->orderBy('id', 'desc');
            return Datatables::of($modelData)->addColumn('action', function ($row) {
                return customButton($row, 'question', 'questions');
            })->rawColumns(['action','question'])->toJson();
        }
        return view('app.data_bank.question.index');
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

        return view('app.data_bank.question.create', compact('classlevel','term','chapter','subject'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $currenttime =Carbon::now()->timestamp;

            foreach ($request->data as $key => $value) {
                $model = new Question();

                $model->fill($value);
                $model->current_time= $currenttime;
                $model->class_id=$request->class_id;
                $model->type=$request->type;
                $model->subject_id=$request->subject_id;
                $model->chapter_id=$request->chapter_id;
                $model->term_id=$request->term_id;
                $model->save();
            }
            Alert::toast('The Question Added Successfuly','success')->timerProgressBar();
            return redirect()->route('questions.index');
        }
        catch(Exception $e)
        {
            Alert::toast('Make sure you have filled all the fields','error')->timerProgressBar();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Long_Question  $long_Question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modal = Question::find($id);

        return view('app.data_bank.question.show', compact('modal',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classlevel =ClassLevel::get();
        $term = Term::get();
        $chapter = Chapter::get();
        $subject = Subject::get();
        // $modal = Question::find($id);
        $model=Question::where('id',$id)->first();
        return view('app.data_bank.question.edit', compact('model','classlevel','term','chapter','subject'));
    }
    public function bulkedit($id)
    {
        $classlevel =ClassLevel::get();
        $term = Term::get();
        $chapter = Chapter::get();
        $subject = Subject::get();
        $modal = Question::find($id);
        $questions=Question::where('current_time',$modal->current_time)->get();
        //  dd($model);
        return view('data_bank.question.edit', compact('questions','modal','classlevel','term','chapter','subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Long_Question  $long_Question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
            

        $model = Question::findOrFail($id);
        $model->fill($request->all());
        $model->save();

        Alert::toast('The Question Update Successfuly','success')->timerProgressBar();

        return redirect()->route('questions.index');

    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Long_Question  $long_Question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::where('id', $id)->delete();
        Alert::toast(" Question Deleted Successfully", 'success');
        return redirect()->back();
    }
}