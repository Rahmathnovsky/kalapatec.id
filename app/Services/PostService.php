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
        $validated = $this->modelPost->validate($request);
        DB::beginTransaction();
        try {
            $payload = $this->modelPost->rawPayload($validated);
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
        DB::beginTransaction();
        try {
            $payload = $this->modelPost->rawPayload($request);
            $post = $this->modelPost->find($id);

            //check image update
            if ($request->file('image')) {

                //remove old image
                Storage::disk('public')->delete('categories/'.basename($post->image));
            
                //upload new image
                $image = $request->file('image');
                $image->storeAs('categories', $image->hashName(), 'public');

                //update post with new image
                $post->update($request->all());

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