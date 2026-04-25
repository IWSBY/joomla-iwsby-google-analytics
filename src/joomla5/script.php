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

use Joomla\CMS\Language\Text;
use Joomla\CMS\Log\Log;

class plgsystemIwsby_GanalyticsInstallerScript
{
	public function __construct()
    {
        $this->minimumJoomla = '5.0';
        $this->minimumPhp = JOOMLA_MINIMUM_PHP;
    }

    function preflight($type, $parent)
    {
        if(!empty($this->minimumPhp) && version_compare(PHP_VERSION, $this->minimumPhp, '<'))
        {
            Log::add(Text::sprintf('JLIB_INSTALLER_MINIMUM_PHP', $this->minimumPhp), Log::WARNING, 'jerror');
            return false;
        }

        if(!empty($this->minimumJoomla) && version_compare(JVERSION, $this->minimumJoomla, '<'))
        {
            Log::add(Text::sprintf('JLIB_INSTALLER_MINIMUM_JOOMLA', $this->minimumJoomla), Log::WARNING, 'jerror');
            return false;
        }

        return true;
    }
	
	function postflight($type, $parent) 
	{
		if($type == "install" || $type == "update"){
            echo Text::_('PLG_IWSBY_GANALYTICS_INSTALL_INFO_NOTIFY');
		}
	}
}