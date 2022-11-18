<?php
namespace NTTData\Practice\Block\Test;
class Productlist extends \Magento\Framework\View\Element\Template
{
 /*
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
*/
    protected $_productCollectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
    )
    {
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context);
    }


    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->setOrder(
            'name',
            'desc'
        );
        $collection->setPageSize(10);
        return $collection;
    }
    public function getBlock()
	{
		echo '<h3>' . get_class($this) . '</h3>';
	}
}
