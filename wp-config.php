<?php
# Database Configuration
define( 'DB_NAME', 'wp_studyedgewp' );
define( 'DB_USER', 'studyedgewp' );
define( 'DB_PASSWORD', 'RbssK6q8MOogJ8c5NvYJ' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );

define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY', ':_$Cem8FgrVI;=*I-k~NjQN,jwzu8n!`MKt#Cd-u F:8m#ep2bi?:m^RhK/a&T:f');
define('SECURE_AUTH_KEY', '7:<_M/n_M@v7oN!%Msu^tg|SW -S-@TE:/{tCk|l+QVy}+y}L1_|)ZA2`(p*86oS');
define('LOGGED_IN_KEY', '**c.HzR*| Rx:n4rz(#g{UYh)nt|c%Z7z7L9lL*+oZg[FMuS8z_{U}ul.*(mgAZd');
define('NONCE_KEY', '9UYC(|AMO`YoivjZ6GWoq$e<!?J{P_J[Qjl~vUOu@:O[|/ K(%NdX/F|}mh2n7XQ');
define('AUTH_SALT',        '9tzDxvy5tP +-NO;k]:xL{npMtVxs9JRcBF1<K(!Mj}cT8g87c+;|/J[H+e6lXX3');
define('SECURE_AUTH_SALT', 'F>_NsIAg.SzVz<2p7b/y-I8iTj^*i,UZ#31E~rd|Bg1-kWf>zdLKF@aVH+$,)85 ');
define('LOGGED_IN_SALT',   ' [J)-F,dImhxZH-qg*+c.Bb-s(ikj?{C.Z;-VP)P?7Y48gD0^4|agf}bGU|pn>~ ');
define('NONCE_SALT',       '&##RcWKeTkQXny-(nwgt.!P-X+h2Atub+/L:=(AD7z0-kEH4y+*zz%.?aqJITcw<');

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define( 'DOMAIN_CURRENT_SITE', 'studyedge.com' );
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

define( 'WP_SITEURL', 'http://studyedge.com' );
define( 'WP_HOME', 'http://studyedge.com' );

# Amazon S3 stuff - will get rid of this soon
define('BUCKET_DIR', 'http://studyedge.com.s3.amazonaws.com/');
define('IMAGE_DIR', BUCKET_DIR . 'images/');

define('AWS_ACCESS_KEY_ID', 'AKIAJWD55PIRERX7MVSA');
define('AWS_SECRET_ACCESS_KEY', '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');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'studyedgewp' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '25c164c8d671e3254740ad94cfd80f9d6587be3b' );

define( 'WPE_CLUSTER_ID', '101155' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', false );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

// We need revisions!
define( 'WP_POST_REVISIONS', 5 );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'studyedge.com', 1 => 'www.studyedge.com', 2 => 'studyedgewp.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-101155', );

$wpe_special_ips=array ( 0 => '104.154.59.58', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );


# WP Engine ID


# WP Engine Settings

$base = '/';

# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
