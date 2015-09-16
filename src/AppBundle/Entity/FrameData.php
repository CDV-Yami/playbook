<?php

namespace Yami\AppBundle\Entity;

use Yami\SheetFight\Model\FrameData as BaseFrameData;

class FrameData extends BaseFrameData
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \Yami\AppBundle\Entity\Move
     */
    private $move;

    public function __construct(Move $move, $startup, $active, $recovery, $guardAdvantage, $hitAdvantage)
    {
        $this->move = $move;
        parent::__construct($startup, $active, $recovery, $guardAdvantage, $hitAdvantage);
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }
}
