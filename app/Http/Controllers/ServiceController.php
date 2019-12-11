<?php

namespace App\Http\Controllers;

use App\Service;
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
        $randomservices = \App\Service::inRandomOrder()->limit(9)->get();
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

        return 'Service inserted: ' . $request->servicename . '.';
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
            return 'access denied';
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
    public function reportService(Request $request)
    {
        if (Auth::user()) {
            $report = Service::where('id', '=', $request->id)->get();
            return view('reportForm', ['report' => $report[0]]);
        } else {
            return redirect('');
        }
    }
    public function sendReport(Request $request)
    {
        if (Auth::user()) {
            
         } else {
            return redirect('');
        }
    }
}
