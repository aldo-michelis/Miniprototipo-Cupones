<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = [
        'contact_name','brand','postalcode','user_id', 'logo'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
