<?php
namespace NTTData\PokeApi\Model\Api;
use NTTData\PokeApi\Api\RequestItemInterface;
use Magento\Framework\DataObject;
/**
 * Class RequestItem
 */
class RequestItem extends DataObject implements RequestItemInterface
{
    public function getId() : int
    {
        return $this->_getData(self::DATA_ID);
    }
    public function getGeneration() : string
    {
        return $this->_getData(self::DATA_GENERATION);
    }
    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id) : mixed
    {
        return $this->setData(self::DATA_ID, $id);
    }
    /**
     * @param string $name
     * @return $this
     */
    public function setGeneration(string $generation) : mixed
    {
        return $this->setData(self::DATA_Generation, $generation);
    }
}
