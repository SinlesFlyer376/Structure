<?php
namespace Structure;

use pocketmine\command\{Command, CommandSender};
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use Structure\structures\DesertTemple;

class Structure extends PluginBase{

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        if (isset($args[0])) {
            switch (strtolower($args[0])) {
                case "deserttemple":
                    $desertTemple = new DesertTemple($sender->getPosition());
                    $sender->sendMessage("Generated desert temple in: ".$desertTemple->generate()."s.");
                    break;
                default:
                    $sender->sendMessage(TF::RED.'This structure does not exist.');
                    return false;
            }
        }
        return true;
    }
}