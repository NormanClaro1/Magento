<?php
declare(strict_types=1);

namespace NTTData\Grid\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $rawFactory
     */
    public function __construct(Context $context, PageFactory $rawFactory)
    {
        $this->pageFactory = $rawFactory;
        parent::__construct($context);
    }

    /**
     * Add the main Admin Grid page
     *
     * @return Page
     */
    public function execute(): Page
    {

        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('NTTData_Grid::top');
        $resultPage->getConfig()->getTitle()->prepend(__('Company Grid'));

        return $resultPage;
    }
}
