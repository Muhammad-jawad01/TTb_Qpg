<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Term;
use App\Models\ClassLevel;
use App\Models\Question;
use App\Models\Paper;
use App\Models\Subject;
use App\Models\User;

use DB;

class DashboardController extends Controller
{

    public function dashboard(Request $request)
    {
        $classes = ClassLevel::query()->count();
        // $user = User::query()->count();
        $user = User::where('type', '<>', 'admin')->count();

        $mcq = Question::query()->where('type', 1)->count();
        $short = Question::query()->where('type', 2)->count();
        $long = Question::query()->where('type', 3)->count();

        $paper = Paper::query()->count();
        $subject = Subject::query()->count();

        $data = Paper::select('subject_id', 'session', 'name')
            ->groupBy('subject_id', 'session', 'name')
            ->get();

        $chartData = [
            $classes = ClassLevel::query()->count(),
            $subject = Subject::query()->count(),
            $mcq = Question::query()->where('type', 1)->count(),
            $short = Question::query()->where('type', 2)->count(),
            $long = Question::query()->where('type', 3)->count(),
            $paper = Paper::query()->count()
        ];

        $chartOptions = [
            'Total Classes', 'Subjects', 'MCQ Questions', 'Short Questions', 'Long Questions', 'Total Papers'
        ];


        return view('app.dashboard.dashboard1', compact('mcq', 'short', 'long', 'paper', 'subject', 'classes', 'user', 'chartData', 'chartOptions'));
    }
}
