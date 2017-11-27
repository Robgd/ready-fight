<?php


class Character
{
    const XP = 1;
    const LEVEL = 1;
    const DIED = false;

    /**
     * @var bool
     */
    protected $died;

    /**
     * @var int
     */
    protected $life;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $strength;
    /**
     * @var int
     */
    protected $experience;
    /**
     * @var int
     */
    protected $level;

    /**
     * @param array $character
     */
    public function __construct(array $character)
    {
        $this->experience = self::XP;
        $this->level = self::LEVEL;
        $this->died = self::DIED;
        $this->hydrate($character);
    }

    public function hydrate(array $character)
    {
        foreach ($character as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function hit(Character $char)
    {
        $char->takeDamage($this->strength);
    }

    public function takeDamage(int $damage)
    {
        $this->life = $this->life - $damage;
        $this->died = $this->life <= 0;
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
