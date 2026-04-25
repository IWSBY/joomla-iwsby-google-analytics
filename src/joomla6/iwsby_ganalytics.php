<?php
/**
 * 
 * @package    System - IWS.BY Google Analytics
 * @subpackage Plugins
 * 
 * @license    GNU GPL v2 or later, see LICENSE.txt
 * @link       https://iws.by/en/product/google-analytics-for-joomla/
 * 
 */

// No direct access
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;

class plgSystemIwsby_Ganalytics extends CMSPlugin{
    
    protected $app;
    protected $autoloadLanguage = true;

    function onBeforeCompileHead() {
        if (!$this->app->isClient('site'))
        {
            return;
        }
        
        $ganalyticscode = $this->params->get("gacode");
		$document = Factory::getApplication()->getDocument();
		if(!empty($ganalyticscode)){
			$document->addCustomTag($ganalyticscode);
		}
    }
}