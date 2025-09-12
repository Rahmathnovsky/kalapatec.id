<?php

namespace App\Services;

use App\Models\Career;
use Illuminate\Support\Facades\DB;

class CareerService {
    
    private $modelCareer;

    public function __construct()
    {
        $this->modelCareer = new Career();
    }

    public function store($request)
    {
        $this->modelCareer->validate($request);
        DB::beginTransaction();
        try {
            $payload = $this->modelCareer->rawPayload($request);

            $this->modelCareer->create($payload);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $payload = $this->modelCareer->rawPayload($request);
            $career = $this->modelCareer->find($id);
            $career->update($payload);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();
    }
}