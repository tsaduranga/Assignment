<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_Branch extends Model
{
    protected $table = 'bank_branches';
    protected $guarded = [];
    public $timestamps = false;

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
