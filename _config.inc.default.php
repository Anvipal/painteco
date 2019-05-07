<?php

//-----------------------------------------------------------------------------
// Site settings
//-----------------------------------------------------------------------------

define ("URL_SITE", "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/");
define ("URL_PHOTOS", "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/photos/");
define ("URL_CATEGORIES", "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/photos/categories/");
define ("URL_BRANDS", "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/photos/brands/");
define ("URL_WOOD_BRICKS", "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/photos/bricks/");

define ("URL_DOCS", "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/userfiles/docs/");
define ("URL_DOCS_FOR_COLORS", "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/userfiles/docs/colors/");

define ("PATH_SITE", $_SERVER['DOCUMENT_ROOT']."/");
define ("PATH_ADMIN", PATH_SITE."admin/");
define ("PATH_PHOTOS", PATH_SITE."photos/products/");
define ("PATH_CATEGORIES", PATH_SITE."photos/categories/");
define ("PATH_BRANDS", PATH_SITE."photos/brands/");
define ("PATH_WOOD_BRICKS", PATH_SITE."photos/bricks/");
define ("PATH_GALLERY", PATH_SITE."photos/gallery/");
define ("PATH_DOCS", PATH_SITE."userfiles/docs/");
define ("PATH_DOCS_FOR_COLORS", PATH_SITE."userfiles/docs/colors/");	// Inside for each color at first is created map named by color id, and then files puted into.

define ("DB_NAME", "dev_painteco_lv");
define ("DB_USER", "root");
define ("DB_PASSW", "1234");
define ("DB_HOST", "localhost");
define ("DB_PORT", "");

define ("ADM_LOGIN", "admin");
define ("ADM_PASSW", "admin#");

define ("DEBUG_MODE", "yes");    // yes / no


//-----------------------------------------------------------------------------
// I18n settings
//-----------------------------------------------------------------------------

define ("NA", "n/a"); 
define ("DEL_CONFIRM", "Are you sure you want to delete?"); 


//-----------------------------------------------------------------------------
// Picture caching
//-----------------------------------------------------------------------------
define('PICT_CACHE_FOLDER', 'cache/');

?>