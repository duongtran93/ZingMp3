<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name', 'desc', 'file', 'images'
    ];
    public function user() {
        return $this->belongsTo('App\User');
    }
}
