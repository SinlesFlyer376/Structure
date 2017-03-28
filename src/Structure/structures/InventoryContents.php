<?php
namespace Structure\structures;

use pocketmine\item\Item;

class InventoryContents implements Type{

    /**
    * Thanks to @dktapps for the data.
    *
    * https://github.com/dktapps/mcpe-default-addon
    */

    private static function desertTemple() : array
    {
        $items = [
            Item::get(Item::DIAMOND, 0, mt_rand(1, 3)),
            Item::get(Item::IRON_INGOT, 0, mt_rand(1, 5)),
            Item::get(Item::GOLD_INGOT, 0, mt_rand(2, 7)),
            Item::get(Item::EMERALD, 0, mt_rand(1, 3)),
            Item::get(Item::BONE, 0, mt_rand(4, 6)),
            Item::get(Item::SPIDER_EYE, 0, mt_rand(1, 3)),
            Item::get(Item::ROTTEN_FLESH, 0, mt_rand(3, 7)),
            Item::get(Item::SADDLE, 0, 1),
            Item::get(417, 0, 1),
            Item::get(418, 0, 1),
            Item::get(419, 0, 1),
            Item::get(Item::GOLDEN_APPLE, 0, 1),
            Item::get(Item::GUNPOWDER, 0, mt_rand(1, 8)),
            Item::get(Item::STRING, 0, mt_rand(1, 8)),
            Item::get(Item::SAND, 0, mt_rand(1, 8))
        ];
        shuffle($items);
        return $items;
    }

    public static function getContents(int $type) : array
    {
        switch ($type) {
            case self::DESERT_TEMPLE:
                return array_chunk(self::desertTemple(), mt_rand(2, 4))[0];
            default:
                return [];
        }
    }
}