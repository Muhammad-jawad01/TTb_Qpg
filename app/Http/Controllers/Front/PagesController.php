<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;


class PagesController extends Controller
{

  public function index()
  {
    return View('front.pages.index');
  }

  public function contact_us()
  {
    return View('front.pages.contact');
  }


  public function dynamic($slug)
  {
    $pageData = Page::where('slug', $slug)->firstorfail();
    return View('front.pages.dynamic', compact('pageData'));
  }


  public function notifications(Request $request)
  {
    $where=[];
    if($request->has('start')){
      $notifications = Notification::where('status', 1)->where('created_at','LIKE','%'.$request->start .'%')->orderBy('created_at', 'desc')->get();
    }else{
      $notifications = Notification::where('status', 1)->orderBy('created_at', 'desc')->get();
    }
    
    return View('front.pages.notification', compact('notifications'));
  }

  public function details($id)
    {   
      //  dd('test');
        $pageData = Page::where('loadwithlink', 'newsDetails')->first();
        $galleries = Gallary::where('id', $id)->firstorfail();
        $categories = Category::where('type', 'gallery')->where('status', 1)->get();
       
        return View('front.pages.gallery.details', compact('pageData', 'galleries', 'categories'));
    }

  public function gallery(Request $request)
  {

    $categories = Category::where('type', 'gallery')->where('status', 1)->get();
    $galleries = Gallary::where('status', 1)->paginate(10);
    return View('front.pages.gallery.gallery', compact('galleries', 'categories'));
  }

  public function transfr()
  {
    $transformation = Transformation::all();
    return view('front.pages.transformation.page-transformation', ['transformation' => $transformation]);
 }

  
}
