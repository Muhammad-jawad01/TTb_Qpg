<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class PageController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:page-list|page-create|page-edit|page-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:page-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:page-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
    }


    public function list(Request $request)
    {

        $model = Page::query();
        return DataTables::of($model)->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $pages = Page::paginate(20);
        return view('content.apps.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.apps.page.create');
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
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }

        $data = $request->all();
        $data['loadwithlink'] = strtotime(date('d-m-y h:i:s'));
        $data['status'] = Helper::switchToDb($request->status);
        $data['deletable'] = Helper::switchToDb($request->deletable);
        $data['deletable'] = Helper::switchToDb($request->deletable);
        $data['title'] = Helper::SaveLanguageColumn('title', $request);
        $data['banner_title'] = Helper::SaveLanguageColumn('banner_title', $request);
        $data['slogan'] = Helper::SaveLanguageColumn('slogan', $request);
        $data['description'] = Helper::SaveLanguageColumn('description', $request);
        $data['image_caption'] = Helper::SaveLanguageColumn('image_caption', $request);
        unset($data['_token']);


        $page = Page::Create($data);
        $page->addAllMediaFromTokens();
        if ($page) {
            Alert::toast("Pages Created Successfully", 'success');
            return redirect()->route('pages.index');
        } else {
            Alert::toast('Fail to crate new Pages', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findorfail($id);
        return view('content.apps.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        //Display When validation Fail 
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }

        $data = $request->all();
        $pageData = Page::find($id);
        $pageData->addAllMediaFromTokens();
        $data['deletable'] = Helper::switchToDb($request->deletable);
        $data['title'] = Helper::SaveLanguageColumn('title', $request, $pageData);
        $data['banner_title'] = Helper::SaveLanguageColumn('banner_title', $request, $pageData);
        $data['slogan'] = Helper::SaveLanguageColumn('slogan', $request, $pageData);
        $data['description'] = Helper::SaveLanguageColumn('description', $request, $pageData);
        $data['image_caption'] = Helper::SaveLanguageColumn('image_caption', $request, $pageData);


        unset($data['_token']);
        unset($data['_method']);
        unset($data['media']);
        // dd($data);
        $page = Page::where('id', $id)->update($data);
        if ($page) {
            Alert::toast("Pages Upated Successfully", 'success');
            return redirect()->route('pages.index');
        } else {
            Alert::toast('Fail to crate new Page', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::where('id', $id)->delete();
        Alert::toast("Pages Deleted Successfully", 'success');
        return redirect()->route('pages.index');
    }
}
