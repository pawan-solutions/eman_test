<?php

class SslComponent extends Component {
	/**
	 * This component uses following components
	 *
	 * @var array
	 */
	var $components = array('RequestHandler');

	function initialize(Controller $controller) {

	}
	function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
	}
	function startup(Controller $controller = null) {

	}
	function force(Controller $c) {
		if(!$c->RequestHandler->isSSL()) {
			$c->redirect('https://'.$this->__url());
		}
	}
	function unforce(Controller $c) {
		if($c->RequestHandler->isSSL()) {
			$c->redirect('http://'.$this->__urll());
		}
	}
	function __url() {
		$port = env('SERVER_PORT') == 80 ? '' : ':'.env('SERVER_PORT');
		return env('SERVER_NAME').$port.env('REQUEST_URI');
	}
	function __urll() {
		$port = env('SERVER_PORT') == 443 ? '' : ':'.env('SERVER_PORT');
		return env('SERVER_NAME').$port.env('REQUEST_URI');
	}
}