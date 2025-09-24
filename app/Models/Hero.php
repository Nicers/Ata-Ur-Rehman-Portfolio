<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'title',
        'description',
        'moving_txt1',
        'moving_txt2',
    ];

    public function buttons(){
        return $this->morphMany(Button::class, 'buttonable');
    }
}
