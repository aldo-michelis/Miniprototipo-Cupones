<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispenser extends Model
{
    protected $fillable = ['qty', 'user_id', 'description', 'cad'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
