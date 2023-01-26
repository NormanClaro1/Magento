<?php

namespace NTTData\Grid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Company extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('company', 'id');
    }
}
