<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Services\CandidateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CandidateController extends Controller
{
    protected $candidateService;

    public function __construct()
    {
        $this->candidateService = new CandidateService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view('front-office.admin.candidate.index', compact(['candidates']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->candidateService->store($request);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->candidateService->destroy($id);
        return redirect()->route('candidate.index');
    }
    
    /**
     * Download file resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadFile($candidateName, $fileName)
    {
        $path = 'public/cv/' . $fileName;

        if (!Storage::exists($path)) {
            abort(404, 'File not found.');
        }

        return Storage::download('public/cv/' . $fileName, Str::slug($candidateName, '_') . '_cv.pdf', [
            'Content-Type' => 'application/pdf',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
        ]);
    }
}
