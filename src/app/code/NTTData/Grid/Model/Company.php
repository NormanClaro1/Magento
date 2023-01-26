<?php

namespace NTTData\Grid\Model;

use NTTData\Grid\Model\ResourceModel\Company as CompanyResourceModel;
use Magento\Framework\Model\AbstractModel;

class Company extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(CompanyResourceModel::class);
    }
}
