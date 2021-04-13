<?php
include_once "./libs/route.php";
include_once './libs/smarty/libs/Smarty.class.php';

class Pages{

	public function init(){
	    // initialasation function
	    // results get included as the first param in a page function
		$smarty = new Smarty;
		$smarty->error_reporting = error_reporting() & ~E_NOTICE; 

		$output = [
			"smarty" => $smarty
		];

		return (object) $output;
	}

	public function index($base){
	    // home page / todo list
		
		//$base->smarty->assign('id', $base->url_matches['id']);
		$base->smarty->display('./templates/index.tpl');
	}

}
