<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $casts = [
        'pros' => 'array',
        'cons' => 'array'
    ];
    public function user(){
        return $this->belongsTo('App\User', 'username');
    }
}
