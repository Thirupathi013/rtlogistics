<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PartyRequest;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PartyController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-post');
        $this->middleware('permission:create-post', ['only' => ['create','store']]);
        $this->middleware('permission:update-post', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-post', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $parties = Party::where('party_gstno', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $parties = Party::paginate(setting('record_per_page', 15));
        }
        $title =  'Manage Parties';
        return view('party.index', compact('parties','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Party';
        return view('party.create', compact( 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartyRequest $request)
    {
        $party = $request->all();

        Party::create($party);
        flash('Party created successfully!')->success();
        return redirect()->route('party.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        // var_dump($party);
        $title = "Party Details";

        return view('party.show', compact('title', 'party'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Party $party)
    {
        $title = "Party Details";

        return view('party.edit', compact('title', 'party'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PartyRequest $request, Party $party)
    {
        $postdata = $request->all();

        $party->update($postdata);
        flash('Party updated successfully!')->success();
        return redirect()->route('party.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        $party->delete();
        flash('Party deleted successfully!')->info();
        return back();
    }
}
