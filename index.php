<?php

require 'includes.php';

$charManager = new CharManager($con);

$characters = $charManager->getAll();

foreach ($characters as $character) {
    echo $character->getName().' is a '.get_class($character);
}




































/*$caster = new Magician([
    'name' => 'Caster',
    'strength' => 20,
    ''
]);

$berseker = new Warrior([
    'name' => 'Berseker'
]);

$assassin = new Assassin([
    'name' => 'Desmond'
]);*/

