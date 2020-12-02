<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'blog_headline' => $this->headline,
            'blog_content' => $this->content,
            'blog_user' => new UserResource($this->user)
        ];
    }
}
