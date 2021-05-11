<?php
session_start();
require_once("assets/twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library

$twitteruser = "xTuple";
$notweets = 4;
$consumerkey = "meE1bEwmHPxsGkP1J9qn5Q";
$consumersecret = "3eYyJOvRIJ21G8Ppvp8lZeNVxmYFPExqHgSVtwQATqk";
$accesstoken = "14225826-OsdpHzTgCrONh606WyFovMevlLwM0WqFvM6vPadHE";
$accesstokensecret = "nxGcx63quk4R15Ao4N6NPTe9YwR5cEJtBPzl9GUpqdk";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

echo json_encode($tweets);
?>
