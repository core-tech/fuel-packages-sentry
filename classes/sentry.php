<?php

namespace Sentry;

if (file_exists(__DIR__.'/../vendor/autoload.php'))
{
	require_once __DIR__.'/../vendor/autoload.php';
}
else
{
	require_once VENDORPATH.'autoload.php';
}

/**
 * Fuel Sentry Package
 *
 * @author    CoreTech Co.,Ltd. http://core-tech.jp/
 * @copyright 2013 CoreTech Co.,Ltd.
 * @license   MIT License http://www.opensource.org/licenses/mit-license.php
 */
class Sentry {
	private static $config;
	private static $client;

	/**
	 * Initialize
	 */
	public static function _init() {
		$config = \Config::load('sentry', true);
		static::$config = $config[\Fuel::$env];

		// create instance for PHP
		static::$client = new \Raven_Client(static::$config['php']['dsn']);
	}

	/**
	 * Send message
	 *
	 * @param  string $message
	 * @param  array $opt
	 * @param  array $params
	 */
	public static function send_message($message, $opt = array(), $params = array()) {
		$opt = \Arr::merge(static::$config['php']['options'], $opt);
		static::$client->captureMessage($message, $params, $opt);
	}

	/**
	 * Send exception
	 *
	 * @param  \Exception $e
	 * @param  array $opt
	 */
	public static function send_exception(\Exception $e, $opt = array()) {
		$opt = \Arr::merge(static::$config['php']['options'], $opt);
		static::$client->captureException($e, $opt);
	}

	/**
	 * Get script tag for Javascript
	 *
	 * @param  array $opt
	 * @return string
	 */
	public static function get_raven_client($opt = array()) {
		if (!static::$config['js']['enabled']) return '';
		$dsn_js   = static::$config['js']['dsn'];
		$opt      = \Arr::merge(static::$config['js']['options'], $opt);
		$opt_json = json_encode($opt);
		return
<<<__SCRIPT__
	<script src="http://d3nslu0hdya83q.cloudfront.net/dist/1.0/raven.min.js"></script>
	<script>
		if(typeof Raven != 'undefined'){
			Raven.config('{$dsn_js}', {$opt_json}).install();
		}
	</script>
__SCRIPT__;
	}
}