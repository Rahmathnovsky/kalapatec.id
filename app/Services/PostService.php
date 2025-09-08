<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService {
    
    private $modelPost;

    public function __construct()
    {
        $this->modelPost = new Post();
    }

    public function store($request)
    {
        $this->modelPost->validate($request);
        DB::beginTransaction();
        try {
            $payload = $this->modelPost->rawPayload($request);
            if ($request->file('image')) {
                $image = $request->file('image');
                $image->storeAs('posts', $image->hashName(), 'public');
            }

            $this->modelPost->create($payload);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function update($request, $id)
    {
        $this->modelPost->validate($request);
        DB::beginTransaction();
        try {
            $payload = $this->modelPost->rawPayload($request);
            $post = $this->modelPost->find($id);

            if ($request->hasFile('image')) {
                if ($post->image) {
                    Storage::disk('public')->delete('posts/' . $post->getRawOriginal('image'));
                }

                $image = $request->file('image');
                $image->storeAs('posts', $image->hashName(), 'public');
                $payload['image'] = $image->hashName();
            } else {
                $payload['image'] = $post->getRawOriginal('image');
            }

            $post->update($payload);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();
    }
}