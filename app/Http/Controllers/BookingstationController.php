<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\BookingstationRequest;
use App\Models\Bookingstation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookingStationController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-bookingstation');
        $this->middleware('permission:create-bookingstation', ['only' => ['create','store']]);
        $this->middleware('permission:update-bookingstation', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-bookingstation', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $bookingstations = Bookingstation::where('bs_name', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $bookingstations = Bookingstation::paginate(setting('record_per_page', 15));
        }


        $title =  '';
        return view('bookingstation.index', compact('bookingstations','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Booking Station';
        return view('bookingstation.create', compact( 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingstationRequest $request)
    {
        $bookingstation = $request->all();


        $bookingstation['created_by'] =  Auth::id();

        Bookingstation::create($bookingstation);
        flash('Bookingstation created successfully!')->success();
        return redirect()->route('bookingstation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Bookingstation $bookingstation)
    {
        // var_dump($bookingstation);
        $title = "Booking Statin Details";


        return view('bookingstation.show', compact('title', 'bookingstation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookingstation $bookingstation)
    {
        $title = "Booking Statin Details";

        return view('bookingstation.edit', compact('title', 'bookingstation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(BookingstationRequest $request, Bookingstation $bookingstation)
    {
        $postdata = $request->all();
        if ( ! isset($request['status']) )
            {
                $postdata['status'] = 0;
            }

        $bookingstation->update($postdata);
        flash('Bookingstation updated successfully!')->success();
        return redirect()->route('bookingstation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookingstation $bookingstation)
    {
        $bookingstation->delete();
        flash('Bookingstation deleted successfully!')->info();
        return back();
    }
}
