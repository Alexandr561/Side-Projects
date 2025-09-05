<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminShowController extends Controller
{
    public function show(Post $post)
    {
        return view('admin.adminShow', [
            'post' => $post
        ]);
    }
}
