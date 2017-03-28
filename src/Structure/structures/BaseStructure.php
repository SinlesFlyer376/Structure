<?php
namespace Structure\structures;

use pocketmine\block\{Block, Chest};
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\{CompoundTag, IntTag, ListTag, StringTag};
use pocketmine\tile\Tile;

class BaseStructure implements Type{

    private $containerType = -1;
    private $position;

    public function __construct(Position $position)
    {
        $this->position = $position;
    }

    public function fill(Vector3 $pos1, Vector3 $pos2, int $blockId, int $blockData = 0)
    {
        $xa = [$pos1->x, $pos2->x];
        $ya = [$pos1->y, $pos2->y];
        $za = [$pos1->z, $pos2->z];
        for ($x = min($xa); $x <= max($xa); ++$x) {
            for ($y = min($ya); $y <= max($ya); ++$y) {
                for ($z = min($za); $z <= max($za); ++$z) {
                    $this->setBlockIdAt($x, $y, $z, $blockId);
                    if ($blockData !== 0) {//really shouldn't be calling it everytime in the loop...
                        $this->setBlockDataAt($x, $y, $z, $blockData);
                    }
                }
            }
        }
    }

    public function setBlock(Vector3 $pos, $blockId, int $blockDmg = 0)
    {
        $pos = $this->position->add($pos);
        if (!is_numeric($blockId)) {
            $pos->getLevel()->setBlock($pos, $blockId);
        }else{
            $pos->getLevel()->setBlock($pos, Block::get($blockId, $blockDmg));
        }
    }

    public function setBlockIdAt(int $x, int $y, int $z, int $blockId)
    {
        $pos = $this->position->add($x, $y, $z);
        $pos->getLevel()->setBlockIdAt($pos->x, $pos->y, $pos->z, $blockId);
    }

    public function setBlockDataAt(int $x, int $y, int $z, int $blockData)
    {
        $pos = $this->position->add($x, $y, $z);
        $pos->getLevel()->setBlockDataAt($pos->x, $pos->y, $pos->z, $blockData);
    }

    public function getContainerType() : int
    {
        return $this->containerType;
    }

    public function setContainerType(int $type)
    {
        $this->containerType = $type;
    }

    public function createRandomItemsContainer(Vector3 $pos, int $face = 0)
    {
        if ($this->getContainerType() === -1) {
            throw new \Exception('Container type was not set.');
            return;
        }
        $pos = $this->position->add($pos);
        var_dump($pos);
        $nbt = new CompoundTag('', [
            new ListTag('Items', []),
            new StringTag('id', Tile::CHEST),
            new IntTag('x', $pos->x),
            new IntTag('y', $pos->y),
            new IntTag('z', $pos->z)
        ]);
        /** @var Chest $tile */
        $tile = Tile::createTile(Tile::CHEST, $pos->getLevel(), $nbt);
        $tile->spawnToAll();
        $tile->getInventory()->setContents(InventoryContents::getContents($this->getContainerType()));
        $pos->getLevel()->setBlockIdAt($pos->x, $pos->y, $pos->z, Block::CHEST);
        $pos->getLevel()->setBlockDataAt($pos->x, $pos->y, $pos->z, $face);
    }
}