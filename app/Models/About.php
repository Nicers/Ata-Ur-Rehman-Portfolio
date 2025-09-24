<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'button_txt',
        'button_url',
    ];

    public function buttons(){
        return $this->morphMany(Button::class, 'buttonable');
    }
}
