<?php

function newOrderController()
{
    $config     = getConfig(CONF_FILE_PATH);
    $pdo        = getConnection($config); 
    $order      = $_POST;

    if (!$pdo)
    {
        view([
            'title' => 'Hiba az oldal betőltése közben!',
            'view' =>'_error',
        ]);
    }

    header('refresh:2;url=index.php?c=termekek');

    if (newOrderInsert($pdo, $order))
    {
        view([
            'title' => 'Sikeres felvétel',
            'view' =>'succAddOrder',
        ]);
    }
    else
    {
        view([
            'title' => 'Sikeretelen felvétel',
            'view' =>'unsuccAddOrder',
        ]);
    }
}

function newOrderFormController()
{
    $config     = getConfig(CONF_FILE_PATH);
    $pdo        = getConnection($config); 
    $categoryId = $_POST["categoryId"];

    if (!$pdo)
    {
        view([
            'title' => 'Hiba az oldal betőltése közben!',
            'view' =>'_error',
        ]);
    }

    $products = getTermekek($pdo, $categoryId);

    view([
        'title'     => 'Új rendelés felvétele',
        'view'      =>'newOrder',
        'products'  => $products     
    ]);
}

function categoriesController()
{
    $config     = getConfig(CONF_FILE_PATH);
    $pdo        = getConnection($config); 

    if (!$pdo)
    {
        view([
            'title' => 'Hiba az oldal betőltése közben!',
            'view' =>'_error',
        ]);
    }

    $categories = getCategoies($pdo);

    view([
        'title'         => 'Rendelések listája',
        'view'          =>'categories',
        'categories'    => $categories
    ]);
}

function modifyTermekController()
{
    $config     = getConfig(CONF_FILE_PATH);
    $pdo        = getConnection($config); 
    $product    = $_POST;

    if (!$pdo)
    {
        view([
            'title' => 'Hiba az oldal betőltése közben!',
            'view' =>'_error',
        ]);
    }

    header('refresh:2;url=index.php?c=termekek');

    if (updateProduct($pdo, $product))
    {
        view([
            'title' => 'Sikeres módosítás',
            'view' =>'succMod',
        ]);
    }
    else
    {
        view([
            'title' => 'Sikeretelen módosítás',
            'view' =>'unsuccMod',
        ]);
    }
}

function modyfyTermekFormController()
{

    $config     = getConfig(CONF_FILE_PATH);
    $pdo        = getConnection($config); 
    $productId    = $_GET['termekId'];

    if (!$pdo)
    {
        view([
            'title' => 'Hiba az oldal betőltése közben!',
            'view' =>'_error',
        ]);
    }



    view([
        'title'     => 'Termék módosítása',
        'view'      => 'modifyProductForm',
        'product'   => getProduct($pdo, $productId)
    ]);
}

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
