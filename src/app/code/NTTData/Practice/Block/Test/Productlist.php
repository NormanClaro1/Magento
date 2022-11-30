<?php
namespace NTTData\Practice\Block\Test;
use NTTData\Practice\Helper\Data;
class Productlist extends \Magento\Framework\View\Element\Template
{
 /*
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
*/
    protected $_productCollectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = [],
        Data $Helper
    )
    {
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context,$data);
        $this->Helper = $Helper;
    }


    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->setOrder($this->Helper->getOrderDirection());
        $collection->setPageSize($this->Helper->getLimit());
        return $collection;
    }

    public function getBlock()
	{
		echo '<h3>' . get_class($this) . '</h3>';
	}
    public function testEnable()
    {
        return $this->Helper->getLimit();
    }
}
