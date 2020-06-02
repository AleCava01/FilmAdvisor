<?php
    use Recombee\RecommApi\Client;
    use Recombee\RecommApi\Requests as Reqs;
    use Recombee\RecommApi\Exceptions as Ex;

    $client = new Client('--my-database-id--', '--my-private-token--');

    const NUM = 100;
    const PROBABILITY_PURCHASED = 0.1;

    try
    {
        // Generate some random purchases of items by users
        $purchase_requests = array();
        for($i=0; $i < NUM; $i++) {
            for($j=0; $j < NUM; $j++) {
                if(mt_rand() / mt_getrandmax() < PROBABILITY_PURCHASED) {

                    $request = new Reqs\AddPurchase("user-{$i}", "item-{$j}",
                        ['cascadeCreate' => true] // Use cascadeCreate to create the
                                                  // yet non-existing users and items
                    );
                    array_push($purchase_requests, $request);
                }
            }
        }
        echo "Send purchases\n";
        $res = $client->send(new Reqs\Batch($purchase_requests)); //Use Batch for faster processing of larger data

        // Get 5 recommendations for user 'user-25'
        $recommended = $client->send(new Reqs\RecommendItemsToUser('user-25', 5));

        echo 'Recommended items: ' . json_encode($recommended, JSON_PRETTY_PRINT) . "\n";
    }
    catch(Ex\ApiException $e)
    {
        //use fallback
    }

?>