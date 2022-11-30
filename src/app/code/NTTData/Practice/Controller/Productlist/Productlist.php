<?php
namespace NTTData\Practice\Controller\Productlist;

class Productlist extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	private $storeManager;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Store\Model\StoreManagerInterface $storeManager
		)
	{
		$this->storeManager = $storeManager;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$storeId = $this->storeManager->getStore()->getId();
        $pageFactory = $this->_pageFactory->create();
        $storeId = 1;
		if ($storeId != 1){
    		date_default_timezone_set("America/Argentina/Buenos_Aires");
		}
		$timeFormat = date('H:i:s');
		$pageFactory->getConfig()->getTitle()->set(__('Now being %1, I am learning translations', $timeFormat));
		return $this->_pageFactory->create();

    }
    public function getBlock()
	{
		echo '<h3>' . get_class($this) . '</h3>';
	}

}
