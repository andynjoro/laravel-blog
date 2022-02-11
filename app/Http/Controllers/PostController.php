<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\PostService;


class PostController extends Controller
{
    public function index(Request $request, PostService $postService)
    {
        $sort = $request->query('sort');

        $sort = (in_array($sort, ["asc", "desc"])) ? $sort : 'desc';

        $user = Auth::user();

        $posts = $postService->getUserPosts($user, $sort);

        return view('posts.index', ['posts' => $posts, 'sort' => $sort]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request, PostService $postService)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts',
            'description' => 'required',
        ]);

        $user = Auth::user();

        try {
            $postService->createUserPost($user, $validated);
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect()
            ->route('posts.create')
            ->with('status', 'Post successfully created! Create another post or click on dashboard to view your posts.');
    }
}
