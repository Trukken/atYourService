<h1>{{$request->name}}</h1>

<?php
foreach ($servicename as $singleservice) {
    echo '<a href="/services/detail/' . $singleservice->id . '">';
    echo '<div>';
    echo '<strong>Provider: </strong>' . $singleservice->User->name . '<br>';
    echo '<strong>Description: </strong>' . $singleservice->short_description . '<br>';
    echo '<br></a>';
    echo '</div>';
    echo '<hr>';
}
?>