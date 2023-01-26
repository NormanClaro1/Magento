<?php

namespace NTTData\Grid\Block\Adminhtml\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class AddButton
 */
class AddButton extends Generic implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Add an Employee'),
            'on_click' => sprintf("location.href = '%s';", $this->getAddUrl()),
            'class' => 'add primary',
            'sort_order' => 10
        ];
    }

    /**
     * Get URL for add button
     *
     * @return string
     */
    public function getAddUrl()
    {
        return $this->getUrl('*/*/Form');
    }
}
