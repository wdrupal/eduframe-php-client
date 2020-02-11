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

// $data = $client->categories()->all();
// $data = $client->courses()->all();
// $data = $client->planned_courses()->all( ['include' => 'course_location,teachers' ] );

// With include its possible to include nested relations.
// $data['users'] = $client->users()->all(['include' => 'address,signup_answers,labels,personal_account']);

// To get teachers pass the correct role
$data['teachers'] = $client->users()->all(['role' => 'teacher']);

// $data['accounts'] = $client->accounts()->all(['include' => 'address,signup_answers']);
// $data['payment_methods'] = $client->payment_methods()->all();
// $data['payment_options'] = $client->payment_options()->all();
// $data['signup_questions'] = $client->signup_questions()->all();
// $data['referals'] = $client->referrals()->all();

// Create a new lead
$lead = $client->leads();
$lead->company_name = 'Drieam';
$lead->first_name = 'Luuk';
$lead->middle_name = 'van';
$lead->last_name = 'Hulten';
$lead->address = $client->addresses([
    'address' => 'Don Boscostraat 4',  
    'postal_code' => '5611 KW',  
    'city' => 'Eindhoven',  
    'country' => 'NL',  
]);
$lead->save();

header( "Content-Type: application/json" );

echo json_encode( $data );
