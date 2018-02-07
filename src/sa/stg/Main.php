<?php
namespace ServerTransgerGui;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use muqsit\invmenu\InvMenu;
class Main{
    @var InvMenu
    private $menu;
    public function __construct(string $name){
        $menu->setName("-=ShatteredAtom Network=-");
        $this->menu = InvMenu::create(InvMenu::TYPE_CHEST);
        $this->menu->readonly();
        $this->menu->setName($name);
        $this->menu->setListener([$this, "onServerSelectorTransaction"]);
        $this->menu->onInventoryClose(function(Player $player) : void{
                $player->sendMessage(TextFormat::GREEN."You are being transferred...");
            });
    }
    public function addServerToList(Item $item, string $address, int $port) : void{
        $nbt = $item->getNamedTag();
        $nbt->setByte("Server", $address.":".$port);
        $item->setNamedTagEntry($nbt->getByte("Server"));
        $this->menu->addItem($item);
    }
    public function onServerSelectorTransaction(Player $player, Item $itemClickedOn) : bool{
        $player->transfer(...explode(":", $itemClickedOn->getNamedTag()->getString("Factions", "mysticraid.tk:19132")));
        return true;
    }
    public function sendTo(Player $player) : void{
        $this->menu->send($player);
    }

$selector = new ("Server Selector");
$selector->addServerToList(Item::get(Item::DIAMOND_SWORD), "mysticraid.tk", 19132);
$selector->addServerToList(Item::get(Item::IRON), "nitronetwork.ddns.net", 19132);
@var Player 
private $player;
$selector->sendTo($player);
}
