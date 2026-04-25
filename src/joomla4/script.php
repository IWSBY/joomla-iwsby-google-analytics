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

class plgsystemIwsby_GanalyticsInstallerScript
{
	function postflight($type, $parent) 
	{
		if($type == "install" || $type == "update"){
            echo JText::_('PLG_IWSBY_GANALYTICS_INSTALL_INFO_NOTIFY');
		}
	}
}