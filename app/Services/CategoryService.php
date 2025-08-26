<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryService {
    
    private $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new Category();
    }

    public function store($request)
    {
        $validated = $this->modelCategory->validate($request);
        // DB::beginTransaction();
        // try {
            $payload = $this->modelCategory->rawPayload($validated);
            if ($request->file('image')) {
                $image = $request->file('image');
                $image->storeAs('categories', $image->hashName(), 'public');
            }

            $this->modelCategory->create($payload);
            
        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        // }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $payload = $this->modelCategory->rawPayload($request);
            $category = $this->modelCategory->find($id);
            
            //check image update
            if ($request->file('image')) {

                //remove old image
                Storage::disk('public')->delete('categories/'.basename($category->image));
            
                //upload new image
                $image = $request->file('image');
                $image->storeAs('categories', $image->hashName(), 'public');

                //update category with new image
                $category->update([
                    'image'=> $image->hashName(),
                    'name' => $request->name,
                    'slug' => Str::slug($request->name, '-'),
                ]);

            }

            $category->update($payload);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // Storage::disk('public')->delete('categories/'.basename($category->image));

        $category->delete();
    }
}