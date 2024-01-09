<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Term;
use App\Models\User;
use App\Models\Paper;
use GuzzleHttp\Client;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Question;
use App\Models\ClassLevel;
use App\Models\PaperAnswer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class OpenAIController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $modelData = Question::query()->with('term', 'chapter', 'subject', 'class')->where('gen_type', 'ai')->orderBy('id', 'desc');
            return Datatables::of($modelData)->addColumn('action', function ($row) {
                return customButton($row, 'question', 'questions');
            })->rawColumns(['action', 'question'])->toJson();
        }


        return view('app.ai.index');
    }
    public function index2()
    {
        if (request()->ajax()) {
            $modelData = Paper::query()->where("type", "Submit_Online")->with('term', 'subject', 'class')->orderBy('id', 'desc');
            return Datatables::of($modelData)->addColumn('action', function ($row) {
                return customButtonbtn($row, 'paper', 'papers');
            })->rawColumns(['action', 'name'])->toJson();
        }
        return view('app.ai.index2');
    }
    public function start()
    {
        $paper = Paper::where('id', request()->id)->with('partPart')->first();
        return view('app.ai.show', compact('paper'));
    }

    public function saveAnswer(Request $request)
    {

        $data = $request->all();
        dd($data);
        $data['user_id'] = auth()->user()->id;

        $paperAnswer = PaperAnswer::create($data);
        return response()->json(['success' => true]);
    }

    public function create()
    {


        $classlevel = ClassLevel::get();
        $term = Term::get();
        $chapter = Chapter::get();
        $subject = Subject::get();

        return view('app.ai.create', compact('classlevel', 'term', 'chapter', 'subject'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'class_id' => 'required',
            'type' => 'required',
            'subject_id' => 'required',
            'chapter_id' => 'required',
            'term_id' => 'required',
            'paragraph_save' => 'required',
        ]);


        $questions = explode("\r\n", $request->input('paragraph_save'));
        $filteredQuestions = array_filter($questions, function ($value) {
            return !empty($value);
        });
        $currenttime = Carbon::now()->timestamp;
        $filteredQuestions = array_values($filteredQuestions);
        for ($i = 0; $i < count($filteredQuestions); $i += 2) {
            $question = preg_replace('/^(Question|Answer): \d+\s/', '', $filteredQuestions[$i]);
            $answer = preg_replace('/^(Question|Answer): \d+\s/', '', $filteredQuestions[$i + 1]);

            // dd($filteredQuestions[$i], $question);

            $model = new Question();
            $model->class_id = $request->input('class_id');
            $model->type = $request->input('type');
            $model->subject_id = $request->input('subject_id');
            $model->chapter_id = $request->input('chapter_id');
            $model->gen_type = "AI";
            $model->current_time = $currenttime;
            $model->term_id = $request->input('term_id');
            $model->question = trim($question);
            $model->answer = trim($answer);
            $model->save();
        }
        Alert::toast('The AI Questions Added Successfuly', 'success')->timerProgressBar();

        return redirect()->route('ai.question.list');
    }

    public function AIsearch()
    {
        $search = request()->paragraph;
        $num_questions = request()->num_question;

        // dd($search, $num_questions);

        $content = "Your task is to read the content given in the triple backticks and create " . $num_questions . " number of questions with answers with the instructions given in the <> brackets.

    ```
    " . $search . "
    ```

    <
    1. Each generated question shall be started with Question: question_numbering
    2. Each generated answer shall be started with Answer: answer_numbering
    3. There should be no conclusion statement in the generated question and answer
    >";

        // dd($content);

        $apiKey = env('GEMINI_AI_API_KEY');

        $response = Http::post("https://generativelanguage.googleapis.com/v1beta2/models/text-bison-001:generateText?key={$apiKey}", [
            'prompt' => [
                'text' => $content,
            ],
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Extract the generated questions and answers
            $output = $data['candidates'][0]['output'];
            return $output;
        } else {
            // Handle the error
            return 'Error: Could not generate response from Gemini AI.';
        }
    }


    // public function AIsearch()
    // {

    //     $search = request()->paragraph;
    //     $search = request()->input('paragraph');
    //     $num_questions = request()->num_question;


    //     $content = "Your task is to read the content given in the triple backticks and create " . $num_questions . " number of questions with answers with the instructions given in the <> brackets.

    //   ```
    //   " . $search . "
    //   ```

    //  <
    //  1. Each generated question shall be started with Question: question_numbering
    //  2. Each generated answer shall be started with Answer: answer_numbering
    //  3. There should be no conclusion statement in the generated question and answer
    //  >";


    //     dd($content);

    //     $apiKey = env('GEMINI_AI_API_KEY');

    //     $response = Http::post("https://generativelanguage.googleapis.com/v1beta2/models/text-bison-001:generateText?key={$apiKey}", [
    //         'prompt' => [
    //             'text' => $content,
    //         ],
    //     ]);

    //     if ($response->successful()) {
    //         $data = $response->json();

    //         // return $data;
    //         return $data['candidates'][0]['output'] ?? "";
    //     } else {
    //         // Handle the error
    //         return 'Error: Could not generate response from Gemini AI.';
    //     }
    // }

    function geminiAi($prompt)
    {


        // "Please read answer of the question from the below content given in <> brackets; and also read the answser given by one of the students which is given the triple backstics;
        // Your task is to compare the answer from the content given in the <> brackets with the student's answer given in triple backtsticks and tell how accurate the student is, and give him marks out of 10 based on your own learned model;"

        // Assuming you want to display or use the $content variable later
        // echo $content;


        // $content = "create the " . request()->num_question . " number of questions: for the following paragraph: " . $search . "also write the 4 possible  short answers:  for each question ";
        //         $content = "Your task is to read the content givein in the triple backticks and create " . request()->num_question . " number of questions with answers with the instructions given in the <> brackets".

        // ```
        // " . $search . "
        // ```

        // <
        // 1. each generated question shall be started with Qeustion: question_numbering
        // 2. each generated answer shall be started with Answer: answer_numbering
        // 3. there should be no conclusion statement in the generated question and anwser
        // >".;
        // create the " 4" number of questions: for the   above paragraph  "also write the 4 possible  short answers:  for each question. please note separate each answer with double pipe sign || and each qestion with {| |} this sign

        // $content = "create the $num_questions number of questions for the following paragraph: $search";
        // dd($content);
        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        // ])->post("https://api.openai.com/v1/chat/completions", [
        //     "model" => "gpt-3.5-turbo",
        //     'messages' => [
        //         [
        //             "role" => "user",
        //             "content" => $content,
        //         ],
        //     ],
        //     'temperature' => 0.5,
        //     "max_tokens" => 200,
        //     "top_p" => 1.0,
        //     "frequency_penalty" => 0.52,
        //     "presence_penalty" => 0.5,
        //     "stop" => ["11."],
        // ]);

        // // Get the JSON response
        // $data = $response->json();
        // return $data;
        // return view('.view', ['data' => $data]);
        $apiKey = env('GEMINI_AI_API_KEY');

        $response = Http::post("https://generativelanguage.googleapis.com/v1beta2/models/text-bison-001:generateText?key={$apiKey}", [
            'prompt' => [
                'text' => $prompt,
            ],
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return $data['candidates'][0]['output'];
        } else {
            // Handle the error
            return 'Error: Could not generate response from Gemini AI.';
        }
    }
}
