<?php

function deleteOrderController()
{

    $config     = getConfig(CONF_FILE_PATH);
    $pdo        = getConnection($config); 
    $orderId    = $_GET['orderId'];

    if (!$pdo)
    {
        view([
            'title' => 'Hiba az oldal betőltése közben!',
            'view' =>'_error',
        ]);
    }

    header('refresh:2;url=index.php?c=termekek');

    if (deleteOrder($pdo, $orderId))
    {
        view([
            'title' => 'Sikeres törlés',
            'view' =>'succDel',
        ]);
    }
    else
    {
        view([
            'title' => 'Sikeretelen törlés',
            'view' =>'unsuccDel',
        ]);
    }


}

function ordersController()
{
    $config     = getConfig(CONF_FILE_PATH);
    $pdo        = getConnection($config); 
    $termekId   = $_GET['termekId'];

    if (!$pdo)
    {
        view([
            'title' => 'Hiba az oldal betőltése közben!',
            'view' =>'_error',
        ]);
    }

    $orders = getOrdersById($pdo, $termekId);

    view([
        'title'     => 'Rendelések listája',
        'view'      =>'orders',
        'orders'    => $orders
    ]);
}

function termekekController()
{
    $config = getConfig(CONF_FILE_PATH);
    $pdo    = getConnection($config);
    $categoryId = @$_POST['category'] ? $_POST['category'] : null;

    if (!$pdo)
    {
        view([
            'title' => 'Hiba az oldal betőltése közben!',
            'view' =>'_error',
        ]);
    }

    $categories = getCategoies($pdo);
    $termekek = getTermekek($pdo, $categoryId);

    if (!$categories)
    {
        view([
            'title' => 'Hiba az oldal betőltése közben!',
            'view' =>'_error',
        ]);
    }

    view([
        'title'     => 'Termékek listája',
        'view'      =>'termekek',
        'termekek'  => $termekek,
        'categories'=> $categories
    ]);
}





function homeController()
{
    view([
        'title' => 'Főoldal',
        'view' =>'home',
    ]);
}


function notFoundController()
{
    view([
        'title' => '404 - Page Not Found',
        'view' =>'_404',
    ]);
}
