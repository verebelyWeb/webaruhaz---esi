<?php

$controllerName = $controller.'Controller';


if (function_exists($controllerName))
{
    $controllerName();
}
else
{
    notFoundController();
}
