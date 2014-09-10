<?php
use Cake\Routing\Router;

Router::plugin('BootstrapManager', function($routes) {
	$routes->fallbacks();
});
