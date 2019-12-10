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
        $newService->user_id = auth()->user()->id;   //$request->user_id
        $newService->banned = 0;
        return $newService;
        $newService->save();

        //the $request are data from the form, $request->title means that the input name should be title per example

        return 'Service inserted: ' . $request->servicename . ', ' . $request->shortdescription . ', ' . $request->longdescription . '.';
    }

    public function show($id)
    {
        $service = \App\Service::find($id);
        $user = \App\User::find($id);
        $comments = $service->comments;

        return view('service-page', ['user' => $user, 'service' => $service, 'comments' => $comments]);
    }

    public function showmyservices($id)
    {
        $service = \App\Service::find($id);
        $user = \App\User::find($id);
        $comments = $service->comments;

        return view('myservices', ['user' => $user, 'service' => $service, 'comments' => $comments]);
    }


    public function edit($id)
    {
        $service = \App\Service::find($id);
        return view('edit-service', ["service" => $service]);
    }


    public function update(Request $request, $id)
    {
        //UPDATE THE FORM
        $service = \App\Service::find($id);
        $service->name = $request->name;
        $service->short_description = $request->short_description;
        $service->long_description = $request->long_description;
        //make it hidden, pass value of logged in user:
        $service->user_id = $request->user_id;
        $service->banned = 0;

        $service->save();
        return 'service was updated';
    }


    public function destroy($id)
    {
        \App\Service::destroy($id);
        return 'Author was deleted';
    }

    public function searchResults(Request $request)
    {
        $ordered = 'created_at';
        if ($request->order == 'updated_at') {
            $ordered = 'updated_at';
        } else if ($request->order == 'name') {
            $ordered = 'name';
        } else {
            $ordered = 'created_at';
        }
        $usersearch = $request->searchbar;
        $servicesResult = \App\Service::where('name', 'like', '%' . $usersearch . '%')->orderBy($ordered, 'DESC')->get();

        //->orderBy('created_at', 'DESC')
        //return $ordered;
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
            //echo '<span name ="' . $service->name . '"><a href="/search-results" name ="' . $service->name . '">' .  ucwords($service->name) . '</a></span><br>';
            //echo '<a href="search-results" data-value="' . $service->name . '">' .  ucwords($service->name) . '</a><br>';
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
            $services[] = $service;
        }
        return view('/serviceslist', ['query' => $query, 'request' => $request, 'name' => $req, 'services' => $services]);
    }
}
