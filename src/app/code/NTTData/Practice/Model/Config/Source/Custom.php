<?php

//Location: src/app/code/NTTData/Practice/Model/Config/Source/Custom.php
namespace NTTData\Practice\Model\Config\Source;

class Custom implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {

        return [
            ['value' => 'asc', 'label' => __('Ascendente')],
            ['value' => 'desc', 'label' => __('Descendente')]

        ];
    }
}
