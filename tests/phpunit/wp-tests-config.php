<?php

// change the next line to points to your wordpress dir
define( 'ABSPATH', dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) . '\\' );

define( 'WP_DEBUG', false );

// WARNING WARNING WARNING!
// tests DROPS ALL TABLES in the database. DO NOT use a production database

define( 'DB_NAME', 'phpunit' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

$table_prefix = 'wptests_'; // Only numbers, letters, and underscores please!

define( 'WP_TESTS_DOMAIN', 'phpunit.dev' );
define( 'WP_TESTS_EMAIL', 'chris@slushman.com' );
define( 'WP_TESTS_TITLE', 'Test Blog' );

define( 'WP_PHP_BINARY', 'php' );

define( 'WPLANG', '' );

/* Cron tries to make an HTTP request to the blog, which always fails, because tests are run in CLI mode only */
define( 'DISABLE_WP_CRON', true );

define( 'WP_ALLOW_MULTISITE', false );
if ( WP_ALLOW_MULTISITE ) {
    define( 'WP_TESTS_BLOGS', 'first,second,third,fourth' );
}
if ( WP_ALLOW_MULTISITE && !defined('WP_INSTALLING') ) {
    define( 'SUBDOMAIN_INSTALL', WP_TESTS_SUBDOMAIN_INSTALL );
    define( 'MULTISITE', true );
    define( 'DOMAIN_CURRENT_SITE', WP_TESTS_DOMAIN );
    define( 'PATH_CURRENT_SITE', '/' );
    define( 'SITE_ID_CURRENT_SITE', 1);
    define( 'BLOG_ID_CURRENT_SITE', 1);
    //define( 'SUNRISE', TRUE );
}