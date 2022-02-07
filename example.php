<?php

require __DIR__ . '/vendor/autoload.php';

$access_token  = 'GUFBU8ZDGRFiX5q-Xt8nzwSuO6VzXb6zBM_IVHQqQd_Y4pAnjT6PtKkU324OROqt'; # testing program builder key

$connection = new Eduframe\Connection();

$connection->setAccessToken( $access_token );
$connection->setStage( Eduframe\STAGING );

$client = new Eduframe\Client( $connection );

$data = [];

// $data = $client->categories()->all();
// $data = $client->courses()->all();
// $data = $client->planned_courses()->all( ['include' => 'course_location,teachers' ] );

// With include its possible to include nested relations.
// $data['users'] = $client->users()->all(['include' => 'address,signup_answers,labels,personal_account']);

// To get teachers pass the correct role
$data['teachers'] = $client->teachers()->all();

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
$lead->courses_leads = [$client->lead_interests([
    "course_id" => 133,
    "planned_course_id" => null
])];

$lead->save();

header( "Content-Type: application/json" );

echo json_encode( $data );
