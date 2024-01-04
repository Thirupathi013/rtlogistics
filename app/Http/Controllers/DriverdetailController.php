<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\DriverdetailRequest;
use App\Models\Driverdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DriverdetailController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-driverdetail');
        $this->middleware('permission:create-driverdetail', ['only' => ['create','store']]);
        $this->middleware('permission:update-driverdetail', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-driverdetail', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $driverdetails = Driverdetail::where('driver_name', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $driverdetails = Driverdetail::paginate(setting('record_per_page', 15));
        }
        $title =  '';
        return view('driverdetail.index', compact('driverdetails','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Driver and Vehicel detail';
        return view('driverdetail.create', compact( 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverdetailRequest $request)
    {
        $driverdetail = $request->all();
        $driverdetail['created_by'] =Auth::id();

        Driverdetail::create($driverdetail);
        flash('Driverdetail created successfully!')->success();
        return redirect()->route('driverdetail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Driverdetail $driverdetail)
    {
        // var_dump($driverdetail);
        $title = "Driverdetail Details";

        return view('driverdetail.show', compact('title', 'driverdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Driverdetail $driverdetail)
    {
        $title = "Driver and Vehicle Details";

        return view('driverdetail.edit', compact('title', 'driverdetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(DriverdetailRequest $request, Driverdetail $driverdetail)
    {
        $postdata = $request->all();
        if ( ! isset($request['status']) )
            {
                $postdata['status'] = 0;
            }

        $driverdetail->update($postdata);
        flash('Driverdetail updated successfully!')->success();
        return redirect()->route('driverdetail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driverdetail $driverdetail)
    {
        $driverdetail->delete();
        flash('Driverdetail deleted successfully!')->info();
        return back();
    }
}
