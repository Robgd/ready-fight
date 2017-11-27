<?php

require 'Character.php';
require 'Magician.php';
require 'Assassin.php';


$assassin = new Assassin([
    'dodge' => 20,
    'life' => 100,
    'name' => 'Ezio',
    'strength' => 5,
]);

$magician = new Magician([
    'life' => 130,
    'name' => 'Caster',
    'strength' => 2,
    'magic' => 10
]);

var_dump($magician);

while (!$assassin->isDied() && !$magician->isDied()) {
    $assassin->hit($magician);
    $magician->hit($assassin);
}

$winner = $assassin->isDied() ? $magician : $assassin;
echo 'Winner is '.$winner->getName();
