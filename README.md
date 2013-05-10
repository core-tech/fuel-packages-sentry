# FuelPHP Package for Sentry

[Sentry](https://getsentry.com/) is a realtime event logging. This package corresponds to PHP and Javascript.

---

## Install

### Setup to fuel/packages/sentry

* Use composer [https://packagist.org/packages/core-tech/fuel-packages-sentry](https://packagist.org/packages/core-tech/fuel-packages-sentry)
* git submodule
* Download zip

If you use git submodule or download zip, you must install vendors

	$ cd fuel/packages/sentry
	$ php composer.phar install

### Configuration

In app/config/config.php

	'always_load' => array('packages' => array(
		'sentry',
		...

Copy packages/sentry/config/sentry.php to under app/config directory and edit

#### PHP error is automatically send by Error class that has been overridden

#### JS error is needs the following code in head tag to automatically send

	<?php echo Sentry::get_raven_client(); ?>

## Example

### PHP

##### Add option and manually logging

	// Send exception
	$opt = array('tags' => array('MyTag' => 'MyTag Message'));
	Sentry::send_exception(new Exception('message'), $opt);

	// Send message
	$opt = array('tags' => array('MyTag' => 'MyTag Message'));
	Sentry::send_message('message', $opt);
	Sentry::send_message('%04d-%02d-%02d', $opt, array(2013,4,1));

For more information, see [raven-php](https://github.com/getsentry/raven-php)

### Javascript

##### Add option

	<?php echo Sentry::get_raven_client(array('logger' => 'MyLogger')); ?>

For more information, see [raven-js](http://raven-js.readthedocs.org/en/latest/config/index.html)

##### Manually logging

	try {
		errorThrowingCode();
	} catch(e) {
		Raven.captureException(e);
	}
