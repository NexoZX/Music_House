<?php

function redirection($url)
{
    header('location:' . URL_PROJECT . $url);
}

function redirect ($url) {
    header("location:" + $url + ".php");
}