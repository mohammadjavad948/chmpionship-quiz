<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable =[
        'quiz_id','picture_url','name'
    ];

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
