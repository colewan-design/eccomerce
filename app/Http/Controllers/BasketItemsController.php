<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lib_basket_items;

class BasketItemsController extends Controller
{
    public function index(Request $request) {
        $lib_basket_items =  DB::table('lib_basket_items')
                            ->orderByRaw('updated_at DESC NULLS LAST')
                            ->orderByRaw('created_at DESC NULLS LAST') 
                            ->whereNull('deleted_at')
                            ->limit(10)
                            ->get();

        return $lib_basket_items;


    }

    public function store(Request $request)
    {
        $lib_basket_items = new lib_basket_items();
        columnSetter($lib_basket_items, $request);
        return $lib_basket_items->save();
    }

    public function update(Request $req, $id)
    {
        $lib_basket_items = lib_basket_items::find($id);
        $lib_basket_items->update($req->all());
        return $lib_basket_items;
    }

    public function destroy($id)
    {
        $lib_basket_items = lib_basket_items::find($id);
        $lib_basket_items->delete();
        return $lib_basket_items;
    }

    public function search(Request $request){
        $searchWord = $request->get('s');
        $lib_basket_items = lib_basket_items::select(['lib_basket_items.*'])
        ->where(function($query) use ($searchWord){
            $query->where('basket_item_name', 'ILIKE', "%$searchWord%");
        })->get();

        return response()->json([
            'data' => $lib_basket_items
        ], 200);
    }
}
