<?php
/**
 * 
 * @package    System - IWS.BY Google Analytics
 * @subpackage Modules
 * 
 * @license    GNU GPL v2 or later, see LICENSE.txt
 * @link       https://iws.by/en/product/google-analytics-for-joomla/
 * 
 */

// No direct access
defined('_JEXEC') or die;
jimport('joomla.plugin.plugin');

class plgSystemIwsby_Ganalytics extends JPlugin{
    
    protected $autoloadLanguage = true;

    function onBeforeCompileHead() {
        $app = JFactory::getApplication();
        if($app->isAdmin())
        {
            return;
        }
        
        $ganalyticscode = $this->params->get("gacode");
        $document = JFactory::getDocument();
		if(!empty($ganalyticscode)){
			$document->addCustomTag($ganalyticscode);
		}
    }
}