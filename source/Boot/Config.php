<?php


/**
 * DATABASE
 */

define("CONF_DB_HOST_LOCAL", "localhost");
define("CONF_DB_USER_LOCAL", "root");
define("CONF_DB_PASS_LOCAL", "Thelast2244@");
define("CONF_DB_NAME_LOCAL", "granatum");


define("CONF_DB_HOST_DEPLOY", "us-cdbr-east-03.cleardb.com");
define("CONF_DB_USER_DEPLOY", "b62a18488d41be");
define("CONF_DB_PASS_DEPLOY", "61da49fe");
define("CONF_DB_NAME_DEPLOY", "heroku_44e15c22e0ee8cc");


/** PROJECT URLs */

define("CONF_URL_TEST", "http://localhost/granatum");
define("CONF_URL_DEPLOY", "https://www.granatum.com.br/financeiro");


/**
 * SITE
 */
define("CONF_SITE_NAME", "Granatum");
define("CONF_SITE_TITLE", "Presentes e amigos secretos");
define("CONF_SITE_DESC","hello");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "https://www.granatum.com.br/financeiro");
define("CONF_SITE_ADDR_STREET", "-");
define("CONF_SITE_ADDR_NUMBER", "-");
define("CONF_SITE_ADDR_COMPLEMENT", "-");
define("CONF_SITE_ADDR_CITY", "São Paulo");
define("CONF_SITE_ADDR_STATE", "SP");
define("CONF_SITE_ADDR_ZIPCODE", "-");

/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "a");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "a");
define("CONF_SOCIAL_FACEBOOK_APP", "a");
define("CONF_SOCIAL_FACEBOOK_PAGE", "a");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "a");
define("CONF_SOCIAL_GOOGLE_PAGE", "a");
define("CONF_SOCIAL_GOOGLE_AUTHOR", "a");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "a");
define("CONF_SOCIAL_YOUTUBE_PAGE", "");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "web");
define("CONF_VIEW_APP", "dashboard");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "smtp.sendgrid.net");
define("CONF_MAIL_PORT", "587");
define("CONF_MAIL_USER", "apikey");
define("CONF_MAIL_PASS", "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");
define("CONF_MAIL_SENDER", ["name" => "Sistema", "address" => "hanonymous727@gmail.com"]);
define("CONF_MAIL_SUPPORT", "hanonymous727@gmail.com");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");


