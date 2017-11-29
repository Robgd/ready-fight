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
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     *
     * @return Magician
     */
    public function setMana(int $mana)
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * @return int
     */
    public function getMagic(): int
    {
        return $this->magic;
    }

    /**
     * @param int $magic
     *
     * @return Magician
     */
    public function setMagic(int $magic)
    {
        $this->magic = $magic;

        return $this;
    }
}
