<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $fillable = [
        'name',
        'tel',
        'site_url',
        'email',
        'pref',
        'city',
        'town'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function prefList()
    {
        $pref_list = [
            '愛知県',
            '岐阜県',
            '三重県',
        ];

        return;
    }
}
