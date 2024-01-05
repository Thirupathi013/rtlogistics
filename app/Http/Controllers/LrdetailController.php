<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\LrdetailRequest;
use App\Models\Lrdetail;
use App\Models\Bookingstation;
use App\Models\Destination;
use App\Models\Description;
use App\Models\Partydetail;
use App\Models\Motordetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class LrdetailController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-lrdetail');
        $this->middleware('permission:create-lrdetail', ['only' => ['create','store']]);
        $this->middleware('permission:update-lrdetail', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-lrdetail', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $lrdetails = Lrdetail::where('lr_number', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $lrdetails = Lrdetail::paginate(setting('record_per_page', 15));
        }
        $title =  '';
        return view('lrdetail.index', compact('lrdetails','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $motorid = $request->get('motorid');
        if(empty($motorid)){
            return redirect()->route('motordetail.index')->withErrors("Please select Motordetail");
        }

        $title = 'Create Lr details';
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

        $desclist = Description::all();
        $descriptions = array();
        $descriptions[null] = 'Please Select';
        foreach($desclist as $me_person) {
            $descriptions[$me_person->id] = $me_person->description;
        }
        $pdlist = Partydetail::all();
        $partydetails = array();
        $partydetails[null] = 'Please Select';
        foreach($pdlist as $me_person) {
            $partydetails[$me_person->id] = $me_person->party_name.' '.$me_person->party_gstno;
        }

        $partypaymenttype = [null=>'Please Select',0=>'To pay',1=>'Paid',2=>'Tobe Billed',3=>'FOC'];

        return view('lrdetail.create', compact( 'title','bookingstations','destinations','descriptions','partydetails','partypaymenttype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LrdetailRequest $request)
    {
        $lrdetail = $request->all();
        $lrdetail['created_by'] =Auth::id();
        $lrdetail['lr_date'] =date('Y-m-d');
        $lrdetail['lr_number'] =mt_rand(1000000, 9999999);
        $lrdetail['report_date'] = Carbon::createFromFormat('d/m/Y', $request->report_date)->format('Y-m-d');
        $lrdetail['arrive_date'] = Carbon::createFromFormat('d/m/Y', $request->arrive_date)->format('Y-m-d');
         $md_id = $request->get('md_id');

        Lrdetail::create($lrdetail);
        $this->updateMotordetailRecords($md_id);

        // flash('Lrdetail created successfully!')->success();
        return  redirect()->route('lrdetail.create',['motorid'=> $md_id])->with('message', 'Lrdetail created successfully!');

        flash('Lrdetail created successfully!')->success();
        return redirect()->route('lrdetail.create',['motorid'=> $md_id]);
    }
    private function updateMotordetailRecords($md_id)
    {
        $total_lr = Lrdetail::where('md_id', $md_id)->count();
        $total_article = Lrdetail::where('md_id', $md_id)->sum('article');
        $total_topay = Lrdetail::where('md_id', $md_id)->sum('topay_value');
        $total_paid = Lrdetail::where('md_id', $md_id)->sum('to_paid_value');
        $total_weight = Lrdetail::where('md_id', $md_id)->sum('weight');


        Motordetail::where('id', $md_id)->update([
            'total_lr' => $total_lr,
            'total_article' => $total_article,
            'total_topay' => $total_topay,
            'total_paid' => $total_paid,
            'total_weight' => $total_weight,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Lrdetail $lrdetail)
    {

        $title = "Lrdetail Details";

        return view('lrdetail.show', compact('title', 'lrdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Lrdetail $lrdetail)
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

        $desclist = Description::all();
        $descriptions = array();
        $descriptions[null] = 'Please Select';
        foreach($desclist as $me_person) {
            $descriptions[$me_person->id] = $me_person->description;
        }
        $pdlist = Partydetail::all();
        $partydetails = array();
        $partydetails[null] = 'Please Select';
        foreach($pdlist as $me_person) {
            $partydetails[$me_person->id] = $me_person->party_name.' '.$me_person->party_gstno;
        }
        $lrdetail['report_date'] = Carbon::createFromFormat('Y-m-d', $lrdetail->report_date)->format('d/m/Y');
        $lrdetail['arrive_date'] = Carbon::createFromFormat('Y-m-d', $lrdetail->arrive_date)->format('d/m/Y');

        $partypaymenttype = [null=>'Please Select',0=>'To pay',1=>'Paid',2=>'Tobe Billed',3=>'FOC'];

        return view('lrdetail.edit', compact('title', 'lrdetail','bookingstations','destinations','descriptions','partydetails','partypaymenttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(LrdetailRequest $request, Lrdetail $lrdetail)
    {
        $postdata = $request->all();
        if ( ! isset($request['status']) )
        {
            $postdata['status'] = 0;
        }
        $postdata['report_date'] = Carbon::createFromFormat('d/m/Y', $request->report_date)->format('Y-m-d');
        $postdata['arrive_date'] = Carbon::createFromFormat('d/m/Y', $request->arrive_date)->format('Y-m-d');
        $lrdetail->update($postdata);
        flash('Lrdetail updated successfully!')->success();
        return redirect()->route('lrdetail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lrdetail $lrdetail)
    {
        $lrdetail->delete();
        flash('Lrdetail deleted successfully!')->info();
        return back();
    }
}
