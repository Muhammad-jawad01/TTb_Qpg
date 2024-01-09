<?php
namespace App\Http\Controllers\Admin;
use App\Models\Question;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Term;
use App\Models\ClassLevel;
use App\Models\Paper;
use App\Models\PaperPart;
use App\Models\PaperQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $modelData = Paper::query()->with('term','subject','class')->orderBy('id', 'desc');
            return Datatables::of($modelData)->addColumn('action', function ($row) {
                return papercustomButton($row, 'paper', 'papers');
            })->rawColumns(['action','name'])->toJson();

        }
        return view('app.paper.index');
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
        $subject = Subject::get();

    return view('app.paper.create',compact('classlevel','term','subject'));


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
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            Alert::toast('The Paper name is requrid','error')->timerProgressBar();
            return redirect()->back();
        }  
        
          $model = new Paper();
        $data=$request->all();
        // dd($data);
        $model->fill($data);
        $model->save();
        Alert::toast('The Paper Added Successfuly','success')->timerProgressBar();
        return redirect()->route('papers.index');
    
    }
    public function create_random_part($id){

        // dd("hi");
        $paper =Paper::where('id',$id)->first();

        
        $cond=['subject_id'=>$paper->subject_id,'class_id'=>$paper->class_id,'term_id'=>$paper->term_id];

        // $paperQuetion =Question::where($cond)->get();
         

    return view('app.paper.part_question_random',compact('paper'));

    }
    
    public function paperpart($id)
    {

        $paper =Paper::where('id',$id)->first();
        // if($paper->term_id==3){

        //     $cond=['subject_id'=>$paper->subject_id,'class_id'=>$paper->class_id];
        // }else{
            
        // $cond=['subject_id'=>$paper->subject_id,'class_id'=>$paper->class_id,'term_id'=>$paper->term_id];
        // }    
         $cond=['subject_id'=>$paper->subject_id,'class_id'=>$paper->class_id,'term_id'=>$paper->term_id];


        $paperQuetion =Question::where($cond)->get();
         

    return view('app.paper.part_question',compact('paperQuetion','paper'));


    }

    public function randompart($id)
    {
        $paper =Paper::where('id',$id)->first();
        $cond=['subject_id'=>$paper->subject_id,'class_id'=>$paper->class_id,'term_id'=>$paper->term_id];
         $this->randomepartquestion(['paper_id'=>$id,'cond'=>$cond,'name'=>'A','time_allowed'=>'20', 'type'=>'1','marks'=>'20','limit'=>20,'attempt'=>20]);
         $this->randomepartquestion(['paper_id'=>$id,'cond'=>$cond,'name'=>'B','time_allowed'=>'80','type'=>'2','marks'=>'50','limit'=>12,'attempt'=>10]);
         $this->randomepartquestion(['paper_id'=>$id,'cond'=>$cond,'name'=>'C','time_allowed'=>'80', 'type'=>'3','marks'=>'30','limit'=>4,'attempt'=>3]);
        Alert::toast('The Random Paper Creates Successfuly','success')->timerProgressBar();
        return redirect()->route('papers.index');
    }

    public function randomepartquestion($partArray){
        $paper =Paper::where('id',$partArray['paper_id'])->first();

        // SELECT * FROM `questions` WHERE `class_id` = 1 and subject_id = 1 and term_id = 1 and type=1;

        $cond=['subject_id'=>$paper->subject_id,'class_id'=>$paper->class_id,'term_id'=>$paper->term_id,'type'=>$partArray['type']];

        $model = new PaperPart();
        $model->paper_id=$partArray['paper_id'];
        $model->time_allowed=$partArray['time_allowed'];
        $model->name=$partArray['name'];
        $model->marks=$partArray['marks'];
        $model->question_in_part=$partArray['limit'];
        $model->attempt_question=$partArray['attempt'];
        $model->save();
        $part_id=$model->id;
        $paperQuestion =Question::where($cond)->inRandomOrder()->take($partArray['limit'])->get();
        foreach($paperQuestion as $value){

            $model = new PaperQuestion();
            $model->question_id=$value->id;
            $model->paper_id=$partArray['paper_id'];
            $model->paper_parts_id=$part_id;
            $model->save();
        }
        
    }

    public function paperpartrandom(Request $request){

        $paper =Paper::where('id',$request->paper_id)->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'question_in_part' => 'required',
            'attempt_question'=> 'required',
            'time_allowed'=> 'required',
            'marks'=> 'required',        ]);
        if ($validator->fails()) {
            Alert::toast('All fields are  mandatory','error')->timerProgressBar();
            return redirect()->back();
        }  
        $model = new PaperPart();
        $data=$request->all();
        $model->fill($data);
        $model->save();
        $part_id=$model->id;
        $paper_id=$paper->id;
            $cond=['subject_id'=>$paper->subject_id,'class_id'=>$paper->class_id,'term_id'=>$paper->term_id,'type'=>$request->type];
            $paperpartQuestion = Question::where($cond)->inRandomOrder()->limit($request->question_in_part)->get();
       
            foreach($paperpartQuestion as $Qdata)
            { 
                $data=[ 'question_id'=>(string)$Qdata->id,'paper_id'=>$request->paper_id ,'paper_parts_id'=>$part_id];
                $model = new PaperQuestion();
                $model->fill($data);
                $model->save();
        

            }
             
            Alert::toast('The Paper Part  Added Successfuly','success')->timerProgressBar();
            return redirect()->route('papers.index');
        
    }


    public function paperpartStore(Request $request)
    {
          $paper =Paper::where('id',$request->paper_id)->first();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'question_in_part' => 'required',
            'attempt_question'=> 'required',
            'time_allowed'=> 'required',
            'marks'=> 'required',
        ]);
        if ($validator->fails()) {
            Alert::toast('All fields are  mandatory','error')->timerProgressBar();
            return redirect()->back();
        }  
        $model = new PaperPart();
        $data=$request->all();
        $model->fill($data);
        $model->save();
        $part_id=$model->id;
        $paper_id=$paper->id;
        $arr=$request->part_question;

    foreach(explode(',',$arr) as $value){

            $model = new PaperQuestion();
            $model->question_id=$value;
            $model->paper_id=$request->paper_id;
            $model->paper_parts_id=$part_id;
            $model->save();

        }
        Alert::toast('The Paper Paret  Added Successfuly','success')->timerProgressBar();
        return redirect()->route('papers.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paper =Paper::where('id',$id)->with('partPart')->first();
        // return $mcqs = $paper->partPart[0]->with('paperquestion')->get();
        return view('app.paper.show',compact('paper'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $classlevel =ClassLevel::get();
        $term = Term::get();
        $subject = Subject::get();
        $paper =Paper::where('id',$id)->first();
        return view('app.paper.edit',compact('paper','classlevel','term','subject'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    { 
        Paper::where('id', $id)->delete();
        // Alert::toast("Paper Deleted Successfully", 'success');
        // return redirect()->back();
        return response()->json([ 'success' ]);
        
    }
}