<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Http\Resources\postsResource;
use App\Http\Resources\postsResourceCollection;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['success' => true, 'data' => postsResourceCollection::make(Posts::paginate())]);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostsRequest $request)
    {

        $validate = $request->validated();

        Posts::query()->updateOrCreate([
            Posts::USER_ID => Auth::id(),
            Posts::TITLE => $request->input(Posts::TITLE),
            Posts::SLUG => $request->input(Posts::SLUG),
            Posts::DESC => $request->input(Posts::DESC),
        ]);

        return response('پست شما با موفقیت ساخته شد.', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
        return response()->json(['success' => true, 'data' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostsRequest $request, Posts $post)
    {
        $validate = $request->validated();

        $post->update([
            Posts::TITLE => $request->input(Posts::TITLE),
            Posts::DESC => $request->input(Posts::DESC),
        ]);

        return response(['پست شما با موفقیت ویرایش شد.'],202);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        $post->deleteOrFail();
        return response('پست شما با حذف ساخته شد.', 200);

    }
}
