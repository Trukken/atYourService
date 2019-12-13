@extends('layouts.container')

@section('title','Admin Panel')

@section('content')


<div class="mask rgba-grey-slight admin-panel-body">
  <h2 class="admin-panel-h2 h2-reponsive text-center font-weight-bold mb-5 ">Choose which topic you want to display:</h2>
  <form method="POST">
    @csrf
    <div class="card-deck admin-panel-card-deck">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">Banned Users</h5>
          <p class="card-text">In this section you will be able to see banned users, this feature is not yet implemented</p>
          <button disabled class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" name="adminControl" value="displayUsers">Go to Users</button>
          <hr>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">Banned Services</h5>
          <p class="card-text">In this section you will be able to see banned services, this feature is not yet implemented</p>
          <button disabled class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" name="adminControl" value="displayServices">Go to Services</button>
          <hr>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title">Pending reports</h5>
          <p class="card-text">In this section you will see the most recent reports and handle those reports, pay attention as this feature is live.</p>
          <button class="btn peach-gradient btn-rounded btn-sm my-0 waves-effect waves-light" name="adminControl" value="displayReports">Go to Reports</button>
          <hr>
          <p class="card-text"><small class="text-muted"><?php
          if(!empty($mostRecentReport)){
          if($mostRecentReport->d > 0)
          { echo 'Last report '.$mostRecentReport->d.' days ago';
            }
          else if($mostRecentReport->h > 0 && $mostRecentReport->d == 0){
              echo 'Last report '.$mostRecentReport->h.' hours ago.';
          }else if($mostRecentReport->i > 0 && $mostRecentReport->h == 0 && $mostRecentReport->d == 0){
              echo 'Last report '.$mostRecentReport->i.' minutes ago.';
          }else if($mostRecentReport->s >= 0 && $mostRecentReport->i == 0 && $mostRecentReport->h == 0 && $mostRecentReport->d == 0){
              echo 'Last report a few seconds ago.';
          }
          }else if(!empty($msg)){
              echo $msg;
          }
          ?></small></p>
        </div>
      </div>
    </div>
  </form>

</div>

@endsection

