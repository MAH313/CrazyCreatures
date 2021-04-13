<?php #base router functions

class Route{

	private $paths = [];

	public function addPath($path, $controller, $function){
    	#adds a route
		$this->paths[] = ['path'=> trim($path, '/') ? trim($path, '/') : '/', 'controller' => $controller, 'function' => $function];
	}

	public function submit(){
    	#routing function
		$uri = isset($_GET['uri']) ? $_GET['uri'] : "/";
		$FourOhFour = true;

		foreach ($this->paths as $pathKey => $pathValue) {
			if(preg_match("#^".$pathValue['path']."$#", $uri, $matches)){
				if(method_exists($pathValue['controller'], "init")){
					$initOuput = call_user_func([$pathValue['controller'], "init"], $matches);
				}
				else{
					$initOuput = (object)[];
				}

				$initOuput->url_matches = $matches;

				call_user_func([$pathValue['controller'], $pathValue['function']], $initOuput);
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
