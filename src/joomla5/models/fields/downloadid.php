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
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Form\FormField;
use Joomla\CMS\Form\Field\TextField;

class JFormFieldDownloadID extends TextField {

    protected $type = 'DownloadID';

    public function getInput() {
		if ($this->value) {
			$db    = $this->getDatabase();
            $extra_query = "'{$this->element['key']}={$this->value};".$_SERVER['HTTP_HOST']."'";
            $query = $db->getQuery(true);
			$query->update($db->quoteName('#__update_sites'));
			$query->set($db->quoteName('extra_query') . ' = ' . $extra_query);
			$query->where($db->quoteName('name') . " = 'System - IWS.BY Google Analytics'");
            $db->setQuery($query);
            try {
                $db->execute();
            } catch (\RuntimeException $e) {
                $app->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }
        return parent::getInput();
    }

}