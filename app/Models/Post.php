<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'slug', 
        'category_id', 
        'user_id', 
        'content', 
        'tags',
        'image', 
        'description'
    ];

    /**
     * payload
     *
     * @param Request $request
     * @return array
     */
    public function rawPayload($request): array
    {
        $payload['title']       = $request['title'];
        $payload['slug']        = Str::slug($request->title, '-');
        $payload['category_id'] = $request['category_id'];
        $payload['user_id']     = Auth::user()->id;
        $payload['content']     = $request['content'];
        $payload['tags'] = !empty($request['hashtags']) ? json_encode(explode(',', $request['hashtags'])) : json_encode('');
        $payload['image']       = $request->file('image') ? $request->file('image')->hashName() : '';
        $payload['description'] = 'description';

        return $payload;
    }
    
    /**
     * validated
     *
     * @param Request $request
     * @return void
     */
    public function validate($request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:2048',
            'category_id' => 'required',
            'content' => 'required',
        ], [
            'title.required' => 'Blog title must be filled',
            'title.max' => 'Blog title cannot exceed 255 characters',
            
            'image.file' => 'Image must be a valid file',
            'image.mimes' => 'Image must be in PNG, JPG, JPEG, or WebP format',
            'image.uploaded' => 'Image size cannot exceed 2MB',
            
            'category_id.required' => 'Category must be selected',
            
            'content.required' => 'Blog content must be filled',
        ]);
    }


    /**
     * category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('/storage/posts/' . $value),
        );
    }

    /**
     * createdAt
     *
     * @return Attribute
     */
    // protected function createdAt(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => \Carbon\Carbon::parse($value)->locale(session('locale'))->translatedFormat('l, d F Y'),
    //     );
    // }

    /**
     * updatedAt
     *
     * @return Attribute
     */
    // protected function updatedAt(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => \Carbon\Carbon::parse($value)->locale(session('locale'))->translatedFormat('l, d F Y'),
    //     );
    // }
}
