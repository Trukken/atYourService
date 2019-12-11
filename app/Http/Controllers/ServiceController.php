<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $randomservices = \App\Service::inRandomOrder()->limit(9)->join('users', 'users.id', '=', 'services.user_id')->select('services.*', 'users.image')->get();
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
        $newService->user_id = auth()->user()->id;
        $newService->banned = 0;

        $newService->save();

        //the $request are data from the form, $request->title means that the input name should be title per example

        return 'The following service was inserted: ' . $request->servicename . '.';
    }

    public function show($id)
    {
        $service = \App\Service::find($id);
        $user = \App\User::find($id);
        $comments = $service->comments;

        return view('service-page', ['user' => $user, 'service' => $service, 'comments' => $comments]);
    }

    public function showmyaccount($id)
    {
        $service = \App\Service::find($id);
        $user = \App\User::find($id);
        $comments = $service->comments;
        if (Auth::user() && Auth::user()->id == $id) {
            return view('myaccount', ['user' => $user, 'service' => $service, 'comments' => $comments]);
        } else {
            return 'Access denied';
        }
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
        $service->user_id = auth()->user()->id;
        $service->banned = 0;

        $service->save();
        return 'Service was updated';
    }


    public function destroy($id)
    {
        \App\Service::destroy($id);
        return 'Service was deleted';
    }

    public function searchResults(Request $request)
    {
        $usersearch = $request->searchbar;
        $servicesResult = \App\Service::where('name', 'like', '%' . $usersearch . '%')->orderBy('created_at', 'DESC')->get();

        return view('search-results', ['servicesResult' => $servicesResult]);
    }


    public function searchResults2(Request $request)
    {
        if ($request->order) {
            $ordered = $request->order;
        } else {
            $ordered = 'created_at';
        }
        $usersearch = $request->searchbar;
        $query = \App\Service::where('name', 'like', '%' . $usersearch . '%')->orderBy($ordered, 'DESC')->get();

        return $query;

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
        $query = \App\Service::where('name', $req)->get();
        foreach ($query as $service) {
            $services[] = $service;
        }
        return view('/serviceslist', ['query' => $query, 'request' => $request, 'name' => $req, 'services' => $services]);
    }
}
