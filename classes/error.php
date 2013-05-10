<?php

namespace Sentry;

/**
 * Override \Fuel\Core\Error
 *
 * @author    CoreTech Co.,Ltd. http://core-tech.jp/
 * @copyright 2013 CoreTech Co.,Ltd.
 * @license   MIT License http://www.opensource.org/licenses/mit-license.php
 */
class Error extends \Fuel\Core\Error
{

	/**
	 * @see \Fuel\Core\Error::show_php_error()
	 */
	public static function show_php_error(\Exception $e)
	{
		$config = \Config::load('sentry', true);
		if ($config[\Fuel::$env]['php']['enabled']) Sentry::send_exception($e);
		parent::show_php_error($e);
	}

	/**
	 * @see \Fuel\Core\Error::show_production_error()
	 */
	public static function show_production_error(\Exception $e)
	{
		$config = \Config::load('sentry', true);
		if ($config[\Fuel::$env]['php']['enabled']) Sentry::send_exception($e);
		parent::show_production_error($e);
	}
}