<?php
namespace NTTData\Practice\Controller\Productlist;

class Productlist extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$objectManager =  \Magento\Framework\App\ObjectManager::getInstance();
		$storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
		$date = $storeManager->getStore()->getStoreId();
        $pageFactory = $this->_pageFactory->create();
        $date = 1;
		if ($date != 1){
    		date_default_timezone_set("America/Argentina/Buenos_Aires");
		}
		$time = date('H:i:s');
		$pageFactory->getConfig()->getTitle()->set(__('Now being %1, I am learning translations', $time));
		return $this->_pageFactory->create();

    }
    public function getBlock()
	{
		echo '<h3>' . get_class($this) . '</h3>';
	}
}
