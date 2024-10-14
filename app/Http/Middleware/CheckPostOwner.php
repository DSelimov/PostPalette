<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $post = Post::findOrFail($request->route('id'));

        if ($post->user_id !== Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action.');
        }

        return $next($request);
    }
}
