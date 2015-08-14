<?php namespace App\Domain;

class FalcorRouter {
	protected $routes;
	protected $options;

	public function __construct($routes, $options = []) {
		$this->routes = $routes;
		$this->options = $options;
	}

	public function get($paths) {
    $matchedRoute = $this->getMatchedRoute($paths);
    return [
        'jsonGraph' => [
            $matchedRoute['get']['path'][0] => $matchedRoute['get']['value']
        ]
    ];
    }

    private function getMatchedRoute($paths) {
    	foreach($this->routes as $route) {
    		if($route['route'] == $paths[0][0]) {
    			return $route;
    		}
    	}
    }
}