<?php
namespace NTTData\RestApi\Model\Api;
use Dev\RestApi\Api\ResponseItemInterface;
use Magento\Framework\DataObject;
/**
 * Class ResponseItem
 */
class ResponseItem extends DataObject implements ResponseItemInterface
{
    public function getId() : int
    {
        return $this->_getData(self::DATA_ID);
    }
    public function getType() : string
    {
        return $this->_getData(self::DATA_TYPE);
    }
    public function getName() : string
    {
        return $this->_getData(self::DATA_NAME);
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
     * @param string $id
     * @return $this
     */
    public function setType(string $type) : mixed
    {
        return $this->setData(self::DATA_TYPE, $type);
    }
    /**
     * @param string $type
     * @return $this
     */
    public function setName(string $name) : mixed
    {
        return $this->setData(self::DATA_NAME, $name);
    }
    /**
     * @param string $name
     * @return $this
     */
    public function setGeneration(string $generation) : mixed
    {
        return $this->setData(self::DATA_GENERATION, $generation);
    }
}
