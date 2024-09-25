<?php
/**
 * Visforms view for Visforms
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
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');
jimport( 'joomla.html.parameter');

/**
 * Visforms View class
 *
 * @package		Joomla.Site
 * @subpackage	com_visforms
 * @since		1.6
 */
class VisformsViewVisforms extends JViewLegacy
{
    protected $menu_params;
	protected $visforms;
	protected $formLink;
    protected $state;
    
	function display($tpl = null)
	{
        $app = JFactory::getApplication();
		$this->menu_params = $this->get('menuparams');
        $this->visforms = $this->get('Form');
		if (empty($this->visforms))
        {
            JError::raiseWarning(403, JText::_('COM_VISFORMS_FORM_MISSING'));
			return;
        }
        
        if ($app->input->get('layout') == "message")
        {
            if (isset($this->visforms->menu_params))
			{
				$this->menu_params = $this->visforms->menu_params;
			}
            $this->message = $app->getUserState('com_visforms.form' . $this->visforms->id . '.message');
            $app->setUserState('com_visforms.form' . $this->visforms->id , null);
        }
        else
        {
            //check if user access level allows view
            $user = JFactory::getUser();
            $groups = $user->getAuthorisedViewLevels();
            $access = (isset($this->visforms->access) && in_array($this->visforms->access, $groups)) ? true : false;
            if ($access == false)
            {
                $app->setUserState('com_visforms.form' . $this->visforms->id . '.fields', null);
                $app->setUserState('com_visforms.form' . $this->visforms->id , null);
                JError::raiseWarning(403, JText::_('JERROR_ALERTNOAUTHOR'));
                return;
            }
            
            $title = '';
            if (isset($this->menu_params) && $this->menu_params->get('page_title'))
            {
                $title = $this->menu_params->get('page_title') ;
            }
            if ($app->get('sitename_pagetitles', 0) == 1)
            {
                $title = JText::sprintf('JPAGETITLE', $app->get('sitename'), $title);
            }
            elseif ($app->get('sitename_pagetitles', 0) == 2)
            {
                $title = JText::sprintf('JPAGETITLE', $title, $app->get('sitename'));
            }
            $this->document->setTitle($title);

            $fields = $this->get('Fields');
            $app->setUserState('com_visforms.form' . $this->visforms->id , null);
            $this->visforms->fields = $fields;

            //Trigger onFormPrepare event 
            JPluginHelper::importPlugin('visforms');
            $dispatcher = JDispatcher::getInstance();
            $dispatcher->trigger('onVisformsFormPrepare', array ('com_visforms.form', &$this->visforms, &$this->menu_params));	

            $this->formLink = "index.php?option=com_visforms&view=visforms&task=send&id=".$this->visforms->id;

            $document = JFactory::getDocument();

            // Set metadata Description and Keywords - we could use $this->document instead of $document		
            if (isset($this->menu_params) && $this->menu_params->get('menu-meta_description'))
            {
                $document->setDescription($this->menu_params->get('menu-meta_description'));
            }
            if (isset($this->menu_params) && $this->menu_params->get('menu-meta_keywords'))
            {
                $document->setMetadata('keywords', $this->menu_params->get('menu-meta_keywords'));
            }

            $options = array();
            $options['showRequiredAsterix'] = (isset($this->visforms->requiredasterix)) ? $this->visforms->requiredasterix : 1;
            $options['parentFormId'] = 'visform' . $this->visforms->id;

            //process form layout
            $olayout = VisformsLayout::getInstance($this->visforms->formlayout, $options);
            if(is_object($olayout))
            {
                //add layout specific css
                $olayout->addCss();
            }	
        }
		parent::display($tpl);
		
	}

}
?>
