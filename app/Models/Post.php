<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        $payload['title']        = $request['title'];
        $payload['slug']        = Str::slug($request->title, '-');
        $payload['category_id'] = $request['category_id'];
        $payload['user_id']     = '1';
        $payload['content']     = $request['content'];
        $payload['image']       = $request->file('image') ? $request->file('image')->hashName() : '';
        $payload['description'] = 'description';

        return $payload;
    }
    
    /**
     * validated
     *
     * @param Request $request
     * @return Request
     */
    public function validate($request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:1024',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        return $validated;
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
     * comments
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * tags
     *
     * @return void
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->locale(session('locale'))->translatedFormat('l, d F Y'),
        );
    }

    /**
     * updatedAt
     *
     * @return Attribute
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->locale(session('locale'))->translatedFormat('l, d F Y'),
        );
    }
}
