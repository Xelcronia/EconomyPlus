<?php
namespace EconomyPlus\Commands;

use EconomyPlus\BaseFiles\BaseCommand;
use EconomyPlus\EconomyPlus;
use pocketmine\Player;
use pocketmine\command\CommandSender;

use pocketmine\utils\TextFormat as C;

use EconomyPlus\EconomyPlayer;

/* Copyright (C) ImagicalGamer - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Jake C <imagicalgamer@outlook.com>, September 2016
 */

class TakeMoneyCommand extends BaseCommand{

    private $plugin;

    public function __construct(EconomyPlus $plugin){
        parent::__construct("takemoney", $plugin);
        $this->plugin = $plugin;
        $this->setUsage(C::RED . "/takemoney <player> <amount>");
        $this->setDescription("Take money from a player!");
    }

    public function execute(CommandSender $sender, $commandLabel, array $args) {
        if(!$sender->isOp()){
            $sender->sendMessage(C::RED . $this->plugin->translate("INVALID-PERMISSION"));
            return;
        }
        if(!count($args) == 2){
            $sender->sendMessage(C::RED . "Usage: /takemoney <player> <amount>");
            return;
        }
        if(!is_numeric($args[1])){
            $sender->sendMessage(C::RED . $this->plugin->translate("INVALID-AMOUNT"));
            return;
        }
        $player = new EconomyPlayer($this->plugin, $args[0]);
        if($player->subtractMoney($args[1]) == true){
        $sender->sendMessage(C::GREEN . "Taken $" . C::YELLOW . $args[1] . C::GREEN . " from " . C::YELLOW . $args[0]);
        return true;
        }
    }
}
