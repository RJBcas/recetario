<?php

namespace App\Http\Requests;

use App\Http\Requests\CreatePostRequest;


class UpdatePostRequest extends CreatePostRequest
{
    public function authorize(){
    	return $this->user()->id == $this->$post->user_id;
    }
}
