<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lib_baskets;

class BasketController extends Controller
{
    public function index(Request $request) {
        $lib_baskets =  DB::table('lib_baskets')
                        ->orderByRaw('updated_at DESC NULLS LAST')
                        ->orderByRaw('created_at DESC NULLS LAST') 
                        ->whereNull('deleted_at')
                        ->get();

        return $lib_baskets;
    }

    public function store(Request $request)
    {
        $lib_baskets = new lib_baskets();
        columnSetter($lib_baskets, $request);
        $lib_baskets->basket_code = GenerateBasketCode();
        $lib_baskets->basket_item = json_encode($request->basket_item);
        return $lib_baskets->save();
    }

    public function update(Request $req, $id)
    {
        $lib_baskets = lib_baskets::find($id);
        columnSetter($lib_baskets, $req);
        $lib_baskets->basket_code = GenerateBasketCode();
        $lib_baskets->basket_item = json_encode($req->basket_item);
        return $lib_baskets->save();
    }

    public function destroy($id)
    {
        $lib_baskets = lib_baskets::find($id);
        $lib_baskets->delete();
        return $lib_baskets;
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
        $lib_baskets = lib_baskets::select(['lib_baskets.*'])
        ->where(function($query) use ($searchWord){
            $query->where('basket_code', 'ILIKE', "%$searchWord%");
        })->get();

        return response()->json([
            'data' => $lib_baskets
        ], 200);
    }

}
