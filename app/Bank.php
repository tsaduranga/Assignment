<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';
    protected $guarded = [];


    public function bank_branches()
    {
        return $this->hasMany(Bank_Branch::class);
    }
}
