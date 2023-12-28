<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Helpers\Helper;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:setting-list|setting-create|setting-edit|setting-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:setting-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:setting-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:setting-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // permissions
        $settings = Setting::get();
        return view('content.apps.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findorfail($id);
        return view('content.apps.setting.edit', compact('setting'));
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

        $data = $request->all();


        $data['sidebarCollapsed'] = Helper::switchToDb($request->sidebarCollapsed);
        $data['showMenu'] = Helper::switchToDb($request->showMenu);
        $data['pageHeader'] = Helper::switchToDb($request->pageHeader);
        $data['blankPage'] = Helper::switchToDb($request->blankPage);

        unset($data['media']);
        unset($data['_token']);
        unset($data['_method']);
        $setting = Setting::where('id', $id)->update($data);
        $setting = Setting::find($id);
        $setting->addAllMediaFromTokens();
        session()->put('locale', $data['defaultLanguage']);
        Alert::toast('Setting updated', 'success');
        return redirect()->route('settings.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setting::where('id', $id)->delete();
        return redirect()->route('settings.index')
            ->with('success', 'Role deleted successfully');
    }
}
