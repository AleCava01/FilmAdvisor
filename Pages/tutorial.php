<?php
require_once 'vendor/autoload.php';

# Structure of the .json with interactions:
#
# [
#   {"user_id": "user-50",  "item_id": "event-276", "timestamp": "2016-04-20T12:50:42+02:00"},
#   {"user_id": "user-389", "item_id": "event-73",  "timestamp": "2014-07-20T02:49:45+02:00"},
#   {"user_id": "user-204", "item_id": "event-116", "timestamp": "2015-04-22T13:32:32+02:00"},
#   ...
# ]

use vendor\recombee\phpapiclient\src\RecommApi\Client;
use vendor\recombee\phpapiclient\src\RecommApi\Requests as Reqs;
use vendor\recombee\phpapiclient\src\RecommApi\Exceptions as Ex;

$client = new Client('events-example', 'PbBaEVxx8ZOj0x3BhGtqfHyi8qQ8rm8rE1JBnSPoCnHwetzO3gjHer96YVAIa14G');

$requests = array();
$str = file_get_contents('detail_views.json');

foreach(json_decode($str, true) as $interacion) {
	$user_id = $interacion['user_id'];
	$item_id = $interacion['item_id'];
	$time = $interacion['timestamp'];

	$r = new Reqs\AddDetailView($user_id, $item_id,
									['timestamp' => $time, 'cascadeCreate' => true]);
	array_push($requests, $r);
}

$br = new Reqs\Batch($requests);
$client->send($br);

$recommended = $client->send(new Reqs\RecommendItemsToUser('user-27', 5));
echo 'User based recommendation for "user-27": ' . print_r($recommended, true) . "\n";

$recommended = $client->send(new Reqs\RecommendItemsToItem('event-32', 'user-27', 5));
echo 'Related items to "event-32" for "user-27": ' . print_r($recommended, true) . "\n";

$recommended = $client->send(new Reqs\RecommendUsersToItem('event-42', 5));
echo 'Users who should be interested in "event-42": ' . print_r($recommended, true) . "\n";

?>