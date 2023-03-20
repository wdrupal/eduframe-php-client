<?php

require __DIR__ . '/vendor/autoload.php';

$access_token = 'GUFBU8ZDGRFiX5q-Xt8nzwSuO6VzXb6zBM_IVHQqQd_Y4pAnjT6PtKkU324OROqt'; # testing program builder key

$connection = new Eduframe\Connection();

$connection->setAccessToken($access_token);
$connection->setStage(Eduframe\STAGING);

$client = new Eduframe\Client($connection);

$data = [];

// With include its possible to include nested relations.
$data['products'] = $client->catalog_products()->all(['include' => 'labels']);

// To get teachers pass the correct role
$data['teachers'] = $client->teachers()->all();

// Create a new lead
$lead = $client->leads();
$lead->title = 'Some title';
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

header("Content-Type: application/json");

echo json_encode($data);
