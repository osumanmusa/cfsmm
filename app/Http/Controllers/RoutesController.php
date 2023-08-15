<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Events;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::select('id','title','location','description','sponsors','event_date','event_image')->orderBy('id', 'DESC')->paginate(20);
        
        return Inertia::render('Welcome',[
            'events'=> $events

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(string $id)
    {
        $event = Events::select('id','title','location','description','sponsors','event_date','event_image')->where('id','=',$id)->get();
        
        return Inertia::render('Welcome',[
            'event'=> $event

        ]);
    }
    public function skills()
    {
        return Inertia::render('Skills');
    }
    public function porfolio()
    {
        return Inertia::render('Portfolio');
    }
    public function services()
    {
        return Inertia::render('Services');
    }
    public function contact()
    {
        return Inertia::render('Contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    public function edit(string $id)
    {
        //
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
        //
    }
}
