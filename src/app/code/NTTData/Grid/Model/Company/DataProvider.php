<?php

namespace NTTData\Grid\Model\Company;

use Magento\Ui\DataProvider\AbstractDataProvider;
use NTTData\Grid\Model\ResourceModel\Company\Grid\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $collection;
    protected $dataPersistor;
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $employeeCollectionFactory,
        DataPersistorInterface $dataPersistor,
        PoolInterface $pool = null,
        array $meta = [],
        array $data = []
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->collection = $employeeCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);

    }
    public function getData(){
        if(isset($this->loadedData)){
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        foreach( $items as $item){
            $this->loadedData[$item->getId()] = $item->getData();

        }

        $data = $this->dataPersistor->get('id');
        if(!empty($data)){
            $employee = $this->collection->getNewEmptyItem();
            $employee->setData($data);
            $this->loadedData[$employee->getId()] = $employee->getData();
            $this->dataPersistor->clear('id');
        }

        return $this->loadedData;
    }
}
