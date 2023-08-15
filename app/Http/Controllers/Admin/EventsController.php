<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Events;
use DB;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::select('id','title','location','description','sponsors','event_date','event_image')->orderBy('id', 'DESC')->paginate(20);
        
        return Inertia::render('Admin/dashboard',[
            'events'=> $events

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Events/create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $event_image = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
       $request->file('image')->move(public_path('img/events/'), $event_image);


       $category = Events::create([
           
            'title' => $request->title,
            'description'  => $request->description,
            'location'  => $request->location,
            'sponsors'  => $request->sponsors,
            'event_date'  => $request->date,
            'event_image'  => $event_image,
       ]);
       if($category){
        $successmessage = 'Event Created Successsfully';
        return redirect()->route('admin.home')->with('successmessage',$successmessage);
       }
       else{

           return back();
       }
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del=Events::findOrFail($id);
        
        $del->delete();
        
        $successmessage = 'Deleted Successsfully';
        return redirect()->route('admin.home')->with('successmessage',$successmessage);
    }
}
