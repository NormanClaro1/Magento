<?php
namespace NTTData\PokeApi\Api;
interface ResponseItemInterface
{
    const DATA_ID = 'id';
    const DATA_TYPES = 'types';
    const DATA_NAME = 'name';
    const DATA_GENERATION = 'generation';
    const DATA_MAIN_REGION = 'main_region';
    /**
     * @return int
     */
    public function getId();
    /**
     * @return string
     */
    public function getType();
    /**
     * @return string
     */
    public function getName();
    /**
     * @return string|null
     */
    public function getGeneration();
    /**
     * @param int $generation
     * @return $this
     */
    public function getMainRegion();
    /**
     * @param int $main_region
     * @return $this
     */
    public function setId(int $id);
    /**
     * @param string $id
     * @return $this
     */
    public function setType(string $type);
    /**
     * @param string $type
     * @return $this
     */
    public function setName(string $name);
    /**
     * @param string $name
     * @return $this
     */
    public function setGeneration(string $generation);
    /**
     * @param string $generation
     * @return $this
     */
    public function setMainRegion(string $generation);
    /**
     * @param string $main_region
     * @return $this
     */
}
