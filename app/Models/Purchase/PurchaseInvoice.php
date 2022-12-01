<?php

namespace App\Models\Purchase;

use App\Models\Inventory\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;
    protected $guarded = [];
}
