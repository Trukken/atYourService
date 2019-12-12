<?php

namespace App\Http\Controllers;

use App\Report;
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


    public function edit($id)
    {
        $service = \App\Service::find($id);
        return view('edit-service', ["service" => $service]);
        //
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
        //
    }


    public function destroy($id)
    {
        \App\Service::destroy($id);
        return 'Service was deleted';
    }

    public function searchResults(Request $request)
    {
        if (!empty($request->name)) {
            $usersearch = $request->name;
        } else {
            $usersearch = $request->searchbar;
        }

        $servicesResult = \App\Service::where('name', 'like', '%' . $usersearch . '%')->where('banned', '=', 0)->orderBy('created_at', 'DESC')->get();

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
        $servicesResult = \App\Service::distinct()->select('name')->where('name', 'like', '%' . $result . '%')->where('banned', '=', 0)->get();
        //echo '<div class="specialcontainer">';
        foreach ($servicesResult as $service) {
            echo '<a href="/services/select/' . $service->name . '">' .  ucwords($service->name) . '</a><br>';
        }
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
            $request->validate([
                'reportedService' => 'required',
                'reportReason' => 'required'
            ]);
            $report = new Report;
            $report->service_id = strip_tags($request->reportedService);
            $report->report_reason = strip_tags($request->reportReason);
            $report->handled = false;
            $report->save();
            $services = Service::all();
            return view('search-results', ['servicesResult' => $services]);
        } else {
            return redirect('');
        }
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
}
