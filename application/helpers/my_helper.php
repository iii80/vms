<?php

function get_full_host() {
	$proto = "https"; if($_SERVER['HTTP_PORT'] == 80 || !isset($_SERVER['HTTPS'])) $proto = 'http';
	return sprintf("%s://%s", $proto, $_SERVER['HTTP_HOST']);
}