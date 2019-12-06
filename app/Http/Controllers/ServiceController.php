<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $randomservices = \App\Service::inRandomOrder()->limit(5)->get();


        return view('homePage', ['randomservices' => $randomservices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchResults(Request $request)
    {
        $result = $request->searchbar;
        $servicesResult = \App\Service::where('name', 'like', '%' . $result . '%')->get();

        return view('search-results', ['servicesResult' => $servicesResult]);
    }
    
    public function livesearch(Request $request)
    {
        $result = $request->searchbar;
        $servicesResult = \App\Service::where('name', 'like', '%' . $result . '%')->get();
        //echo '<div class="specialcontainer">';
        foreach ($servicesResult as $service) {
            $servicenames = $service->name;
            echo '<a href="#">' .  $servicenames . '</a><br>';
        }
    }
}
