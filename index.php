<?php

include_once "./libs/route.php";
include_once "./pages.php";

//error_reporting(E_ALL);

$route = new Route();

/*--------------------------------------*/
/*start of routes                       */
/*--------------------------------------*/

$route->addController("Pages", new Pages());

$route->addPath("/", "Pages", "index");
//$route->add("/id/(?'id'[0-9]*)", "index");

/*--------------------------------------*/
/*end of routes                       */
/*--------------------------------------*/

$route->submit();