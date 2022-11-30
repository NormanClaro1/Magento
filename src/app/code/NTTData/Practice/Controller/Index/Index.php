<?php
namespace NTTData\Practice\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $helperData;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \NTTData\Practice\Helper\Data $helperData,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
        $this->helperData = $helperData;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
        echo $this->helperData->getGeneralConfig('enable');
		echo $this->helperData->getGeneralConfig('display_text');
		exit();
		 return $this->_pageFactory->create();

	}
}
