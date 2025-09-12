<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Category;
use App\Services\CareerService;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    protected $careerService;

    public function __construct()
    {
        $this->careerService = new CareerService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::all();
        return view('front-office.admin.career.index', compact(['careers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('front-office.admin.career.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->careerService->store($request);
        return redirect()->route('career.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->careerService->update($request, $id);
        return redirect()->route('career.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->careerService->destroy($id);
        return redirect()->route('career.index');
    }
}
