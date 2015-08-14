<?php namespace App\Domain;

class FalcorHttpDataSource {
	protected $jsonGraphEnvelope;

	public function __construct($request, FalcorRouter $router) {
		$paths = json_decode($request->get('paths'));
	    $this->jsonGraphEnvelope = $router->get($paths);
	}

	public function __toString() {
		return json_encode($this->jsonGraphEnvelope);
	}
}