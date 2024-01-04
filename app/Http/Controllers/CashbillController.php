<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CashbillRequest;
use App\Models\Cashbill;
use App\Models\Lrdetail;
use App\Models\Partydetail;
use App\Models\Driverdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CashbillController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-cashbill');
        $this->middleware('permission:create-cashbill', ['only' => ['create','store']]);
        $this->middleware('permission:update-cashbill', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-cashbill', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $cashbills = Cashbill::where('bill_number', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $cashbills = Cashbill::paginate(setting('record_per_page', 15));
        }
        $title =  '';
        return view('cashbill.index', compact('cashbills','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '';
        $lrlist = Lrdetail::all();
        $lrdetails = array();
        $lrdetails[null] = 'Please Select';
        foreach($lrlist as $me_person) {
            $lrdetails[$me_person->id] = $me_person->lr_number;
        }

        $pdlist = Partydetail::all();
        $partydetails = array();
        $partydetails[null] = 'Please Select';
        foreach($pdlist as $me_person) {
            $partydetails[$me_person->id] = $me_person->party_gstno;
        }

        $driverlist = Driverdetail::all();
        $driverdetails = array();
        $driverdetails[null] = 'Please Select';
        foreach($driverlist as $me_person) {
            $driverdetails[$me_person->id] = $me_person->driver_name;
        }
        $partypaymenttype = [null=>'Please Select','CASH'=>'Cash','DUE'=>'Due'];
        $print_types = [null=>'Please Select','YES'=>'YES','NO'=>'NO'];

        return view('cashbill.create', compact( 'title','lrdetails','partydetails','driverdetails','print_types','partypaymenttype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CashbillRequest $request)
    {
        $cashbill = $request->all();
        $cashbill['created_by'] =Auth::id();
        $cashbill['bill_date'] =date('Y-m-d');
        $cashbill['bill_number'] =mt_rand(1000000, 9999999);
        $lrids = $cashbill['lrids'];
        $data = Cashbill::create($cashbill);
        $lr_details = [];
        for($i= 0; $i < count($lrids); $i++){
            $lr_details[] = [
                'lr_id' => $lrids[$i],
                'cash_bill_id' => $data->id,

            ];
        }

        \DB::table('cashbilllrdetails')->insert($lr_details);




        flash('Cashbill created successfully!')->success();
        return redirect()->route('cashbill.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Cashbill $cashbill)
    {
        // var_dump($cashbill);
        $title = "Cashbill Details";

        return view('cashbill.show', compact('title', 'cashbill'));
    }
    public function fetchlrdata(Request $request)
    {

    $id= $request->id;

      $data = Lrdetail::find($id);
      echo json_encode($data);

    }
    public function updatelrdata(Request $request)
    {

    $id= $request->id;

    Lrdetail::where('id', $id)
    ->update(['article' => $request->input('lrarticle'),
             'lr_pay_status'=>$request->input('lr_pay_status'),
             'topay_value'=>$request->input('lrtopay'),
             'weight'=>$request->input('lrweight')]
            );
      echo 'SUCCESS';

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Cashbill $cashbill)
    {
        $title = "";
        $lrlist = Lrdetail::all();
        $lrdetails = array();
        $lrdetails[null] = 'Please Select';
        foreach($lrlist as $me_person) {
            $lrdetails[$me_person->id] = $me_person->lr_number;
        }

        $pdlist = Partydetail::all();
        $partydetails = array();
        $partydetails[null] = 'Please Select';
        foreach($pdlist as $me_person) {
            $partydetails[$me_person->id] = $me_person->party_gstno;
        }

        $driverlist = Driverdetail::all();
        $driverdetails = array();
        $driverdetails[null] = 'Please Select';
        foreach($driverlist as $me_person) {
            $driverdetails[$me_person->id] = $me_person->driver_name;
        }
        $partypaymenttype = [null=>'Please Select','CASH'=>'Cash','DUE'=>'Due'];
        $print_types = [null=>'Please Select','YES'=>'YES','NO'=>'NO'];

        // $seletctedlrs = \DB::table('cashbilllrdetails')->where('cash_bill_id' , $cashbill->id)->get();
        // $catRelation = Db::table('lrdetails')->whereIn('product_id', $fetchID);



        var_dump($seletctedlrs);


        return view('cashbill.edit', compact('title', 'cashbill','lrdetails','partydetails','driverdetails','print_types','partypaymenttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(CashbillRequest $request, Cashbill $cashbill)
    {
        $postdata = $request->all();


        $cashbill->update($postdata);
        flash('Cashbill updated successfully!')->success();
        return redirect()->route('cashbill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashbill $cashbill)
    {
        $cashbill->delete();
        flash('Cashbill deleted successfully!')->info();
        return back();
    }
}
