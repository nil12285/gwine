<?php

class Sample_ProductBlock_Model_Resource_Featuredcatalogproduct extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        $this->_init('productblock/featuredcatalogproduct', 'id');        
    }
}
