<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
        );
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
        $payload['email']     = $request['email'];
        if ($request->filled('password')) {
            $payload['password'] = bcrypt($request->password);
        }
        $payload['remember_token'] = Str::random(10);
        $payload['role']      = $request['role'];

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
            'password' => 'required|min:8',
            'role' => 'required'
        ], [
            'name.required' => 'Name must be filled',
            'name.max' => 'Name cannot exceed 255 characters',

            'email.required' => 'Email must be filled',
            'email.email' => 'Email format is invalid',
            'email.unique' => 'Email is already registered',

            'password.required' => 'Password must be filled',
            'password.min' => 'Password must be at least 8 characters',

            'role.required' => 'Role must be selected',
        ]);
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
     * Check if user has any role that matches
     *
     * @param array $roles
     * @return boolean
     */
    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->role, $roles);
    }
}
