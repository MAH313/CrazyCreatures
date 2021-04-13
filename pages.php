<?php
include_once "./libs/route.php";
include_once './libs/smarty/libs/Smarty.class.php';

class Pages{
	private $smarty;

	public function init(){
	    // initialasation function
		$this->smarty = new Smarty;
		$this->smarty->error_reporting = error_reporting() & ~E_NOTICE; 

		/*$output = [
			"smarty" => $smarty
		];

		return (object) $output;*/
	}

	public function index($base){
	    // home page
		
		//$base->smarty->assign('id', $base->url_matches['id']);
		$this->smarty->display('./templates/index.tpl');
	}

}
