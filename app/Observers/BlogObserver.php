<?php

namespace App\Observers;

use App\Models\Blog;

class BlogObserver
{
    public function creating(Blog $blog)
    {
        $blog->slug = str_slug($blog->title);
    }

    public function updated()
    {
    }
}