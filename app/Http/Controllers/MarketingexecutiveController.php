<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\MarketingexecutiveRequest;
use App\Models\Marketingexecutive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MarketingexecutiveController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-marketingexecutive');
        $this->middleware('permission:create-marketingexecutive', ['only' => ['create','store']]);
        $this->middleware('permission:update-marketingexecutive', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-marketingexecutive', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $marketingexecutives = Marketingexecutive::where('marketingexecutive', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $marketingexecutives = Marketingexecutive::paginate(setting('record_per_page', 15));
        }
        $title =  '';
        return view('marketingexecutive.index', compact('marketingexecutives','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Marketingexecutive';
        return view('marketingexecutive.create', compact( 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarketingexecutiveRequest $request)
    {
        $marketingexecutive = $request->all();
        $marketingexecutive['created_by'] =Auth::id();

        Marketingexecutive::create($marketingexecutive);
        flash('Marketingexecutive created successfully!')->success();
        return redirect()->route('marketingexecutive.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Marketingexecutive $marketingexecutive)
    {
        // var_dump($marketingexecutive);
        $title = "Marketingexecutive Details";

        return view('marketingexecutive.show', compact('title', 'marketingexecutive'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Marketingexecutive $marketingexecutive)
    {
        $title = "Marketingexecutive Details";

        return view('marketingexecutive.edit', compact('title', 'marketingexecutive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(MarketingexecutiveRequest $request, Marketingexecutive $marketingexecutive)
    {
        $postdata = $request->all();
        if ( ! isset($request['status']) )
            {
                $postdata['status'] = 0;
            }

        $marketingexecutive->update($postdata);
        flash('Marketingexecutive updated successfully!')->success();
        return redirect()->route('marketingexecutive.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marketingexecutive $marketingexecutive)
    {
        $marketingexecutive->delete();
        flash('Marketingexecutive deleted successfully!')->info();
        return back();
    }
}
