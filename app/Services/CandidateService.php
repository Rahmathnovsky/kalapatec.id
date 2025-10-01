<?php

namespace App\Services;

use App\Enums\Emails;
use App\Helpers\RecaptchaHelper;
use App\Mail\CareerNotification;
use App\Models\Candidate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CandidateService {
    
    private $modelCandidate;

    public function __construct()
    {
        $this->modelCandidate = new Candidate();
    }

    public function store($request)
    {
        $this->modelCandidate->validate($request);
        DB::beginTransaction();
        try {
            RecaptchaHelper::verify($request);
            $payload = $this->modelCandidate->rawPayload($request);
            if ($request->file('cv')) {
                $cv = $request->file('cv');
                $cv->storeAs('cv', $cv->hashName(), 'public');
            }

            $notificationPayload =  $this->modelCandidate->create($payload);
            Mail::to(Emails::RECRUITMENT)->send(new CareerNotification($notificationPayload));
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $payload = $this->modelCandidate->rawPayload($request);
            $candidate = $this->modelCandidate->find($id);
            $candidate->update($payload);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        Storage::disk('public')->delete('cv/' . $candidate->getRawOriginal('cv'));
        $candidate->delete();
    }
}