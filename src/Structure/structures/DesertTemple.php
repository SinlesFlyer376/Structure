<?php
namespace Structure\structures;

use pocketmine\block\{BlockIds, Chest, SandstoneStairs};
use pocketmine\math\Vector3;

class DesertTemple extends BaseStructure{

    public function generate() : float
    {
        $time = microtime(true);
        for ($x = 0; $x < 21; ++$x) {
            for ($z = 0; $z < 21; ++$z) {
                $this->setBlockIdAt($x, 13, $z, BlockIds::SANDSTONE);
            }
        }
        $this->fill(new Vector3(0, 14, 0), new Vector3(20, 18, 20), BlockIds::SANDSTONE);
        for ($i = 1; $i <= 9; ++$i) {
            $this->fill(new Vector3($i, $i + 18, $i), new Vector3(20 - $i, $i + 18, 20 - $i), BlockIds::SANDSTONE);
            $this->fill(new Vector3($i + 1, $i + 18, $i + 1), new Vector3(19 - $i, $i + 18, 19 - $i), BlockIds::AIR);
        }

        // east tower
        $this->fill(new Vector3(0, 18, 0), new Vector3(4, 27, 4), BlockIds::SANDSTONE);
        $this->fill(new Vector3(1, 28, 1), new Vector3(3, 28, 3), BlockIds::SANDSTONE);
        $stairsN = new SandstoneStairs(Vector3::SIDE_SOUTH);
        $this->setBlock(new Vector3(2, 28, 0), $stairsN);
        $stairsE = new SandstoneStairs(Vector3::SIDE_WEST);
        $this->setBlock(new Vector3(4, 28, 2), $stairsE);
        $stairsS = new SandstoneStairs(Vector3::SIDE_NORTH);
        $this->setBlock(new Vector3(2, 28, 4), $stairsS);
        $stairsW = new SandstoneStairs(Vector3::SIDE_EAST);
        $this->setBlock(new Vector3(0, 28, 2), $stairsW);
        $this->fill(new Vector3(1, 19, 5), new Vector3(3, 22, 11), BlockIds::SANDSTONE);
        $this->fill(new Vector3(2, 22, 4), new Vector3(2, 24, 2), BlockIds::AIR);
        $this->fill(new Vector3(1, 19, 3), new Vector3(2, 20, 3), BlockIds::SANDSTONE);
        $this->setBlockIdAt(1, 19, 2, BlockIds::SANDSTONE);
        $this->setBlockIdAt(1, 20, 2, BlockIds::SANDSTONE);
        $this->setBlock(new Vector3(2, 19, 2), $stairsE);
        for ($i = 0; $i < 2; ++$i) {
            $this->setBlock(new Vector3(2, 21 + $i, 4 + $i), $stairsN);
        }

        // west tower
        $this->fill(new Vector3(16, 18, 0), new Vector3(20, 27, 4), BlockIds::SANDSTONE, 0);
        $this->fill(new Vector3(17, 28, 1), new Vector3(19, 28, 3), BlockIds::SANDSTONE);
        $this->setBlock(new Vector3(18, 28, 0), $stairsN);
        $this->setBlock(new Vector3(20, 28, 2), $stairsE);
        $this->setBlock(new Vector3(18, 28, 4), $stairsS);
        $this->setBlock(new Vector3(16, 28, 2), $stairsW);
        $this->fill(new Vector3(17, 19, 5), new Vector3(19, 22, 11), BlockIds::SANDSTONE);
        $this->fill(new Vector3(18, 22, 4), new Vector3(18, 24, 4), BlockIds::AIR);
        $this->fill(new Vector3(18, 19, 3), new Vector3(19, 20, 3), BlockIds::SANDSTONE);
        $this->setBlock(new Vector3(19, 19, 2), BlockIds::SANDSTONE);
        //$this->setBlock(new Vector3(19, 20, 2), step.getItemType(), step);
        $this->setBlock(new Vector3(18, 19, 2), $stairsW);
        for ($i = 0; $i < 2; ++$i) {
            $this->setBlock(new Vector3(18, 21 + $i, 4 + $i), $stairsN);
        }

        // tower symbols
        for ($i = 0; $i < 2; ++$i) {
            // front
            $this->fill(new Vector3(1 + $i * 16, 20, 0), new Vector3(1 + $i * 16, 21, 0), BlockIds::SANDSTONE, 2);
            $this->fill(new Vector3(2 + $i * 16, 20, 0), new Vector3(2 + $i * 16, 21, 0), BlockIds::STAINED_CLAY, 1);
            $this->fill(new Vector3(3 + $i * 16, 20, 0), new Vector3(3 + $i * 16, 21, 0), BlockIds::SANDSTONE, 2);
            $this->setBlock(new Vector3(1 + $i * 16, 22, 0), BlockIds::STAINED_CLAY, 1);
            $this->setBlock(new Vector3(2 + $i * 16, 22, 0), BlockIds::SANDSTONE, 1);
            $this->setBlock(new Vector3(3 + $i * 16, 22, 0), BlockIds::STAINED_CLAY, 1);
            $this->setBlock(new Vector3(1 + $i * 16, 23, 0), BlockIds::SANDSTONE, 2);
            $this->setBlock(new Vector3(2 + $i * 16, 23, 0), BlockIds::STAINED_CLAY, 1);
            $this->setBlock(new Vector3(3 + $i * 16, 23, 0), BlockIds::SANDSTONE, 2);
            $this->setBlock(new Vector3(1 + $i * 16, 24, 0), BlockIds::STAINED_CLAY, 1);
            $this->setBlock(new Vector3(2 + $i * 16, 24, 0), BlockIds::SANDSTONE, 1);
            $this->setBlock(new Vector3(3 + $i * 16, 24, 0), BlockIds::STAINED_CLAY, 1);
            $this->fill(new Vector3(1 + $i * 16, 25, 0), new Vector3(3 + $i * 16, 25, 0), BlockIds::STAINED_CLAY, 1);
            $this->fill(new Vector3(1 + $i * 16, 26, 0), new Vector3(3 + $i * 16, 26, 0), BlockIds::SANDSTONE, 2);

            // side
            $this->fill(new Vector3($i * 20, 20, 1), new Vector3($i * 20, 21, 1), BlockIds::SANDSTONE, 2);
            $this->fill(new Vector3($i * 20, 20, 2), new Vector3($i * 20, 21, 2), BlockIds::STAINED_CLAY, 1);
            $this->fill(new Vector3($i * 20, 20, 3), new Vector3($i * 20, 21, 3), BlockIds::SANDSTONE, 2);
            $this->setBlock(new Vector3($i * 20, 22, 1), BlockIds::STAINED_CLAY, 1);
            $this->setBlock(new Vector3($i * 20, 22, 2), BlockIds::SANDSTONE, 1);
            $this->setBlock(new Vector3($i * 20, 22, 3), BlockIds::STAINED_CLAY, 1);
            $this->setBlock(new Vector3($i * 20, 23, 1), BlockIds::SANDSTONE, 2);
            $this->setBlock(new Vector3($i * 20, 23, 2), BlockIds::STAINED_CLAY, 1);
            $this->setBlock(new Vector3($i * 20, 23, 3), BlockIds::SANDSTONE, 2);
            $this->setBlock(new Vector3($i * 20, 24, 1), BlockIds::STAINED_CLAY, 1);
            $this->setBlock(new Vector3($i * 20, 24, 2), BlockIds::SANDSTONE, 1);
            $this->setBlock(new Vector3($i * 20, 24, 3), BlockIds::STAINED_CLAY, 1);
            $this->fill(new Vector3($i * 20, 25, 1), new Vector3($i * 20, 25, 3), BlockIds::STAINED_CLAY, 1);
            $this->fill(new Vector3($i * 20, 26, 1), new Vector3($i * 20, 26, 3), BlockIds::SANDSTONE, 2);
        }

        // front entrance
        $this->fill(new Vector3(8, 18, 1), new Vector3(12, 22, 4), BlockIds::SANDSTONE, BlockIds::AIR);
        $this->fill(new Vector3(9, 19, 0), new Vector3(11, 21, 4), BlockIds::AIR);
        $this->fill(new Vector3(9, 19, 1), new Vector3(9, 20, 1), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(11, 19, 1), new Vector3(11, 20, 1), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(9, 21, 1), new Vector3(11, 21, 1), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(8, 18, 0), new Vector3(8, 21, 0), BlockIds::SANDSTONE);
        $this->fill(new Vector3(12, 18, 0), new Vector3(12, 21, 0), BlockIds::SANDSTONE);
        $this->fill(new Vector3(8, 22, 0), new Vector3(12, 22, 0), BlockIds::SANDSTONE, 2);
        $this->setBlock(new Vector3(8, 23, 0), BlockIds::SANDSTONE, 2);
        $this->setBlock(new Vector3(9, 23, 0), BlockIds::STAINED_CLAY, 1);
        $this->setBlock(new Vector3(10, 23, 0), BlockIds::SANDSTONE, 1);
        $this->setBlock(new Vector3(11, 23, 0), BlockIds::STAINED_CLAY, 1);
        $this->setBlock(new Vector3(12, 23, 0), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(9, 24, 0), new Vector3(11, 24, 0), BlockIds::SANDSTONE, 2);

        // east entrance
        $this->fill(new Vector3(5, 23, 9), new Vector3(5, 25, 11), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(6, 25, 9), new Vector3(6, 25, 11), BlockIds::SANDSTONE);
        $this->fill(new Vector3(5, 23, 10), new Vector3(6, 24, 10), BlockIds::AIR);

        // west entrance
        $this->fill(new Vector3(15, 23, 9), new Vector3(15, 25, 11), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(14, 25, 9), new Vector3(14, 25, 11), BlockIds::SANDSTONE);
        $this->fill(new Vector3(14, 23, 10), new Vector3(15, 24, 10), BlockIds::AIR);

        // corridor to east tower
        $this->fill(new Vector3(4, 19, 1), new Vector3(8, 21, 3), BlockIds::SANDSTONE, BlockIds::AIR);
        $this->fill(new Vector3(4, 19, 2), new Vector3(8, 20, 2), BlockIds::AIR);

        // corridor to west tower
        $this->fill(new Vector3(12, 19, 1), new Vector3(16, 21, 3), BlockIds::SANDSTONE, BlockIds::AIR);
        $this->fill(new Vector3(12, 19, 2), new Vector3(16, 20, 2), BlockIds::AIR);

        // pillars in the middle of 1st floor
        $this->fill(new Vector3(8, 19, 8), new Vector3(8, 21, 8), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(12, 19, 8), new Vector3(12, 21, 8), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(12, 19, 12), new Vector3(12, 21, 12), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(8, 19, 12), new Vector3(8, 21, 12), BlockIds::SANDSTONE, 2);

        // 2nd floor
        $this->fill(new Vector3(5, 22, 5), new Vector3(15, 22, 15), BlockIds::SANDSTONE);
        $this->fill(new Vector3(9, 22, 9), new Vector3(11, 22, 11), BlockIds::AIR);

        // east and west corridors
        $this->fill(new Vector3(3, 19, 5), new Vector3(3, 20, 11), BlockIds::AIR);
        $this->fill(new Vector3(4, 21, 5), new Vector3(4, 21, 16), BlockIds::SANDSTONE);
        $this->fill(new Vector3(17, 19, 5), new Vector3(17, 20, 11), BlockIds::AIR);
        $this->fill(new Vector3(16, 21, 5), new Vector3(16, 21, 16), BlockIds::SANDSTONE);
        $this->fill(new Vector3(2, 19, 12), new Vector3(2, 19, 18), BlockIds::SANDSTONE);
        $this->fill(new Vector3(18, 19, 12), new Vector3(18, 19, 18), BlockIds::SANDSTONE);
        $this->fill(new Vector3(3, 19, 18), new Vector3(18, 19, 18), BlockIds::SANDSTONE);
        for ($i = 0; $i < 7; ++$i) {
            $this->setBlock(new Vector3(4, 19, 5 + $i * 2), BlockIds::SANDSTONE, 2);
            $this->setBlock(new Vector3(4, 20, 5 + $i * 2), BlockIds::SANDSTONE, 1);
            $this->setBlock(new Vector3(16, 19, 5 + $i * 2), BlockIds::SANDSTONE, 2);
            $this->setBlock(new Vector3(16, 20, 5 + $i * 2), BlockIds::SANDSTONE, 1);
        }

        // floor symbols
        $this->setBlock(new Vector3(9, 18, 9), BlockIds::STAINED_CLAY, 1);
        $this->setBlock(new Vector3(11, 18, 9), BlockIds::STAINED_CLAY, 1);
        $this->setBlock(new Vector3(11, 18, 11), BlockIds::STAINED_CLAY, 1);
        $this->setBlock(new Vector3(9, 18, 11), BlockIds::STAINED_CLAY, 1);
        $this->setBlock(new Vector3(10, 18, 10), BlockIds::STAINED_CLAY, 11);
        $this->fill(new Vector3(10, 18, 7), new Vector3(10, 18, 8), BlockIds::STAINED_CLAY, 1);
        $this->fill(new Vector3(12, 18, 10), new Vector3(13, 18, 10), BlockIds::STAINED_CLAY, 1);
        $this->fill(new Vector3(10, 18, 12), new Vector3(10, 18, 13), BlockIds::STAINED_CLAY, 1);
        $this->fill(new Vector3(7, 18, 10), new Vector3(8, 18, 10), BlockIds::STAINED_CLAY, 1);

        // trap chamber
        $this->fill(new Vector3(8, 0, 8), new Vector3(12, 3, 12), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(8, 4, 8), new Vector3(12, 4, 12), BlockIds::SANDSTONE, 1);
        $this->fill(new Vector3(8, 5, 8), new Vector3(12, 5, 12), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(8, 6, 8), new Vector3(12, 13, 12), BlockIds::SANDSTONE);
        $this->fill(new Vector3(9, 3, 9), new Vector3(11, 17, 11), BlockIds::AIR);
        $this->fill(new Vector3(9, 1, 9), new Vector3(11, 1, 11), BlockIds::TNT);
        $this->fill(new Vector3(9, 2, 9), new Vector3(11, 2, 11), BlockIds::SANDSTONE, 2);
        $this->fill(new Vector3(10, 3, 8), new Vector3(10, 4, 8), BlockIds::AIR);
        $this->setBlock(new Vector3(10, 3, 7), BlockIds::SANDSTONE, 2);
        $this->setBlock(new Vector3(10, 4, 7), BlockIds::SANDSTONE, 1);
        $this->fill(new Vector3(12, 3, 10), new Vector3(12, 4, 10), BlockIds::AIR);
        $this->setBlock(new Vector3(13, 3, 10), BlockIds::SANDSTONE, 2);
        $this->setBlock(new Vector3(13, 4, 10), BlockIds::SANDSTONE, 1);
        $this->fill(new Vector3(10, 3, 12), new Vector3(10, 4, 12), BlockIds::AIR);
        $this->setBlock(new Vector3(10, 3, 13), BlockIds::SANDSTONE, 2);
        $this->setBlock(new Vector3(10, 4, 13), BlockIds::SANDSTONE, 1);
        $this->fill(new Vector3(8, 3, 10), new Vector3(8, 4, 10), BlockIds::AIR);
        $this->setBlock(new Vector3(7, 3, 10), BlockIds::SANDSTONE, 2);
        $this->setBlock(new Vector3(7, 4, 10), BlockIds::SANDSTONE, 1);
        $this->setBlock(new Vector3(11, 3, 11), BlockIds::STONE_PRESSURE_PLATE);

        $this->setContainerType(self::DESERT_TEMPLE);
        $this->createRandomItemsContainer(new Vector3(10, 3, 12), Vector3::SIDE_NORTH);
        $this->createRandomItemsContainer(new Vector3(8, 3, 10), Vector3::SIDE_EAST);
        $this->createRandomItemsContainer(new Vector3(10, 3, 8), Vector3::SIDE_SOUTH);
        $this->createRandomItemsContainer(new Vector3(12, 3, 120), Vector3::SIDE_WEST);

        return microtime(true) - $time;
    }
}