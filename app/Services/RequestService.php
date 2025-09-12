<?php

namespace App\Services;

use App\Mail\RequestNotification;
use App\Models\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
            $notificationPayload = $this->modelRequest->create($payload);
            
            $recipients = User::pluck('email')->toArray();
            $recipients[] = $request->email;
            Mail::to($recipients)->send(new RequestNotification($notificationPayload));
            
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