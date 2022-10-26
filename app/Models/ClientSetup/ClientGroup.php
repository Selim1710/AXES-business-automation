<?php

namespace App\Models\ClientSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientGroup extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer(){
        return $this->hasMany(User::class);
    }
}
