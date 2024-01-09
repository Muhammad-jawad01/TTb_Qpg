<?php


namespace App\Http\Controllers\API;


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
    public function index($model, Request $request)
    {

        if (!in_array($model, ['departments', 'gates','vehcile_manufacturers'])) {
            return sendError("User don't have permission", [], 403);
        }
        $data = [];
        $query = DB::table($model);

        // get columns for current modal 
        $columns =  DB::getSchemaBuilder()->getColumnListing($model);
        $firstParam = $request->key ?? $columns[0];
        $secondParam = $request->value ?? $columns[1];


        if ($request->has('q')) {
            $search = $request->q;
            $data = $query->select($firstParam, $secondParam)
                ->where($secondParam, 'LIKE', "%$search%")
                ->get();
        } else {
            $data = $query->select($firstParam, $secondParam)
                ->get();
        }
        return response()->json($data);
    }
}