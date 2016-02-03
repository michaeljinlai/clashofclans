<?php 
    define('SITE_LIVE', false);



    define('ROOT_PATH', (SITE_LIVE) ? "" : "/clashofclans");

    if (SITE_LIVE) {
    	error_reporting(0);
    }
?>