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
        $randomservices = \App\Service::inRandomOrder()->limit(3)->get();
        $services = \App\Service::all();


        return view('homePage', ['randomservices' => $randomservices, 'services' => $services]);
    }


    public function create()
    {
        $services = \App\Service::all();
        return view('add-service', ['services' => $services]);
    }


    public function store(Request $request)
    {

        $newService = new \App\Service;
        $newService->name = $request->servicename;
        $newService->short_description = $request->shortdescription;
        $newService->long_description = $request->longdescription;

        /**
         * I need to connect user_id and banned somehow later when I have session etc
         * for now I'm using '1'
         */
        $newService->user_id = 1;
        $newService->banned = 1;

        $newService->save();

        // //the $request are data from the form, $request->title means that the input name should be title per example

        return 'Service inserted: ' . $request->servicename . ', ' . $request->shortdescription . ', ' . $request->longdescription . '.';
    }

    public function show($id)
    {
        $service = \App\Service::find($id);
        $user = \App\User::find($id);
        $comments = $service->comments;

        return view('service-page', ['user' => $user, 'service' => $service, 'comments' => $comments]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function searchResults(Request $request)
    {
        $usersearch = $request->searchbar;
        $servicesResult = \App\Service::where('name', 'like', '%' . $usersearch . '%')->get();

        return view('search-results', ['servicesResult' => $servicesResult]);
    }

    /**
     * 
     * 
     * LIVE SEARCH
     * 
     * 
     */

    public function livesearch(Request $request)
    {
        $result = $request->searchbar;
        $servicesResult = \App\Service::distinct()->select('name')->where('name', 'like', '%' . $result . '%')->get();
        //echo '<div class="specialcontainer">';
        foreach ($servicesResult as $service) {
            echo '<a href="/services/select/' . $service->name . '">' .  ucwords($service->name) . '</a><br>';
        }
    }

    /**
     * This might not be necessary
     * (below)
     */
    public function searchbyname(Request $request)
    {
        $req = $request->name;
        $query = \App\Service::where('name', 'like', '%' . $req . '%')->get();
        foreach ($query as $service) {
            $servicenames[] = $service;
        }
        return view('/serviceslist', ['query' => $query, 'request' => $request, 'name' => $req, 'servicename' => $servicenames]);
    }
}
