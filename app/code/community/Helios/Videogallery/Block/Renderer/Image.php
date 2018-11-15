<?php

/**
 * Class Helios_Videogallery_Block_Renderer_Image
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Block_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        if (empty($row['videogallery_url'])) {
            return '';
        }

        $url = $row['videogallery_url'];
        $checkurl = explode('?v=', $url);

        return '<img width="200px" height="150px" src="http://img.youtube.com/vi/' . $checkurl[1] . '/0.jpg" />';
    }

}
