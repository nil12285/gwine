<?php

class Sample_ProductBlock_Model_Featuredcatalogproduct extends Mage_Core_Model_Abstract
{
	
	public function _construct()
    {
        parent::_construct();
        $this->_init('productblock/featuredcatalogproduct');
    }
}