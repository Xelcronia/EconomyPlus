<?php
namespace EconomyPlus\API;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\plugin\Plugin;

use EconomyPlus\Main;
use EconomyPlus\EconomyPlayer;

/* Copyright (C) ImagicalGamer - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Jake C <imagicalgamer@outlook.com>, September 2016
 */

class EconomyPlusAPI extends PluginBase{

  public function __construct(Main $plugin)
  {
    $this->plugin = $plugin;
  }

  public function getMoney($player)
  {
    if($player instanceof Player)
    {
      $player = new EconomyPlayer($this->plugin, $player->getName());
      return $player->getMoney();
    }
    else if(is_string($player))
    {
      $player = new EconomyPlayer($this->plugin, $player);
      return $player->getMoney();
    }
    else if($player instanceof EconomyPlayer)
    {
      return $player->getMoney();
    }
  }

  public function setMoney($player, int $money)
  {
    if($player instanceof Player)
    {
      $player = new EconomyPlayer($this->plugin, $player->getName());
      return $player->setMoney($money);
    }
    else if($player instanceof String)
    {
      $player = new EconomyPlayer($this->plugin, $player);
      return $player->setMoney($money);
    }
    else if($player instanceof EconomyPlayer)
    {
      return $player->setMoney($money);
    }
  }

  public function reduceMoney($player, int $amount)
  {
    if($player instanceof Player)
    {
      $player = new EconomyPlayer($this->plugin, $player->getName());
      return $player->subtractMoney($amount);
    }
    else if(is_string($player))
    {
      $player = new EconomyPlayer($this->plugin, $player);
      return $player->subtractMoney($amount);
    }
    else if($player instanceof EconomyPlayer)
    {
      return $player->subtractMoney($amount);
    }
  }

  public function addMoney($player, int $amount)
  {
    if($player instanceof Player)
    {
      $player = new EconomyPlayer($this->player, $player->getName());
      return $player->addMoney($amount);
    }
    else if(is_string($player))
    {
      $player = new EconomyPlayer($this->player, $player);
      return $player->addMoney($amount);
    }
    else if($player instanceof EconomyPlayer)
    {
      return $player->addMoney($amount);
    }
  }
}
