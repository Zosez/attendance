<?php

	session_set_cookie_params([
		'lifetime' => 0,          // Expire when browser closes
        'path' => '/',
        'domain' => '',           // Your domain
        'secure' => true,        // Change to true if using HTTPS
        'httponly' => true,       // Prevents JavaScript access (good for XSS protection)
        'samesite' => 'Lax'       // Helps prevent CSRF attacks
	]);

	session_start();

?>