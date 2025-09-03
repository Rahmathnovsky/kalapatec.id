<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'phone', 
        'company_name', 
        'product_request', 
        'description', 
        'request_type'
    ];

    /**
     * payload
     *
     * @param Request $request
     * @return array
     */
    public function rawPayload($request): array
    {
        $payload['name']         = $request['name'];
        $payload['phone']        = $request['phone'];
        $payload['company_name'] = $request['company_name'];
        $payload['product_request']     = $request['product_request'];
        $payload['description']  = $request['description'];
        $payload['request_type'] = $request->file('request_type');

        return $payload;
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
}
