<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\DescriptionRequest;
use App\Models\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DescriptionController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-description');
        $this->middleware('permission:create-description', ['only' => ['create','store']]);
        $this->middleware('permission:update-description', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-description', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $descriptions = Description::where('description', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $descriptions = Description::paginate(setting('record_per_page', 15));
        }
        $title =  '';
        return view('description.index', compact('descriptions','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Description';
        return view('description.create', compact( 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DescriptionRequest $request)
    {
        $description = $request->all();
        $description['created_by'] =Auth::id();

        Description::create($description);
        flash('Description created successfully!')->success();
        return redirect()->route('description.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Description $description)
    {
        // var_dump($description);
        $title = "Description Details";

        return view('description.show', compact('title', 'description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Description $description)
    {
        $title = "Description Details";

        return view('description.edit', compact('title', 'description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(DescriptionRequest $request, Description $description)
    {
        $postdata = $request->all();
        if ( ! isset($request['status']) )
            {
                $postdata['status'] = 0;
            }

        $description->update($postdata);
        flash('Description updated successfully!')->success();
        return redirect()->route('description.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Description $description)
    {
        $description->delete();
        flash('Description deleted successfully!')->info();
        return back();
    }
}
