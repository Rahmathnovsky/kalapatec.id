<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'position_id',
        'gender',
        'dob',
        'address',
        'pob',
        'marital_status',
        'religion',
        'province',
        'regency',
        'education',
        'cv',
    ];

    /**
     * payload
     *
     * @param Request $request
     * @return array
     */
    public function rawPayload($request): array
    {
        $payload['name']            = $request['name'];
        $payload['phone']           = $request['phone'];
        $payload['email']           = $request['email'];
        $payload['position_id']     = $request['position_id'];
        $payload['gender']          = $request['gender'];
        $payload['dob']             = $request['dob'];
        $payload['address']         = $request['address'];
        $payload['pob']             = $request['pob'];
        $payload['marital_status']  = $request['marital_status'];
        $payload['religion']        = $request['religion'];
        $payload['province']        = $request['province'];
        $payload['regency']         = $request['regency'];
        $payload['education']       = $request['education'];
        $payload['cv']              = $request->file('cv') ? $request->file('cv')->hashName() : '';

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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'pob' => 'required',
            'marital_status' => 'required',
            'religion' => 'required',
            'province' => 'required',
            'regency' => 'required',
            'education' => 'required',
            'cv' => 'required|mimes:pdf|max:5120'
        ], [
            'name.required' => 'Name must be filled',
            'name.max' => 'Name cannot exceed 255 characters',

            'email.required' => 'Email must be filled',
            'email.email' => 'Email format is invalid',

            'phone.required' => 'Phone must be filled',
            
            'dob.required' => 'Date of Birth must be filled',

            'address.required' => 'Address must be filled',

            'pob.required' => 'Place of Birth must be filled',

            'marital_status.required' => 'Marital status must be filled',

            'religion.required' => 'Religion must be filled',

            'province.required' => 'Province must be filled',

            'regency.required' => 'Regency must be filled',

            'education.required' => 'Education be filled',

            'cv.required' => 'Curriculum Vitae must be filled',
            'cv.mimes' => 'Curriculum Vitae must be in PNG, JPG, JPEG, or WebP format',
            'cv.uploaded' => 'Curriculum Vitae size cannot exceed 2MB',
        ]);
    }

    /**
     * career
     *
     * @return void
     */
    public function career()
    {
        return $this->belongsTo(Career::class, 'position_id', 'id');
    }
}
