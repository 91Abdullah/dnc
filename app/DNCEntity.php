<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DNCEntity extends Model
{
    protected $fillable = ['name', 'number'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
