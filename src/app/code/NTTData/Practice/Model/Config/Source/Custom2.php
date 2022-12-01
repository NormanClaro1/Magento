<?php
namespace NTTData\Practice\Model\Config\Source;
use Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory;


class Custom2 implements \Magento\Framework\Option\ArrayInterface
{
     protected $_attributeFactory;

 public function __construct(
CollectionFactory $collectionFactory)
{
$this->_collectionFactory = $collectionFactory;
}
public function getAttributes() {
$collection = $this->_collectionFactory->create();
$attr_groups = array();

foreach ($collection as $item) {
$attr_groups[] = ['value' =>$item->getData()['frontend_label'], 'label' => $item->getData()['frontend_label']];
}
return $attr_groups;
}

public function toOptionArray()

{
$attributes = $this->getAttributes();

return $attributes;
}

}



