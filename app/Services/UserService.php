<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService {
    
    private $modelUser;

    public function __construct()
    {
        $this->modelUser = new User();
    }

    public function store($request)
    {
        $validated = $this->modelUser->validate($request);
        DB::beginTransaction();
        try {
            $payload = $this->modelUser->rawPayload($validated);
            $this->modelUser->create($payload);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $payload = $this->modelUser->rawPayload($request);
            $user = $this->modelUser->find($id);
            $user->update($payload);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
    }
}