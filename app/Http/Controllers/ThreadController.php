<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\PermissionHelper;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function show(Category $category)
    {
        PermissionHelper::can('can_enter_cp');
        $threads = Thread::where('category_id', $category->id)->paginate(10);
        return view('threads.show', compact('threads'));
    }

    public function Thread(Thread $thread) {
        return view('threads.thread', compact('thread'));
    }
}
