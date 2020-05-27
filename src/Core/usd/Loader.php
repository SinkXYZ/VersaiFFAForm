<?php

namespace Core\usd;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase implements Listener{

    public function onEnable(){
        $this->Worlds();
        $this->Commands();
        $this->Listerns():
    }
    public function Worlds(){
        $this->getServer()->loadLevel("Nodebuff");
        $this->getServer()->loadLevel("Gappel");
        $this->getServer()->loadLevel("Fist");
        $this->getServer()->loadLevel("Combo");
    }
    public function Commands(){
        // to do
    }
    public function Listerns(){
        //to do
    }
}