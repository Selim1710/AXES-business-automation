<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function subGroup(){
        return $this ->belongsTo(SubGroup::class);
    }
}