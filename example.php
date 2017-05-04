<?php

require_once('vendor/PlayPylon/autoload.php');

$playpylon = new PlayPylon\PlayPylon([
  'game_id' => '{game-id}', // Replace {game-id} with the game id provided by PlayPylon
  'game_secret' => '{game-secret}'
  ]);

/* Register a normal account creation */
$playpylon->client->pushConfirmedLead('person@testing.com','game.account.creation');

/* Attribute sale to account */
$playpylon->client->pushConfirmedLead('person@testing.com','game.microtransaction.processed',['package'=>'100 Gems','revenue'=>159,'revenue_currency'=>'USD','SKU'=>'GEMS_SMALL']);

/* Attribute sale to account */
$response = $playpylon->client->getCampaignStatistics('affiliates/leads/monthly']);
$response_array = json_decode($response,true);

$monthly_leads_generated = $response_array['count'];