<?php
/**
* Plugin Name: Core Gamestore
* Description: Core Code for Gamestore
* Version: 1.0
* Author: bafic007
* Author URI: http://lahoyda.pp.ua
* License: GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: core-gamestore
* Domain Path: /languages
 */

 define('GAMESTORE_PLUGIN_URL', plugin_dir_url(__FILE__));
 define('GAMESTORE_PLUGIN_PATH', plugin_dir_path(__FILE__));

 require_once(GAMESTORE_PLUGIN_PATH . '/inc/games-core.php');