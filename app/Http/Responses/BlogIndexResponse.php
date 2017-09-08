<?php

namespace App\Http\Responses;

use App\Models\Blog;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BlogIndexResponse implements Responsable
{

    protected $blog;

    public function __construct(Collection $blog)
    {
        $this->blog = $blog;
    }

    public function toResponse($request)
    {
//        return $this->transformBlog();
        return view('blog.index')->with('blog', $this->transformBlog());
//        return view('blog.index', compact('blog'));
    }

    public function transformBlog(){
        return $this->blog->map(function ($blog) {
            return [
                'name' => $blog->title,
                'slug' => $blog->slug
            ];
        });
    }
}