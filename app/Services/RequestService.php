<?php

namespace App\Services;

use App\Models\Request;
use Illuminate\Support\Facades\DB;

class RequestService {
    
    private $modelRequest;

    public function __construct()
    {
        $this->modelRequest = new Request();
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $payload = $this->modelRequest->rawPayload($request);
            $this->modelRequest->create($payload);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
        $Request = Request::findOrFail($id);

        $Request->delete();
    }
}