<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostCreatedNotification;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::query()
            ->with(['website'])->get();
        return PostResource::collection($posts);
    }

    public function store(StorePostRequest $request, Post $post)
    {
        $data = $request->validated();

        // I am trying to make the notification on command by writing
        // php artisan sendmail:generate

        //   $post = Post::create($data);

        // $subscribed_user = DB::table('user_website')
        //     ->Where('website_id',  $data['website_id'])
        //     ->get();
        // Notification::send($subscribed_user,  new PostCreatedNotification($post));

        return  new PostResource(Post::create($data));
    }


    public function show(Post $post)
    {
        return new PostResource($post);
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return new PostResource($post);
    }
    public function destroy(Post $post)
    {
        $post->delete();

        return response('', 204);
    }
}
