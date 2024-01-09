<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Term;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Question;
use App\Models\ClassLevel;
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
    public function create()
    {


        $classlevel = ClassLevel::get();
        $term = Term::get();
        $chapter = Chapter::get();
        $subject = Subject::get();

        return view('app.ai.create', compact('classlevel', 'term', 'chapter', 'subject'));
    }

    public function AIsearch()
    {

        $search = request()->paragraph;
        // $search = request()->input('paragraph');
        // $num_questions = request()->input('num_question');

        $content = "create the " . request()->num_question . " number of questions for the following paragraph: " . $search;
        // $content = "create the $num_questions number of questions for the following paragraph: $search";
        // dd($content);
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])->post("https://api.openai.com/v1/chat/completions", [
            "model" => "gpt-3.5-turbo",
            'messages' => [
                [
                    "role" => "user",
                    "content" => $content,
                ],
            ],
            'temperature' => 0.5,
            "max_tokens" => 200,
            "top_p" => 1.0,
            "frequency_penalty" => 0.52,
            "presence_penalty" => 0.5,
            "stop" => ["11."],
        ]);

        // Get the JSON response
        $data = $response->json();
        return $data;
        return view('.view', ['data' => $data]);
    }
}
