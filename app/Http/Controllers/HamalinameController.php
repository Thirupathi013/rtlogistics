<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\HamalinameRequest;
use App\Models\Hamaliname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HamalinameController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-hamaliname');
        $this->middleware('permission:create-hamaliname', ['only' => ['create','store']]);
        $this->middleware('permission:update-hamaliname', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-hamaliname', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $hamalinames = Hamaliname::where('hamaliname', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $hamalinames = Hamaliname::paginate(setting('record_per_page', 15));
        }
        $title =  '';
        return view('hamaliname.index', compact('hamalinames','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Hamali name';
        return view('hamaliname.create', compact( 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HamalinameRequest $request)
    {
        $hamaliname = $request->all();
        $hamaliname['created_by'] =Auth::id();

        Hamaliname::create($hamaliname);
        flash('Hamaliname created successfully!')->success();
        return redirect()->route('hamaliname.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Hamaliname $hamaliname)
    {
        // var_dump($hamaliname);
        $title = "Hamaliname Details";

        return view('hamaliname.show', compact('title', 'hamaliname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Hamaliname $hamaliname)
    {
        $title = "";

        return view('hamaliname.edit', compact('title', 'hamaliname'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(HamalinameRequest $request, Hamaliname $hamaliname)
    {
        $postdata = $request->all();
        if ( ! isset($request['status']) )
            {
                $postdata['status'] = 0;
            }

        $hamaliname->update($postdata);
        flash('Hamaliname updated successfully!')->success();
        return redirect()->route('hamaliname.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hamaliname $hamaliname)
    {
        $hamaliname->delete();
        flash('Hamaliname deleted successfully!')->info();
        return back();
    }
}
