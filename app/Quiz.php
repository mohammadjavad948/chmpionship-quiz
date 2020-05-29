<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable =[
        'name','slug','user_id'
    ];

    public function information(){
        return $this->hasMany(Information::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
