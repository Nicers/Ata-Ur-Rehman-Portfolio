<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'image',
        'sitePath',
        'gitPath',
        'isGit',
        'category',
    ];

    public function category(){
        return $this->belongsTo(ProjectCategory::class);
    }
}
