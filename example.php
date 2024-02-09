<?php

require __DIR__ . '/vendor/autoload.php';

$access_token = '<ACCESS_TOKEN>'; # testing program builder key

$connection = new Eduframe\Connection();

$connection->setAccessToken($access_token);
$connection->setStage(Eduframe\STAGING);

$client = new Eduframe\Client($connection);

$data = [];

// With include its possible to include nested relations.
$data['variants'] = $client->catalog_variants()->get();

// To get teachers pass the correct role
$data['teachers'] = $client->teachers()->get();

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
$lead->lead_products = [$client->lead_products([
    "catalog_product_id" => 123,
    "catalog_variant_id" => 456,
])];

$lead->save();

header("Content-Type: application/json");

echo json_encode($data);
