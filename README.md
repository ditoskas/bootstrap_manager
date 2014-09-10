BootstrapManager
================

A plugin to manage the bootstrap framework in CakePHP 3

Requirements
------------
  - CakePHP 3
  - Bootstrap 3

Load plugin
------------
You need to enable the plugin in your app/Config/bootstrap.php file:
`Plugin::load('BootstrapManager', ['bootstrap' => false, 'routes' => true);`

Load Helpers
------------
Load the helpers in AppController:
`public $helpers = ['Form','Html','BootstrapManager.BootstrapSources','BootstrapManager.Bootstrap',];`
Documentation & Examples
------------
Documentation and examples can be found on [http://bootstrap.toskas.gr](http://bootstrap.toskas.gr)
