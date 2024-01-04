<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\DestinationRequest;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-destination');
        $this->middleware('permission:create-destination', ['only' => ['create','store']]);
        $this->middleware('permission:update-destination', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-destination', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $destinations = Destination::where('destination_name', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $destinations = Destination::paginate(setting('record_per_page', 15));
        }
        $title =  '';
        return view('destination.index', compact('destinations','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Destination';
        return view('destination.create', compact( 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DestinationRequest $request)
    {
        $destination = $request->all();
        $destination['created_by'] =Auth::id();

        Destination::create($destination);
        flash('Destination created successfully!')->success();
        return redirect()->route('destination.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        // var_dump($destination);
        $title = "Destination Details";

        return view('destination.show', compact('title', 'destination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        $title = "Destination Details";

        return view('destination.edit', compact('title', 'destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(DestinationRequest $request, Destination $destination)
    {
        $postdata = $request->all();

        if ( ! isset($request['status']) )
            {
                $postdata['status'] = 0;
            }

        $destination->update($postdata);
        flash('Destination updated successfully!')->success();
        return redirect()->route('destination.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        flash('Destination deleted successfully!')->info();
        return back();
    }
}
