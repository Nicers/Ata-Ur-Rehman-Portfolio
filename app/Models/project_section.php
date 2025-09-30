<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project_section extends Model
{
    protected $fillable = [
        'title',
        'description',
        'button_txt',
        'button_url',
    ];

    public function title_descs(){
        return $this->hasMany(Project_titleDes::class);
    }
}
