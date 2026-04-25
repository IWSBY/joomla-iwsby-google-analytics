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

jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('text');

class JFormFieldDownloadID extends JFormFieldText {

    protected $type = 'DownloadID';

    public function getInput() {

        if ($this->value) {
            $extra_query = "'{$this->element['key']}={$this->value};".$_SERVER['HTTP_HOST']."'";
            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                    ->update('#__update_sites')
                    ->set('extra_query='.$extra_query)
                    ->where('name="System - IWS.BY Google Analytics"');
            $db->setQuery($query);
            $db->execute();
        }
        return parent::getInput();
    }

}