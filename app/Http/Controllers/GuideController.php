<?php

namespace App\Http\Controllers;

use App\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:guide-list|guide-create|guide-edit|guide-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:guide-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:guide-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:guide-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listGuides = Guide::latest()->paginate(5);
        return view('guides.index', compact('guides'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);


        Guide::create($request->all());

        return redirect()->route('guides.index')->with('success', 'Guide created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Guide $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        return view('guides.show', compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Guide $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        return view('guides.edit', compact('guide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Guide $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);


        $guide->update($request->all());

        return redirect()->route('guides.index')->with('success', 'Guide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Guide $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect()->route('guides.index')->with('success', 'Guide deleted successfully');
    }
}