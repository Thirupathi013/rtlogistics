<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\MotordetailRequest;
use App\Models\Motordetail;
use App\Models\Bookingstation;
use App\Models\Driverdetail;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MotordetailController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-motordetail');
        $this->middleware('permission:create-motordetail', ['only' => ['create','store']]);
        $this->middleware('permission:update-motordetail', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-motordetail', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $motordetails = Motordetail::where('motordetail', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $motordetails = Motordetail::paginate(setting('record_per_page', 15));
        }
        $title =  '';
        return view('motordetail.index', compact('motordetails','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bslist = Bookingstation::all();
        $bookingstations = array();
        $bookingstations[null] = 'Please Select';
        foreach($bslist as $me_person) {
            $bookingstations[$me_person->id] = $me_person->bs_name;
        }

        $dslist = Destination::all();
        $destinations = array();
        $destinations[null] = 'Please Select';
        foreach($dslist as $me_person) {
            $destinations[$me_person->id] = $me_person->destination_name;
        }
        $ddlist = Driverdetail::all();
        $driverlist = array();
        $driverlist[null] = 'Please Select';
        foreach($ddlist as $me_person) {
            $driverlist[$me_person->id] = $me_person->vehicle_number.' - '.$me_person->driver_name;
        }

        $title = '';
        return view('motordetail.create', compact( 'title','bookingstations','destinations','driverlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotordetailRequest $request)
    {
        $motordetail = $request->all();
        $motordetail['created_by'] =Auth::id();
        $motordetail['report_date'] = Carbon::createFromFormat('d/m/Y', $request->report_date)->format('Y-m-d');
        $motordetail['arrival_date'] = Carbon::createFromFormat('d/m/Y', $request->arrival_date)->format('Y-m-d');
        var_dump($motordetail);
        die();
        $id = Motordetail::create($motordetail)->id;


    return redirect('lrdetail/create/'.$id);
        flash('Motordetail created successfully!')->success();
        return redirect()->route('motordetail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Motordetail $motordetail)
    {
        // var_dump($motordetail);
        $title = "Motordetail Details";

        return view('motordetail.show', compact('title', 'motordetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Motordetail $motordetail)
    {
        $title = "";

        $bslist = Bookingstation::all();
        $bookingstations = array();
        $bookingstations[null] = 'Please Select';
        foreach($bslist as $me_person) {
            $bookingstations[$me_person->id] = $me_person->bs_name;
        }

        $dslist = Destination::all();
        $destinations = array();
        $destinations[null] = 'Please Select';
        foreach($dslist as $me_person) {
            $destinations[$me_person->id] = $me_person->destination_name;
        }
        $ddlist = Driverdetail::all();
        $driverlist = array();
        $driverlist[null] = 'Please Select';
        foreach($ddlist as $me_person) {
            $driverlist[$me_person->id] = $me_person->vehicle_number.' - '.$me_person->driver_name;
        }
        $motordetail['report_date'] = Carbon::createFromFormat('Y-m-d', $motordetail->report_date)->format('d/m/Y');
        $motordetail['arrival_date'] = Carbon::createFromFormat('Y-m-d', $motordetail->arrival_date)->format('d/m/Y');

        return view('motordetail.edit', compact('title', 'motordetail','bookingstations','destinations','driverlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(MotordetailRequest $request, Motordetail $motordetail)
    {
        $postdata = $request->all();
        if ( ! isset($request['status']) )
            {
                $postdata['status'] = 0;
            }
            $postdata['report_date'] = Carbon::createFromFormat('d/m/Y', $request->report_date)->format('Y-m-d');
        $postdata['arrival_date'] = Carbon::createFromFormat('d/m/Y', $request->arrival_date)->format('Y-m-d');

        $motordetail->update($postdata);
        flash('Motordetail updated successfully!')->success();
        return redirect()->route('motordetail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motordetail $motordetail)
    {
        $motordetail->delete();
        flash('Motordetail deleted successfully!')->info();
        return back();
    }
}
