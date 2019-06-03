<?php

require __DIR__ . '/vendor/autoload.php';

$educator_slug = 'programme-builder';
$access_token  = 'cd6395755d220afd2f11bdbe9d1b2dcf'; # testing program builder key

$connection = new \Eduframe\Connection();

$connection->setAccessToken( $access_token );
$connection->setEducatorSlug( $educator_slug );
$connection->setTesting( true );


$client = new Eduframe\Client( $connection );

$data = [];

//$data = $client->categories()->all();
//$data = $client->courses()->all();
$data = $client->planned_courses()->all( ['include' => 'course_location' ] );
//$data = $client->enrollments()->all( [ 'include' => 'course']);

// With include its possible to include nested relations.
//$data = $client->locations()->all();
//$data = $client->courses()->all( [ 'include' => 'credit_definitions.type.category,course_tab_contents,labels' ] );

header( "Content-Type: application/json" );

echo json_encode( $data );
