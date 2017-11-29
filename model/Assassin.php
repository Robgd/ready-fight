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

    public function takeDamage(int $damage)
    {
        if (rand(0, 100) > $this->getDodge()) {
            $this->life = $this->life - $damage;
            $this->died = $this->life <= 0;
        }
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
