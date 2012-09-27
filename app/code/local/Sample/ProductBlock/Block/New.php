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
        $columns = $this->getData('columns');
        $title = $this->getData('Title');
        $_add_to_link = $this->getData('add_to_link');        
        $products_count = ($this->getData('products_count'))? $this->getData('products_count') : parent::getProductsCount();
        
        $collection = Mage::getResourceModel('catalog/product_collection');
        $collection->setVisibility(Mage::getSingleton('catalog/product_visibility')->getVisibleInCatalogIds());
        
        $collection = $this->_addProductAttributesAndPrices($collection)
            ->addStoreFilter()
            ->addAttributeToSort('updated_at', 'desc')
            ->setPageSize($products_count)
            ->setCurPage(1);
        
        //printr($collection);
        $this->assign('_columnCount',$columns);
        $this->assign('_title',$title);
        $this->assign('_add_to_link',$_add_to_link);
        $this->assign('_products',$collection);
        return parent::_toHtml();
        
        #return '<a class="digg" href="http://www.digg.com/submit?url='
        #    . $this->getUrl('*/*/*', array('_current' => true, '_use_rewrite' => true))
        #    . '&amp;phase=2" title="You Digg?">You Digg?</a>';
    }

}
