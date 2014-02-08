<?php

$songToLookUp = $_POST['song'];

$newSong = str_replace(' ', '%20', $songToLookUp);

$chTwo = curl_init();
    $urlTwo = "http://ws.spotify.com/search/1/track.json?q=$newSong";
    curl_setopt($chTwo, CURLOPT_HEADER, 0);
    curl_setopt($chTwo, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($chTwo, CURLOPT_URL, $urlTwo);
    $curlResponseTwo = curl_exec($chTwo);
    curl_close($chTwo);

$jsonResponse = json_decode($curlResponseTwo);

$songOutput= $jsonResponse->tracks[0]->href;

print '<p style="text-align:center;">' . $songOutput . '</p>';

print '<iframe src="https://embed.spotify.com/?uri=' . $songOutput . '" width="300" height="200" style="margin:auto;display:block;" frameborder="0" allowtransparency="true"></iframe>';

    ?>