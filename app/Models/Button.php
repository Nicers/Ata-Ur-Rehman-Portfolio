<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $fillable = [
        'label',
        'url',
        'buttonable',
    ];

    public function buttonable(){
        return $this->morphTo();
    }
}
