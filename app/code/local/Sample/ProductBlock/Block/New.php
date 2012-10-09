<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category    Sample
 * @package     Sample_ProductBlock
 * @copyright   Copyright (c) 2009 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */


/**
 * Digg link widget
 *
 * @category    Sample
 * @package     Sample_ProductBlock
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Sample_ProductBlock_Block_New extends Mage_Catalog_Block_Product_New implements Mage_Widget_Block_Interface
{
    
    protected function _construct()
    {
        parent::_construct();
    }
    

    /**
     * Produces html
     *
     * @return string
     */
    protected function _toHtml()
    { 
        $productIds = Mage::getModel('productblock/featuredcatalogproduct')->getCollection();
        
        $columns = $this->getData('columns');
        $title = $this->getData('Title');
        $_add_to_link = $this->getData('add_to_link');        
        $products_count = ($this->getData('products_count'))? $this->getData('products_count') : parent::getProductsCount();
        
        //$product = Mage::getModel('catalog/product');
        $pIds = array();        
        foreach($productIds as $pId){            
            $pIds[] = $pId->getEntityId();
        }
        $collection =  Mage::getModel('catalog/product')
                                ->getCollection()
                                ->addAttributeToSelect('*')
                                //->addFieldToFilter('status', 1)
                                //->addFieldToFilter('visibility', 4)
                                ->addFieldToFilter('entity_id', array('in'=>$pIds));
                                //->getSelect()
        
        $this->assign('_columnCount',$columns);
        $this->assign('_title',$title);
        $this->assign('_add_to_link',$_add_to_link);
        $this->assign('_products',$collection);
        return parent::_toHtml();
    }

}
