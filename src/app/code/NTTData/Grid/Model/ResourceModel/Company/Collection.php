<?php

namespace NTTData\Grid\Model\ResourceModel\Company;

use NTTData\Grid\Model\Company as CompanyModel;
use NTTData\Grid\Model\ResourceModel\Company as CompanyResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            CompanyModel::class,
            CompanyResourceModel::class
        );
    }
}
