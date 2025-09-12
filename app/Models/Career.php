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
        'user_id', 
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
        $payload['user_id']     = Auth::user()->id;
        
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
        $request->validate([
            'title' => 'required',
        ],[
            'title.required' => 'Please fill career title'
        ]);
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
}
