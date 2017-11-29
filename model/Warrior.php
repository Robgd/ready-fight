<?php


class Warrior extends Character
{
    /**
     * @var int
     */
    private $critic;

    public function __construct(array $warrior)
    {
        $this->hydrate($warrior);
        parent::__construct($warrior);
    }

    public function hit(Character $char)
    {
        $damage = rand(0, 100) > $this->getCritic()
            ? $this->getStrength()
            : $this->getStrength() * 2;

//        if (rand(0, 100) > $this->getCritic()) {
//            $damage = $this->getStrength();
//        } else {
//            $damage = $this->getStrength() * 2;
//        }

        $char->takeDamage($damage);
    }

    /**
     * @return int
     */
    public function getCritic(): int
    {
        return $this->critic;
    }

    /**
     * @param int $critic
     *
     * @return Warrior
     */
    public function setCritic(int $critic)
    {
        $this->critic = $critic;

        return $this;
    }
}
