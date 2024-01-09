<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class DropDownController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($table, Request $request)
    {
        $data = [];
        $query = DB::table($table);

        // get columns for current modal 
        $columns =  DB::getSchemaBuilder()->getColumnListing($table);
        $firstParam = $request->key ?? $columns[0];
        $secondParam = $request->value ?? $columns[1];


        if ($request->has('q')) {
            $search = $request->q;
            $data = $query->select($firstParam, $secondParam)
                ->where($secondParam, 'LIKE', "%$search%")
                ->get();
        } else {
            $data = $query->select($firstParam, $secondParam)
                ->limit(20)
                ->get();
        }
        return response()->json($data);
    }
}
