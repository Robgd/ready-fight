<?php


class Assassin extends Character
{
    /**
     * @var int
     */
    private $dodge;

    public function __construct(array $assassin)
    {
        $this->hydrate($assassin);
        parent::__construct($assassin);
    }

    /**
     * @return int
     */
    public function getDodge(): int
    {
        return $this->dodge;
    }

    /**
     * @param int $dodge
     *
     * @return Assassin
     */
    public function setDodge(int $dodge)
    {
        $this->dodge = $dodge;

        return $this;
    }
}
