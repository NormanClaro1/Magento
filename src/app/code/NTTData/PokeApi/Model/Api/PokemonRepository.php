<?php
namespace NTTData\PokeApi\Model\Api;
use NTTData\PokeApi\Api\PokemonRepositoryInterface;
use NTTData\PokeApi\Api\RequestItemInterfaceFactory;
use NTTData\PokeApi\Api\ResponseItemInterfaceFactory;
use Magento\Catalog\Api\Data\PokemonInterface;
use Magento\Catalog\Model\ResourceModel\Pokemon\Action;
use Magento\Catalog\Model\ResourceModel\Pokemon\CollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
/**
 * Class PokemonRepository
 */
class PokemonRepository implements PokemonRepositoryInterface
{
    /**
     * @var Action
     */
    private $pokemonAction;
    /**
     * @var CollectionFactory
     */
    private $pokemonCollectionFactory;
    /**
     * @var RequestItemInterfaceFactory
     */
    private $requestItemFactory;
    /**
     * @var ResponseItemInterfaceFactory
     */
    private $responseItemFactory;
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;
    /**
     * @param Action $pokemonAction
     * @param CollectionFactory $pokemonCollectionFactory
     * @param RequestItemInterfaceFactory $requestItemFactory
     * @param ResponseItemInterfaceFactory $responseItemFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Action $pokemonAction,
        CollectionFactory $pokemonCollectionFactory,
        RequestItemInterfaceFactory $requestItemFactory,
        ResponseItemInterfaceFactory $responseItemFactory,
        StoreManagerInterface $storeManager
    ) {
        $this->pokemonAction = $pokemonAction;
        $this->pokemonCollectionFactory = $pokemonCollectionFactory;
        $this->requestItemFactory = $requestItemFactory;
        $this->responseItemFactory = $responseItemFactory;
        $this->storeManager = $storeManager;
    }
    /**
     * {@inheritDoc}
     *
     * @param int $id
     * @return ResponseItemInterface
     * @throws NoSuchEntityException
     */
    public function getItem(int $id) : mixed
    {
        $collection = $this->getPokemonCollection()
            ->addAttributeToFilter('entity_id', ['eq' => $id]);
        /** @var PokemonInterface $pokemon */
        $pokemon = $collection->getFirstItem();
        if (!$pokemon->getId()) {
            throw new NoSuchEntityException(__('Pokemon not found'));
        }
        return $this->getResponseItemFromPokemon($pokemon);
    }
    /**
     * {@inheritDoc}
     *
     * @param RequestItemInterface[] $pokemons
     * @return void
     */
    public function setGeneration(array $pokemons) : void
    {
        foreach ($pokemons as $pokemons) {
            $this->setGenerationForPokemon(
                $pokemon->getId(),
                $pokemon->getGeneration()
            );
        }
    }
    /**
     * @return Collection
     */
    private function getPokemonCollection() : mixed
    {
        /** @var Collection $collection */
        $collection = $this->pokemonCollectionFactory->create();
        $collection
            ->addAttributeToSelect(
                [
                    'entity_id',
                    PokemonInterface::TYPE,
                    PokemonInterface::NAME,
                    'generation'
                ],
                'left'
            );
        return $collection;
    }
    /**
     * @param PokemonInterface $pokemon
     * @return ResponseItemInterface
     */
    private function getResponseItemFromPokemon(PokemonInterface $pokemon) : mixed
    {
        /** @var ResponseItemInterface $responseItem */
        $responseItem = $this->responseItemFactory->create();
        $responseItem->setId($pokemon->getId())
            ->setType($pokemon->getType())
            ->setName($pokemon->getName())
            ->setGeneration($pokemon->getGeneration());
        return $responseItem;
    }
    /**
     * Set the description for the pokemon.
     *
     * @param int $id
     * @param string $generation
     * @return void
     */
    private function setGenerationForPokemon(int $id, string $generation) : void
    {
        $this->pokemonAction->updateAttributes(
            [$id],
            ['generation' => $generation],
            $this->storeManager->getStore()->getId()
        );
    }
}
