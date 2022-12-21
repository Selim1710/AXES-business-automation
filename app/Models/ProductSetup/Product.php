<?php

namespace App\Models\ProductSetup;

use App\Models\Inventory\Branch;
use App\Models\ProductSetup\Stock;
use App\Models\Inventory\Warehouse;
use App\Models\ProductSetup\Category;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSetup\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function stock(){
        return $this ->hasOne(Stock::class);
    }

    public function branch(){
        return $this ->belongsTo(Branch::class);
    }

    public function warehouse(){
        return $this ->belongsTo(Warehouse::class);
    }

}
