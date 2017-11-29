<?php


class Magician extends Character
{

    /**
     * @var int
     */
    private $mana;

    /**
     * @var int
     */
    private $magic;

    public function __construct(array $magician)
    {
        // [
        //    "type"=> "Magician",
        //    "name" => "Caster",
        //    "life" => "120",
        //    "strength" => "3",
        //    "dodge" => "",
        //    "magic" => "8"
        // ]

        $this->hydrate($magician);
        parent::__construct($magician);
    }

    public function hit(Character $char)
    {
        $char->takeDamage($this->magic);
    }

    /**
     * @return int
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     *
     * @return Magician
     */
    public function setMana($mana)
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * @return int
     */
    public function getMagic()
    {
        return $this->magic;
    }

    /**
     * @param int $magic
     *
     * @return Magician
     */
    public function setMagic($magic)
    {
        $this->magic = $magic;

        return $this;
    }
}
