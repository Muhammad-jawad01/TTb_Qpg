<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaperAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class PaperAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paperAnswers = PaperAnswer::all();
        return view('paper-answers.index', compact('paperAnswers'));
    }

    public function show($id)
    {
        $paperAnswer = PaperAnswer::findOrFail($id);
        return view('paper-answers.show', compact('paperAnswer'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $data['user_id'] = auth()->user()->id;

        $paperAnswer = PaperAnswer::create($data);
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaperAnswer  $paperAnswer
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaperAnswer  $paperAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(PaperAnswer $paperAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaperAnswer  $paperAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaperAnswer $paperAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaperAnswer  $paperAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperAnswer $paperAnswer)
    {
        //
    }
}
