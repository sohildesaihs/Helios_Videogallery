<?php

class Helios_Videogallery_Block_About
    extends Mage_Adminhtml_Block_Abstract
    implements Varien_Data_Form_Element_Renderer_Interface
{

    /**
     * Render fieldset html
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     */
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $html = <<<HTML
    <div>
        <a href="http://www.heliossolutions.in/" target="_blank"><img src="http://www.heliossolutions.in/wp-content/themes/helios/newimages/logo.png"></a>
	    <p><a href="http://www.heliossolutions.in/about-helios/"><span class="wpmega-link-title">About Helios</span></a><div class="wpmega-nonlink uberClearfix"><p>Helios Solutions is an Indian IT sourcing company which sees your relationship with us as equally vital to the success of our outsourcing partnership as our development skills. We focus exclusively on the European market and employ native European Project Managers to bridge the cultural and communication gap and ensure your outsourcing experience to India is the same as if you were working with a European partner. When working with us you will always have a Project Manager from your own country here in India. You can communicate comfortably in your own language and avoid any cultural misunderstandings that might otherwise arise when working across national borders.</p>
	    <p><a href="#"><span class="wpmega-link-title">Address</span></a><div class="wpmega-nonlink wpmega-widgetarea ss-colgroup-1 uberClearfix"><ul id="wpmega-ubermenu-widget-area-2"><li id="custom_post_widget-7" class="widget widget_custom_post_widget"><div class="clearfix"></p>
        <div style="float: left; clear: both; padding-top: 5px;"><b>Email:</b> info@heliossolutions.in, support@heliossolutions.in</div>
	</div>
HTML;
        return $html;
    }
}
