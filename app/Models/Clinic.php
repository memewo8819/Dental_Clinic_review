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

    public function updateClinic(Array $data)
    {
        $this->clinic_name = $data['clinic_name'];
        $this->postal_code = $data['postal_code'];
        $this->pref = $data['pref'];
        $this->city = $data['city'];
        $this->site_url = $data['site_url'];
        $this->email = $data['email'];
        $this->tel = $data['tel'];
        $this->lat = $data['lat'];
        $this->lng = $data['lng'];
        $this->save();

        return;
    }
}
