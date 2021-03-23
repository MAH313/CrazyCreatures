<?php

include_once "./libs/route.php";
include_once "./pages.php";

//error_reporting(E_ALL);

$route = new Route();

/*--------------------------------------*/
/*start of routes                       */
/*--------------------------------------*/

$route->add("/", "index");

/*--------------------------------------*/
/*end of routes                       */
/*--------------------------------------*/

$route->submit();