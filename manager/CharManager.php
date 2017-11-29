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
    }

    public function update(Character $character)
    {
    }

    public function create(Character $character)
    {
    }
}
