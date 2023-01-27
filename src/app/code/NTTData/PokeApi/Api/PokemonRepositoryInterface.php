<?php
namespace NTTData\PokeApi\Api;
interface PokemonRepositoryInterface
{
    /**
     * Return a filtered pokemon.
     *
     * @param int $id
     * @return \NTTData\PokeApi\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getItem(int $id);
    /**
     * Set descriptions for the pokemon.
     *
     * @param \NTTData\PokeApi\Api\RequestItemInterface[] $pokemon
     * @return void
     */
    public function setGeneration(array $pokemon);
}
