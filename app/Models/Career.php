<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Career extends Model
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
        $payload['title']       = $request['title'];
        $payload['slug']        = Str::slug($request->title, '-');
        $payload['category_id'] = $request['category_id'];
        $payload['user_id']     = Auth::user()->id;
        $payload['content']     = $request['content'];
        $payload['location']    = $request['location'];
        $payload['end_date']    = $request['end_date'];
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
            'category_id' => 'required',
            'content' => 'required',
            'location' => 'required',
            'end_date' => 'required|date|after_or_equal:today'
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

    /**
     * endDate
     *
     * @return Attribute
     */
    protected function endDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->locale(session('locale'))->translatedFormat('l, d F Y'),
        );
    }
}
