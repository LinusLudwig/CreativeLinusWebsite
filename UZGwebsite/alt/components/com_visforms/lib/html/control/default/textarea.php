<?php
/**
 * Visforms create control HTML class
 *
 * @author       Aicha Vack
 * @package      Joomla.Site
 * @subpackage   com_visforms
 * @link         http://www.vi-solutions.de 
 * @license      GNU General Public License version 2 or later; see license.txt
 * @copyright    2012 vi-solutions
 * @since        Joomla 1.6 
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * create visforms default textarea HTML control
 *
 * @package		Joomla.Site
 * @subpackage	com_visforms
 * @since		1.6
 */
class VisformsHtmlControlVisformsTextarea extends VisformsHtmlControl
{
   
    /**
    * Method to create the html string for control
    * @return string html
    */
   public function getControlHtml ()
   {
        $field = $this->field->getField();
        //input
        $html = '';
        $layout = new JLayoutFile('visforms.default.textarea.control', null);
        $layout->setOptions(array('component' => 'com_visforms'));
        $html .= $layout->render(array('field' => $field));      
        return $html; 
   }
   
   /**
    * Method to create the html string for control label
    * @return string html
    */
   public function createLabel()
   {
        $field = $this->field->getField();
        $labelClass = $this->getLabelClass();
        $field->labelClass = $labelClass;
        //label
        $html = '';

        $layout = new JLayoutFile('visforms.default.textarea.label', null);
        $layout->setOptions(array('component' => 'com_visforms'));
        $html .= $layout->render(array('field' => $field));      
        return $html;
   }
   
   /**
    * Method to create class attribute value for label tag according to layout
    * @return string class attribute value
    */
   protected function getLabelClass ()
   {
       $labelClass = '';
       switch ($this->layout)
       {
           case 'bthorizontal' :
               $labelClass = ' control-label ' ;
               break;
           case 'btdefault' :
               $labelClass = '';
               break;
           default :
               $labelClass = ' visCSSlabel ';
               if ($this->field->getField()->custominfo != "")
               {
                   $labelClass = ' visCSSbot5 visCSSlabel ';
               }
               break;
       }
       return $labelClass;
   }
}