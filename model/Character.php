<?php


class Characters
{
    const LEVEL = 1;
    const XP = 0;
    const DIED = false;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $strength;

    /**
     * @var int
     */
    private $life;

    /**
     * @var int
     */
    private $experience;

    /**
     * @var int
     */
    private $level;

    /**
     * @var bool
     */
    private $died;

    public function __construct(array $char)
    {
        $this->experience = self::XP;
        $this->level = self::LEVEL;
        $this->died = self::DIED;

        $this->hydrate($char);
    }

    public function hit(Character $char)
    {
        $damage = 1;
        $char->getDamage($damage);
    }

    public function getDamage($damage)
    {
        $this->life = $this->life - $damage;
        if ($this->life <= 0) {
            $this->setDied(true);
        }
    }

    public function hydrate(array $char)
    {
        foreach ($char as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Character
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     *
     * @return Character
     */
    public function setStrength(int $strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * @return int
     */
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * @param int $life
     *
     * @return Character
     */
    public function setLife(int $life)
    {
        $this->life = $life;

        return $this;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     *
     * @return Character
     */
    public function setLevel(int $level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return int
     */
    public function getExperience(): int
    {
        return $this->experience;
    }

    /**
     * @param int $experience
     *
     * @return Character
     */
    public function setExperience(int $experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDied(): bool
    {
        return $this->died;
    }

    /**
     * @param bool $died
     *
     * @return Character
     */
    public function setDied(bool $died)
    {
        $this->died = $died;

        return $this;
    }
}
