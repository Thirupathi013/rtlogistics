<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PartydetailRequest;
use App\Models\Partydetail;
use App\Models\Marketingexecutive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PartydetailController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-partydetail');
        $this->middleware('permission:create-partydetail', ['only' => ['create','store']]);
        $this->middleware('permission:update-partydetail', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-partydetail', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $partydetails = Partydetail::where('party_gstno', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $partydetails = Partydetail::paginate(setting('record_per_page', 15));
        }
        $title =  '';
        return view('partydetail.index', compact('partydetails','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $melist = Marketingexecutive::all();
$marketingexecutives = array();
$marketingexecutives[null] = 'Please Select';
foreach($melist as $me_person) {
    $marketingexecutives[$me_person->id] = $me_person->me_name;
}
$partypaymenttype = [null=>'Please Select',0=>'To pay',1=>'Paid',2=>'Tobe Billed',3=>'FOC'];
        $title = '';

        return view('partydetail.create', compact( 'title','partypaymenttype','marketingexecutives'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartydetailRequest $request)
    {
        $partydetail = $request->all();
        $partydetail['created_by'] =Auth::id();


        Partydetail::create($partydetail);
        flash('Partydetail created successfully!')->success();
        return redirect()->route('partydetail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Partydetail $partydetail)
    {
        // var_dump($partydetail);
        $title = "Partydetail Details";

        return view('partydetail.show', compact('title', 'partydetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Partydetail $partydetail)
    {
        $title = "";
        $melist = Marketingexecutive::all();
        $marketingexecutives = array();
        $marketingexecutives[null] = 'Please Select';
        foreach($melist as $me_person) {
            $marketingexecutives[$me_person->id] = $me_person->me_name;
        }
        $partypaymenttype = [null=>'Please Select',0=>'To pay',1=>'Paid',2=>'Tobe Billed',3=>'FOC'];

        return view('partydetail.edit', compact('title', 'partydetail','partypaymenttype','marketingexecutives'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PartydetailRequest $request, Partydetail $partydetail)
    {
        $postdata = $request->all();
        if ( ! isset($request['status']) )
            {
                $postdata['status'] = 0;
            }

        $partydetail->update($postdata);
        flash('Partydetail updated successfully!')->success();
        return redirect()->route('partydetail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partydetail $partydetail)
    {
        $partydetail->delete();
        flash('Partydetail deleted successfully!')->info();
        return back();
    }
}
