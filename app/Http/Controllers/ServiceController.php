<?php

namespace App\Http\Controllers;

use App\Report;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $randomservices = \App\Service::inRandomOrder()->join('users', 'users.id', '=', 'services.user_id')->select('services.*', 'users.image')->limit(9)->get();
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
        // validate(rules,return messages)
        $request->validate([
            'servicename' => 'required|min:4',
            'shortdescription' => 'required|min:4',
            'longdescription' => 'required|min:20'
        ], [
            'servicename.min' => 'The service\'s name must be at least 4 characters.',
            'shortdescription.min' => 'The short description must be at least 4 characters.',
            'longdescription.min' => 'The long description must be at least 20 characters.',
        ]);
        if (isset($_POST['submit'])) {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = [
                'secret' => '6LeqRcYUAAAAABcma1DiapUfHaPrD0qREXSv4064',
                'response' => $_POST['token']
            ];
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $response = file_get_contents($url, false, $context);
            $res = json_decode($response, true);
            if ($res['success'] == true) {
                $newService = new \App\Service;
                $newService->name = $request->servicename;
                $newService->short_description = $request->shortdescription;
                $newService->long_description = $request->longdescription;
                $newService->user_id = auth()->user()->id;
                $newService->banned = 0;
                $newService->save();

                return redirect('user/' . $newService->user_id)->withErrors(['msg' => 'Your service was added successfully.']);
            } else {
                return redirect('/add-services')->withErrors(['msg' => 'You can not send messages that fast.']);
            }
        } else {
            return redirect('/add-services')->withErrors(['msg' => 'You can not send messages that fast.']);
        }
    }

    public function show($id)
    {
        $service = \App\Service::find($id);
        $user = \App\User::find($id);
        if (empty($service)) {
            return redirect('')->withErrors('Service page does not exist.');
        }
        $comments = $service->comments;

        return view('service-page', ['user' => $user, 'service' => $service, 'comments' => $comments]);
    }


    public function edit($id)
    {
        if (Auth::user()) {

            $service = \App\Service::find($id);
            if ($service->user_id == Auth::user()->id || Auth::user()->admin == true) {

                return view('edit-service', ["service" => $service]);
            }
            return redirect('')->withErrors(['msg' => 'You can not edit another user\'s service!']);
        }
        return redirect('')->withErrors(['msg' => 'You can not edit that!']);

        //
    }


    public function update(Request $request, $id)
    {
        $service = \App\Service::find($id);
        $service->name = $request->name;
        $service->short_description = $request->short_description;
        $service->long_description = $request->long_description;
        $service->user_id = auth()->user()->id;
        $service->banned = 0;

        $service->save();

        return redirect('user/' . $service->user_id)->withErrors(['msg' => 'Service had been updated!']);
        //
    }


    public function destroy($id)
    {
        if (Auth::user()) {
            $service = \App\Service::find($id);
            if ($service->user_id == Auth::user()->id || Auth::user()->admin == true) {
                \App\Service::destroy($id);

                return redirect('user/' . $service->user_id)->withErrors(['msg' => 'Service has been deleted!']);
            }
            return redirect('')->withErrors(['msg' => 'You can not delete another user\'s service!']);
        }
        return redirect('')->withErrors(['msg' => 'You can not delete that!']);
    }

    public function searchResults(Request $request)
    {
        if (!empty($request->name)) {
            $usersearch = $request->name;
        } else {
            $usersearch = $request->searchbar;
        }

        $servicesResult = \App\Service::where('name', 'like', '%' . $usersearch . '%')->where('banned', '=', 0)->orderBy('created_at', 'DESC')->paginate(10);

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

    // LIVE SEARCH

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

    public function showUser($id)
    {
        $service = \App\Service::find($id);
        $user = \App\User::find($id);
        if (!empty($service->comments)) {
            $comments = $service->comments;
        } else {
            $comments = ['You have no comments yet.'];
        }
        return view('myaccount', ['user' => $user, 'service' => $service, 'comments' => $comments]);
    }
}
