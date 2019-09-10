<?php
require_once "unsplash.php";
session_start();

if (isset($_POST['submit'])) {
    if (isset($_POST['term'])) {
        $term = test_input($_POST['term']);

        if ($term) {
            storePics($term);
            header("Location: ../app/index.php");
        } else {
            echo "enter valid search term";
            header("HTTP/1.1 401 Unauthorized");
            $_SESSION['error'] = 'enter valid search term';
            header("Location: index.php");
        }
    } else {
        header("HTTP/1.1 401 Unauthorized");
        $_SESSION['error'] = 'enter valid search term';

    }
} else {
    storePics('ducks');
    header("Location: ../app/index.php");
}
function storePics($term){
    $res = getPics($term);

    $res = json_decode($res);
    $picsUrls = getUrls($res->results);

    $cacheRes = json_encode($picsUrls);
    if(count($picsUrls)<16){
        $_SESSION['error'] = 'invalid search term, please try again';
    }
    else{
        unset($_SESSION['error']);
    }
    $_SESSION['pics'] = $picsUrls;
    $cacheFile = fopen('cache.json','w');
    fwrite($cacheFile,$cacheRes);
}

function getUrls($results)
{
    $urls = [];
    foreach ($results as $pic => $details) {

        foreach ($details as $field => $val) {
            if ($field === 'urls') {
                $urls[] = $val->regular;
                $urls[] = $val->regular;
            }
        }
    }
    return $urls;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
