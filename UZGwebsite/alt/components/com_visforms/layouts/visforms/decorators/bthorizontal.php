<?php
/**
 * Visforms layout specific html decoration for bootstrap horizontal layout
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

if (!empty($displayData)) : 
    if (isset($displayData['field']) && isset($displayData['clabel']) && isset($displayData['ccontrol']) && isset($displayData['ccustomtext'])) :
        //we can only decorate the outer bootstrap horizontal div class=control group, 
        //the inner div class=control is part of the control because it's position divers, depending on the field type
        $field = $displayData['field'];
        $clabel = $displayData['clabel'];
        $ccontrol = $displayData['ccontrol'];
        $ccustomtext = $displayData['ccustomtext'];
        $html = "";
        if (($clabel != "") || ($ccontrol != "") || ($ccustomtext != ""))
        {
            $html .= '<div class="fc-tbx' . $field->errorId . '"></div>';
            //Extra Markup for Bootstrap horizontal layout)
            $html .= ' <div class="control-group';
            $html .= (isset($field->isConditional) && ($field->isConditional == true)) ? ' conditional field' . $field->id : '';
            $html .= (isset($field->attribute_required) && ($field->attribute_required == true)) ? ' required' : '';
            //closing quote for class attribute
            $html .= '"';
            $html .= (isset($field->isDisabled) && ($field->isDisabled == true)) ? ' style="display:none;">' : '>';
            if (($ccustomtext != '') && (isset($field->customtextposition)) && (($field->customtextposition == 0) || ($field->customtextposition == 1)))
            {
                $html .= '<div class="controls">';
                $html .= $ccustomtext;
                $html .= '</div>';
            }
            $html .= $clabel;
            $html .= '<div class="controls">';
            $html .= $ccontrol;
            $html .= '</div>';
            if (($ccustomtext != '') && (((isset($field->customtextposition)) && ($field->customtextposition == 2)) || !(isset($field->customtextposition))))
            {
                $html .= '<div class="controls">';
                $html .= $ccustomtext;
                $html .= '</div>';
            }
            $html .= '</div>';
        }  
        echo $html;
    endif;  
endif; ?>