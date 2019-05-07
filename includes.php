<?php
/*
  * Common object
  */
include_once(PATH_SITE . 'class/Obj.class.php');



/*
  * HTML MArkup object
  */
include_once(PATH_SITE . 'class/Html.class.php');



	// GENEREJAM HTML RIIKU OBJECTU	
	$__Html = new Html();
	

	
	include_once(PATH_SITE . 'class/Img.class.php');
	
	include_once(PATH_SITE . 'class/Link.class.php');
		include_once(PATH_SITE . 'class/extensions/LinkTopMenu.class.php');		


		
/*
  * HTML FORM DOM objects
  */
include_once(PATH_SITE . 'class/Form.class.php');

	include_once(PATH_SITE . 'class/Input.class.php');
	include_once(PATH_SITE . 'class/Label.class.php');
	include_once(PATH_SITE . 'class/Textarea.class.php');
	include_once(PATH_SITE . 'class/Select.class.php');

	

include_once(PATH_SITE . 'class/pageStructure.class.php');
	include_once(PATH_SITE . 'class/extensions/pageStructure_994px_at_Center.class.php');
	include_once(PATH_SITE . 'class/extensions/pageStructure_117px_at_Center.class.php');
	include_once(PATH_SITE . 'class/extensions/pageStructure_Popup_at_Center.class.php');
	
include_once(PATH_SITE . 'class/contentStructure.class.php');
	include_once(PATH_SITE . 'class/extensions/contentStructureIntro.class.php');
	include_once(PATH_SITE . 'class/extensions/contentStructurePopup.class.php');



include_once(PATH_SITE . 'class/custom/HtmlBlock.class.php');
$__Html->setCssLink('css/HtmlBlock.css');
$__Html->setCssLinkIE6('css/HtmlBlock-ie6.css');

include_once(PATH_SITE . 'class/custom/HtmlSmallBlock.class.php');
$__Html->setCssLink('css/HtmlSmallBlock.css'); // FIXME ?
$__Html->setCssLinkIE6('css/HtmlSmallBlock-ie6.css'); // FIXME ?


include_once(PATH_SITE . 'class/custom/HtmlTabledList.class.php');
include_once(PATH_SITE . 'class/custom/HtmlTabbedContent.class.php');
include_once(PATH_SITE . 'class/custom/Pagination.class.php');
	include_once(PATH_SITE . 'class/custom/PaginationPublic.class.php');





?>
