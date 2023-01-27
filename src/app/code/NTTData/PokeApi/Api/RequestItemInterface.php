<?php
namespace NTTData\PokeApi\Api;
interface RequestItemInterface
{
    const DATA_ID = 'id';
    const DATA_DESCRIPTION = 'description';
    /**
     * @return int
     */
    public function getId();
    /**
     * @return string
     */
    public function getDescription();
    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id);
    /**
     * @param string $generation
     * @return $this
     */
    public function setGeneration(string $generation);
}