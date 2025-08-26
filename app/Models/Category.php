<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'slug', 
        'image'
    ];

    /**
     * validated
     *
     * @param Request $request
     * @return Request
     */
    public function validate($request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        return $validated;
    }

    /**
     * payload
     *
     * @param Request $request
     * @return array
     */
    public function rawPayload($request): array
    {
        $payload['name']      = $request['name'];
        $payload['slug']      = Str::slug($request['name'], '-');
        // $payload['image']     = $request->file('image')->hashName();

        return $payload;
    }

    /**
     * posts
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('/storage/categories/' . $value),
        );
    }
}
