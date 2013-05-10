<?php

return array(
	Fuel::DEVELOPMENT => array(
		'php' => array(
			// If you set true, PHP Error will be automatically sent to Sentry.
			'enabled' => false,
			// See http://raven.readthedocs.org/en/latest/config/#the-sentry-dsn
			'dsn'     => 'http://{PUBLIC_KEY}:{SECRET_KEY}@{HOST}/{PATH}{PROJECT_ID}',
			// See https://github.com/getsentry/raven-php
			'options' => array(
				'tags' => array(
					'php_version' => phpversion(),
					'platform'    => 'Raven PHP'
				)
			)
		),
		'js' => array(
			// If you set true and call Sentry::get_raven_client() in HTML's head tag, Javascript Error will be automatically sent to Sentry.
			'enabled' => false,
			// See http://raven.readthedocs.org/en/latest/config/#the-sentry-dsn
			'dsn'     => 'http://{PUBLIC_KEY}@{HOST}/{PATH}{PROJECT_ID}',
			// See http://raven-js.readthedocs.org/en/latest/config/index.html
 			'options' => array(
 				'logger' => 'javascript'
 			)
		)
	),
	Fuel::STAGING => array(
		'php' => array(
			'enabled' => true,
			'dsn'     => 'http://{PUBLIC_KEY}:{SECRET_KEY}@{HOST}/{PATH}{PROJECT_ID}',
			'options' => array(
				'tags' => array(
					'php_version' => phpversion(),
					'platform'    => 'Raven PHP'
				)
			)
		),
		'js' => array(
			'enabled' => true,
			'dsn'     => 'http://{PUBLIC_KEY}@{HOST}/{PATH}{PROJECT_ID}',
			'options' => array(
				'logger' => 'javascript'
			)
		)
	),
	Fuel::PRODUCTION => array(
		'php' => array(
			'enabled' => false,
			'dsn'     => 'http://{PUBLIC_KEY}:{SECRET_KEY}@{HOST}/{PATH}{PROJECT_ID}',
			'options' => array(
				'tags' => array(
					'php_version' => phpversion(),
					'platform'    => 'Raven PHP'
				)
			)
		),
		'js' => array(
			'enabled' => false,
			'dsn'     => 'http://{PUBLIC_KEY}@{HOST}/{PATH}{PROJECT_ID}',
			'options' => array(
				'logger' => 'javascript'
			)
		)
	),
	Fuel::TEST => array(
		'php' => array(
			'enabled' => false,
			'dsn'     => 'http://{PUBLIC_KEY}:{SECRET_KEY}@{HOST}/{PATH}{PROJECT_ID}',
			'options' => array(
				'tags' => array(
					'php_version' => phpversion(),
					'platform'    => 'Raven PHP'
				)
			)
		),
		'js' => array(
			'enabled' => false,
			'dsn'     => 'http://{PUBLIC_KEY}@{HOST}/{PATH}{PROJECT_ID}',
			'options' => array(
				'logger' => 'javascript'
			)
		)
	)
);
