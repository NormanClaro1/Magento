<?php
namespace NTTData\Grid\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use NTTData\Grid\Model\CompanyFactory;

class Delete extends Action
{
    public $CompanyFactory;

    public function __construct(
        Context $context,
        CompanyFactory $CompanyFactory

    ){
        $this->CompanyFactory = $CompanyFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        try {
            $companyModel = $this->CompanyFactory->create();
            $companyModel->load($id);
            $companyModel->delete();
            $this->messageManager->addSuccessMessage(__('You deleted the blog.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $resultRedirect->setPath('grid/index/index');
    }


}
