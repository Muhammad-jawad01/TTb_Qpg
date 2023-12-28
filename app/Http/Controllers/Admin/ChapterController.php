<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;


class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
    {
        if ($request->ajax()) {
            $modelData = Chapter::query();

            return Datatables::of($modelData)->addColumn('action', function ($row) {
                return custommodalButton($row, 'chapter', 'chapters');
            })->rawColumns(['action'])->toJson();
        }
        return view('app.general_setting.chapters.index');
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
            'name' => 'required|unique:chapters,name,',
        ]);
        if ($validator->fails()) {
            
            Alert::toast('The Chapter Name must be Unique','error')->timerProgressBar();
            return redirect()->back();
        }        
        $model = new Chapter();
        $data['name'] = $request->name;
        $model->fill($data);
        $model->save();
        Alert::toast('The Chapter Added  Successfuly','success')->timerProgressBar();

     return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $model = Chapter::findOrFail($id);
        return view('general_setting.chapters.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:chapters,name,',
        ]);
        if ($validator->fails()) {
            
            Alert::toast('The Chapter Name must be Unique','error')->timerProgressBar();
            return redirect()->back();
        }
        
        $model = Chapter::findOrFail($request->id);
        // dd($model);
        $model->fill($request->all());
        $model->save();
        Alert::toast('The Chapter Updated  Successfuly','success')->timerProgressBar();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Chapter::find($id);
        $model->delete();
        Alert::toast('The Chapter Deleted Successfuly','success');
        return redirect()->back();
    }
}