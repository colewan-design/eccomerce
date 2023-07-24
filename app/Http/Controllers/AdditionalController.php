<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lib_additionals;

class AdditionalController extends Controller
{
    public function index(Request $request) {
        $lib_additionals =  DB::table('lib_additionals')
        ->orderByRaw('updated_at DESC NULLS LAST')
        ->orderByRaw('created_at DESC NULLS LAST') 
        ->whereNull('deleted_at')
        ->get();

        return $lib_additionals;
    }

    public function store(Request $request)
    {
        $lib_additionals = new lib_additionals();
        columnSetter($lib_additionals, $request);
        return $lib_additionals->save();
    }

    public function update(Request $req, $id)
    {
        $lib_additionals = lib_additionals::find($id);
        columnSetter($lib_additionals, $req);
        return $lib_additionals->save();
    }

    public function destroy($id)
    {
        $lib_additionals = lib_additionals::find($id);
        $lib_additionals->delete();
        return $lib_additionals;
    }

    public function getItems(Request $request) {
       $lib_basket_items_array =  [];
       $lib_basket_items = DB::table('lib_basket_items')->whereNull('deleted_at')->get(['basket_item_name']);
       foreach ($lib_basket_items as $value){
          array_push($lib_basket_items_array,$value->basket_item_name);
       }

        return $lib_basket_items_array;
    }

    public function search(Request $request){
        $searchWord = $request->get('s');
        $lib_additionals = lib_additionals::select(['lib_additionals.*'])
        ->where(function($query) use ($searchWord){
            $query->where('additional_name', 'ILIKE', "%$searchWord%");
        })->get();


        return response()->json([
            'data' => $lib_additionals
        ], 200);
    }

}
