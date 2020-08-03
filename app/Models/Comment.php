<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text'
    ];

    public function clinic()
    {
        return $this->belongsTo(Comment::class);
    }

    public function getComments(Int $clinic_id)
    {
        return $this->with('clinic')->where('clinic_id', $clinic_id)->get();
    }

    public function commentStore($clinic_id, Array $data)
    {
        $this->clinic_id = $clinic_id;
        $this->clinic_id = $data['clinic_id'];
        if ($data['post_name']){
            $this->post_name = $data['post_name'];
        } else {
            $this->post_name = "匿名";
        }
        $this->text = $data['text'];
        $this->save();

        return;
    }
}
