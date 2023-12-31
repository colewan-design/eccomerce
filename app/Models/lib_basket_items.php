<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class lib_basket_items extends Model  implements AuditableContract
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table = 'lib_basket_items';
    protected $primaryKey ='id';
    protected $fillable = [
        'category',
        'basket_item_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
