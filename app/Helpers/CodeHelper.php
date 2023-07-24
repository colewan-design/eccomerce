<?php
use Illuminate\Support\Facades\Schema as FacadesSchema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\{lib_baskets,lib_additionals};

function GenerateBasketCode()
{

    $date = Carbon::today()->format('Y-m-d');
    $count = lib_baskets::whereDate('created_at', '=', $date)->count();
    $date_created = Carbon::now();
    $counted = substr(str_repeat(0, 4).($count + 1), - 4);
    return
        $date_created->format('m').
        $date_created->format('d').
        $date_created->format('Y').
        'B'.
        $counted;
}

?>