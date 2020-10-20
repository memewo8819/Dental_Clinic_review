<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Clinic;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Clinic $clinic, Comment $comment)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            'review' => ['required'],
            'text' => ['required', 'string', 'max:500']
        ]);

        $validator->validate();
        $comment->commentStore($clinic->id, $data);

        return back();
    }
}
