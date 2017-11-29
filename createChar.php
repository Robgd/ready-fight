<?php

require 'includes.php';

if (!empty($_POST)) {

    // [
    //    "type"=> "Magician",
    //    "name" => "Caster",
    //    "life" => "120",
    //    "strength" => "3",
    //    "dodge" => "",
    //    "magic" => "8"
    // ]

    switch ($_POST['type']) {
        case 'Magician':
            $character = new Magician($_POST);
            break;
        case 'Assassin':
            $character = new Assassin($_POST);
            break;
        case 'Warrior':
            $character = new Warrior($_POST);
            break;
        default:
            echo "I'm no one";
    }

    $charManager = new CharManager($con);
    $charManager->create($character);
}
?>


<form action="#" method="post">
    <select name="type" id="type">
        <option value="Magician">Magician</option>
        <option value="Assassin">Assassin</option>
        <option value="Warrior">Warrior</option>
    </select><br>

    <input type="text" name="name" id="name" placeholder="Name"><br>
    <input type="text" name="life" id="life" placeholder="Life"><br>
    <input type="text" name="strength" id="strength" placeholder="Strength"><br>
    <input type="text" name="dodge" id="dodge" placeholder="Dodge"><br>
    <input type="text" name="magic" id="magic" placeholder="Magic"><br>
    <input type="text" name="critic" id="critic" placeholder="Critic"><br>

    <input type="submit" value="Create">
</form>
