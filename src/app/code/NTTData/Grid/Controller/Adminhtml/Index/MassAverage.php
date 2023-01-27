<?php
declare(strict_types=1);

namespace NTTData\Grid\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Backend\App\Action;
use NTTData\Grid\Model\ResourceModel\Company\Grid\CollectionFactory;

class MassAverage extends Action implements \Magento\Framework\App\Action\HttpPostActionInterface
{
    /**
    * @var Filter
    */
    protected $filter;

    /**
    * @var CollectionFactory
    */
    protected $collectionFactory;

    /**
    * @param Context $context
    * @param Filter $filter
    * @param CollectionFactory $collectionFactory
    */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    /**
    * Execute action
    *
    * @return \Magento\Backend\Model\View\Result\Redirect
    * @throws \Magento\Framework\Exception\LocalizedException|\Exception
    */
    public function execute()
    {

        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $sum = $recordAges = 0;
       foreach ($collection as $item) {
            $sum += $item['age'];
            $recordAges++;

        }

        $total = $sum/$recordAges;

        $this->messageManager->addSuccess(__('Average age(s) are %1 .', $total));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('grid/index/index');
     }
}
