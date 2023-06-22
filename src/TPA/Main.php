<?php
namespace TPA;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if($command->getName() === "tpa"){
        if($sender instanceof Player){
            if(empty($args[0])){
                $sender->sendMessage("§cPlease enter a Player name or type /tpa help!");
            }else{
                $player = $args([0])->getPlayerExact();
                if(!$player){
                    $sender->sendMessage("§cThis Player is not Online!");
                }else{
                    $player->sendMessage("§e" . $sender->getName() . " §ahas send you a TPA request!");
                    $sender->sendMessage("§aYou have successfully send a TPA request to §e" . $player);
                }
            }
            switch(strtolower($args[0])){
                case "help":
                    $sender->sendMessage("§aHelp §7| §eTPA \n§f- §c/tpa help \n§f- §c/tpa accept <playername> \n§f- §c/tpa decline <playername>");
                    break;
                case "accept":
                    $player = $args([1]);
                    if(empty($player)){
                        $sender->sendMessage("§cPlease enter a PlayerName who you want to accept his tpa request!");
                    }
                    if(!$player){
                        $sender->sendMessage("§c " . $player . "Is not Online!");
                    }else{
                        $player->sendMessage($sender->getName() . " §aSuccessfully accepted your TPA request");
                        $sender->sendMessage("§aYou have sucessfully accepted §e" . $player . "´s TPA request!");
                        $sender->teleport($player->getWorld(), $player->getPosition());
                    }
                    break;
                case "decline":
                    $player = $args([1]);
                    if(empty($player)){
                        $sender->sendMessage("Please enter the PlayerName that send you a tpa request you want to delete!");
                    }
                    if(!$player){
                        $sender->sendMessage("§cSorry but this Player is not Online!");
                    }else{
                        $sender->sendMessage("§aYou successfully declined §b" . $player . "´s TPA request");
                        $player->sendMessage("§b" . $sender->getName() . " §cDenied your TPA request");
                    }
                    break;            
            }
        }else{
            $sender->sendMessage("§cPlease use it In-Game");
        }
        }
    return true;    
    }    
}
