<?php

namespace NTTData\Practice\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_PRACTICE = 'practice/';

	public function getConfigValue($field, $storeId = null)
	{
		return $this->scopeConfig->getValue(
			$field, ScopeInterface::SCOPE_STORE, $storeId
		);
	}

	public function getEnable()
	{

		return $this->getConfigValue(self::XML_PATH_PRACTICE .'general/'. "enable");
	}

    public function getLimit()
    {
        return $this->getConfigValue(self::XML_PATH_PRACTICE .'general/'. "limit");
    }

    public function getOrderField()
    {
        return $this->getConfigValue(self::XML_PATH_PRACTICE .'general/'. "order_field");
    }

    public function getOrderDirection()
    {
        return $this->getConfigValue(self::XML_PATH_PRACTICE .'general/'. "order_direction");
    }

}
