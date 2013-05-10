<?php

Autoloader::add_core_namespace('Sentry');

Autoloader::add_classes(array(
	'Sentry\\Sentry' => __DIR__.'/classes/sentry.php',
	'Sentry\\Error'  => __DIR__.'/classes/error.php',
));
