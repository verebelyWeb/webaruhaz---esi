<?php

function getConfig($path)
{
    return json_decode(file_get_contents($path), true);
}

function view($params)
{
    extract($params);

    require_once APPPATH.'Templates/_layout.php';
    die;
}