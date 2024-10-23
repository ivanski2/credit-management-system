<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['credit_id', 'amount'];

    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }
}
