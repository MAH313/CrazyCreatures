<?php #base router functions

class Route{

	private $paths = [];

	public function add($path, $function){
    #adds a route
		$this->paths[] = ['path'=> trim($path, '/') ? trim($path, '/') : '/', 'function'=> $function];
	}

	public function submit(){
    #routing function
		$uri = isset($_GET['uri']) ? $_GET['uri'] : "/";
		$FourOhFour = true;

		foreach ($this->paths as $pathKey => $pathValue) {
			if(preg_match("#^".$pathValue['path']."$#", $uri)){
				if(function_exists("init")){
					$initOuput = init();
				}
				else{
					$initOuput = [];
				}
				$pathValue['function']($initOuput);
				$FourOhFour = false;
			}
		}

		if($FourOhFour){
			if(function_exists("FourOhFour")){
				FourOhFour($uri);
			}
			else{
				http_response_code (404);
				echo "404; page not found";
			}
		}
	}

}
