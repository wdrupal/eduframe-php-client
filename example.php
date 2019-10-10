<?php

require __DIR__ . '/vendor/autoload.php';

$educator_slug = 'programme-builder';
$access_token  = 'cd6395755d220afd2f11bdbe9d1b2dcf'; # testing program builder key

$connection = new Eduframe\Connection();

$connection->setAccessToken( $access_token );
$connection->setEducatorSlug( $educator_slug );
$connection->setStage( Eduframe\TESTING );

$client = new Eduframe\Client( $connection );

$data = [];

//$data = $client->categories()->all();
//$data = $client->courses()->all();
// $data = $client->planned_courses()->all( ['include' => 'course_location' ] );
//$data = $client->enrollments()->all( [ 'include' => 'course']);

// With include its possible to include nested relations.
$data['users'] = $client->users()->all(['include' => 'address,invoice_address,signup_answers']);
$data['payment_methods'] = $client->payment_methods()->all();
$data['payment_options'] = $client->payment_options()->all();
$data['signup_questions'] = $client->signup_questions()->all();
//$data = $client->courses()->all( [ 'include' => 'credit_definitions.type.category,course_tab_contents,labels' ] );

// Getting referals
$data['referals'] = $client->referrals()->all();

header( "Content-Type: application/json" );

echo json_encode( $data );
