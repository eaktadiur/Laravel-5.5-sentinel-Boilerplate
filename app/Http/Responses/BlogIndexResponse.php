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
//        return $this->filterBlog($this->blog);
//        return $this->transformBlog($this->blog);
        return view('blog.index')->with('blog', $this->filterBlog($this->blog));
//        return view('blog.index')->with('blog', $this->transformBlog($this->blog));
//        return view('blog.index', compact('blog'));
    }

    public function filterBlog($blogs)
    {
        return $blogs->filter(function ($blog) {
            return $blog->id > 20;
        });
    }

    public function transformBlog($blogs)
    {
        return $blogs->map(function ($blog) {
            return [
                'title' => $blog->title,
                'slug' => $blog->slug
            ];
        });
    }
}