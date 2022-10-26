<?php

namespace App\Models\ProductSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function subCategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function stock(){
        return $this ->belongsTo(Stock::class);
    }
}
