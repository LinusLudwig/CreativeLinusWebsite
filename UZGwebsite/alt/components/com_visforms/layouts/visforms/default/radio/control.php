<?php
/**
 * Visforms control html for radio for default layout
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
    if (isset($displayData['field'])) :
        $field = $displayData['field'];
        $html = '';
        $k=count($field->opts);
        $checked = "";
        $inputAttributes = (!empty($field->attributeArray)) ? JArrayHelper::toString($field->attributeArray, '=',' ', true) : '';

        if (isset($field->display) && $field->display == 'LST')
        {
            //Show radios as a list; Wrap them in an div
            $html .= '<div class="visCSSclear '.$field->fieldCSSclass.'">';
        }
		else 
        {
            $html .= '<p class="visCSStop0 visCSSmargLeft visCSSrbinl '.$field->fieldCSSclass.'">';
        }
        for ($j=0;$j < $k; $j++)
        {	
            if ($field->opts[$j]['selected'] != false) 
            {
                $checked = 'checked="checked" ';
            }
            else
            {
                $checked = "";
            }

            if (isset($field->display) && $field->display == 'LST')
            {
                if($j!=0)
                {
                    $html .= '<br />';
                }
                $labelClass = 'visCSSbot5 visCSSrllst ';
                $html .= '<label class="'.  $labelClass . ' ' . $field->labelCSSclass . '" id="' . $field->name . 'lbl_' . $j .'" for="field' . $field->id . '_' . $j .'">' . $field->opts[$j]['label'] . '</label>';
                $html .= '<input id="field' . $field->id . '_' . $j . '" name="' . $field->name .'" value="' . $field->opts[$j]['value'] .'" ' . $checked  . $inputAttributes . ' aria-labelledby="' . $field->name . 'lbl ' . $field->name . 'lbl_' . $j . '" />';
            }
            else 
            {
                $labelClass = 'visCSStop10 visCSSright20 visCSSrlinl ';
                $html .= '<input id="field' . $field->id . '_' . $j . '" name="' . $field->name .'" value="' . $field->opts[$j]['value'] .'" ' . $checked  . $inputAttributes . '  aria-labelledby="' . $field->name . 'lbl ' . $field->name . 'lbl_' . $j . '"/>';
                $html .= '<label class="'.  $labelClass . ' ' . $field->labelCSSclass . '" id="' . $field->name . 'lbl_' . $j .'" for="field' . $field->id . '_' . $j .'">' . $field->opts[$j]['label'] . '</label>';
            } 	
        }
        if (isset($field->display) && $field->display == 'LST') 
		{
			$html .= '</div>';
		}
		else 
		{
			$html .= '</p>';
        }        
        echo $html;
    endif;  
endif; ?>