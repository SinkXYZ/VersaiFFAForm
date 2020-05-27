<?php

namespace Core\usd\Listerns;

use joejoe777777\FormApi\CustomForm;
use joejoe777777\FormApi\SimpleForm;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerExhaustEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerLoginEvent;

class EventListern implements Listener{

    private $main

    public function __construct(Loader $main){
        $this->main = $main;
    }

    public function onDrop(PlayerDropItemEvent $event){
        $event->setCancelled(true);
    }
    public function noFallDamage(EntityDamageEvent $event){
        if($event->getCause() === EntityDamageEvent::CAUSE_FALL)
        $event->setCancelled(true);
    }
    public function onPickUp(InventoryPickupItemEvent $event){
        $event->setCancelled(true);
    }
    public function onLogin(PlayerLoginEvent $event){
        $player = $event->getPlayer();
        $this->onSpawnItems($player); // to do
        $player->teleport($player->getLevel()->getServer()->getDefaultLevel()->getSpawnLocation());
    }

    public function onHunger(PlayerExhaustEvent $event){
        $event->setCancelled(true);
    }
    public function onSpawnItems(Player $player){
        $player->getInventory()->clearAll();
        $player->setFood(20);
        $player->setHealth(20);
        $player->setGamemode(2);
        $player->removeallEffects();
        $player->getInventory()->setItem(0, Item::get(279)->setCustomName("FFA"));
    }

    public function onVersaiForm(PlayerInteractEvent $event){
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();
        if($item->getCustomName() == "FFA"){
            $form = new SimpleForm(function (Player $player, $data));
            if($data === new){
                return true;
                 case 0:
                     $level = Sumo;
                     $player->teleport($player->getLevel()->getServer()->getLevelByName($level)->getSpawnLocation());
                     $this->Nodebuff($player);
                     $player->sendMessage("WHOOOP YOU WENT TO VERSAI SUMO");
            }

        });#
        $form->setTitle("FFA MODES");
        $form->addButton("Nodebuff", 0, "textures/items/diamond_sword");
        $player->sendForm($form);
        }

        public function Sumo(Player $player){
            {
                $player->getArmourInvertory()->clearAll();
                $player->getInveroty()->clearAll();
                $player->getInvertoy()->addItem(Item::get(Item::COOKED_BEEF, 0, 16));
            }
        }
}