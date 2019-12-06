<h1>{{$request->name}}</h1>

<?php
foreach ($servicename as $singleservice) {
    echo '<strong>Provider: </strong>' . $singleservice->User->name . '<br>';
    echo '<strong>Description: </strong>' . $singleservice->short_description . '<br>';
    echo '<strong>Details: </strong>' . $singleservice->long_description . '<br>';
    echo '<hr>';
}
?>