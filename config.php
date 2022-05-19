<?php
define('MAIN_URL',
	(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http").
	"://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");