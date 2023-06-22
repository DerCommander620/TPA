<?php
namespace TPA;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;
use TPA\Commands\TPACommand;

class Main extends PluginBase{
    use SingletonTrait;
    const use_ingame = "§cPlease use it In-Game";

    public function onEnable(): void{
        $this->getServer()->getCommandMap()->registerAll($this->getName(), $this [
            new TPACommand()
        ]);
    }
}