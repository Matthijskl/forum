<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Helpers\PermissionHelper;
use App\Http\Requests\CommentOnThreadRequest;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function show(Category $category)
    {
        PermissionHelper::can('can_enter_cp');
        $threads = Thread::where('category_id', $category->id)->paginate(10);
        return view('threads.show', compact('threads', 'category'));
    }

    public function Thread(Thread $thread)
    {
        $comments = Comment::where('thread_id', $thread->id)->paginate(15);
        return view('threads.thread', compact('thread', 'comments'));
    }

    public function comment(CommentOnThreadRequest $request, Thread $thread)
    {
        Comment::create([
            'body' => $request->body,
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function create(Request $request, Category $category)
    {
        Thread::create([
            'name' => $request->name,
            'category_id' => $category->id
        ]);

        return redirect()->back();
    }

    public function close(Thread $thread)
    {
        if(!PermissionHelper::has('can_lock_threads'))
        {
            return;
        }

        $thread = Thread::where('id', $thread->id);
        $thread->update([
            'locked' => 1
        ]);
        return redirect()->back();
    }

    public function unlock(Thread $thread)
    {
        if(!PermissionHelper::has('can_unlock_threads'))
        {
            return;
        }

        $thread = Thread::where('id', $thread->id);
        $thread->update([
            'locked' => 0
        ]);
        return redirect()->back();
    }
}
