<?php

namespace Yami\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Yami\SheetFight\Model\Character as BaseCharacter;

class Character extends BaseCharacter
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $moves;

    public function __construct($name, $health, $moves)
    {
        $this->moves = new ArrayCollection($moves);
        parent::__construct($name, $health, $this->moves);
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getMoves()
    {
        return $this->moves;
    }
}
