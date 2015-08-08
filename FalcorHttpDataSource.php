<?php namespace App\Domain;

class FalcorHttpDataSource {
	protected $response;

	public function __construct($request, FalcorRouter $router) {
		$paths = json_decode($request->get('paths'));
	    $this->response = $router->get($paths);
	}

	public function __toString() {
		return json_encode([
			'jsonGraph' => $this->response
		]);
	}
}