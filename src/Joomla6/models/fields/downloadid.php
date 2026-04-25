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

use Joomla\CMS\Form\Field\TextField;
use Joomla\CMS\Factory;

class JFormFieldDownloadID extends TextField {

    protected $type = 'DownloadID';

	public function getInput()
    {
        if (!empty($this->value)) {
            $db = $this->getDatabase();
            $key = (string) $this->element['key'];
            $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
            $extra_value = $key . '=' . $this->value . ';' . $host;

            $query = $db->getQuery(true)
                ->update($db->quoteName('#__update_sites'))
                ->set($db->quoteName('extra_query') . ' = ' . $db->quote($extra_value))
                ->where($db->quoteName('name') . ' = ' . $db->quote('System - IWS.BY Google Analytics'));

            try {
                $db->setQuery($query)->execute();
            } catch (\Exception $e) {
                Factory::getApplication()->enqueueMessage('Failed to update license info: ' . $e->getMessage(), 'error');
            }
        }

        return parent::getInput();
    }
}