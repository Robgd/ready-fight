<?php


class CharManager
{
    /**
     * @var PDO
     */
    private $con;

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    public function get(int $id)
    {
        $stmt = $this->con->prepare("SELECT * FROM player WHERE id = :id");
        $stmt->execute([
            ':id' => $id
        ]);

        $character = $stmt->fetch(PDO::FETCH_ASSOC);

        $class = ucfirst($character['type']);

        return new $class($character);
    }

    /**
     * @return Assassin[]|Magician[]|Assassin[]
     */
    public function getAll()
    {
        $stmt = $this->con->prepare("SELECT * FROM player");
        $stmt->execute();

        $charactersArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $charactersObj = [];
        foreach ($charactersArray as $characterArray) {
            $class = ucfirst($characterArray['type']);

            $charactersObj[] = new $class($characterArray);
        }

        return $charactersObj;
    }

    /**
     * @param Character|Magician|Assassin|Warrior $character
     */
    public function update(Character $character)
    {
        $type = get_class($character);
        $stmt = $this->con->prepare("UPDATE player SET type = :type, name = :name, life = :life, experience = :experience, level = :level, strength = :strength, died = :died, critic = :critic, magic = :magic, mana = :mana, dodge = :dodge WHERE id = :id");
        $params = [
            ':id' => $character->getId(),
            ':name' => $character->getName(),
            ':type' => get_class($character),
            ':life' => $character->getLife(),
            ':strength' => $character->getStrength(),
            ':died' => 0,
            ':experience' => $character->getExperience(),
            ':level' => $character->getLevel(),
            ':dodge' => 0,
            ':critic' => 0,
            ':magic' => 0,
            ':mana' => 0,
        ];

        if ($type === 'Magician') {
            $params[':magic'] = $character->getMagic();
            $params[':mana'] = $character->getMana();
        }

        if ($type === 'Assassin') {
            $params[':dodge'] = $character->getDodge();
        }

        if ($type === 'Warrior') {
            $params[':critic'] = $character->getCritic();
        }
    }

    /**
     * @param Character|Magician|Assassin|Warrior $character
     */
    public function create(Character $character)
    {
        $type = get_class($character);
        $stmt = $this->con->prepare("INSERT INTO player (`id`, `type`, `name`, `life`, `experience`, `level`, `strength`, `died`, `critic`, `magic`, `mana`, `dodge`) VALUES (NULL, :type, :name, :life, :experience, :level, :strength, :died, :critic, :magic, :mana, :dodge)");
        $params = [
            ':name' => $character->getName(),
            ':type' => $type,
            ':life' => $character->getLife(),
            ':strength' => $character->getStrength(),
            ':died' => 0,
            ':experience' => $character->getExperience(),
            ':level' => $character->getLevel(),
            ':dodge' => 0,
            ':critic' => 0,
            ':magic' => 0,
            ':mana' => 0,
        ];

        if ($type === 'Magician') {
            $params[':magic'] = $character->getMagic();
            $params[':mana'] = $character->getMana();
        }

        if ($type === 'Assassin') {
            $params[':dodge'] = $character->getDodge();
        }

        if ($type === 'Warrior') {
            $params[':critic'] = $character->getCritic();
        }

        $stmt->execute($params);
    }
}
