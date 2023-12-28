<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CKEditorController extends Controller
{


    public function upload_image(Request $request)
     {
        $file = $request->file('upload');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload'), $filename);
        return response()->json([
            'url' => asset('upload/' . $filename)
        ]);
    }
    
    
    
}