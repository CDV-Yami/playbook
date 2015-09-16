<?php

namespace Yami\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Yami\SheetFight\Model\CharacterInterface;
use Yami\SheetFight\Model\FrameDataInterface;
use Yami\SheetFight\Model\Move as BaseMove;

class Move extends BaseMove
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \Yami\SheetFight\Model\CharacterInterface
     */
    private $character;

    /**
     * @var FrameDataInterface
     */
    private $frameData;

    /**
     * @var ArrayCollection
     */
    private $cancelAbilities;

    public function __construct(
        CharacterInterface $character,
        $type,
        $name,
        $initialPosition,
        $inputs,
        $damage,
        $meterGain,
        $hitLevel,
        $cancelAbilities,
        $startup,
        $active,
        $recovery,
        $guardAdvantage,
        $hitAdvantage
    ) {
        $this->character = $character;
        $this->cancelAbilities = new ArrayCollection($cancelAbilities);
        $this->frameData = new FrameData($this, $startup, $active, $recovery, $guardAdvantage, $hitAdvantage);
        parent::__construct($type, $name, $initialPosition, $inputs, $damage, $meterGain, $hitLevel, $this->cancelAbilities, $this->frameData);
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
    public function getCancelAbilities()
    {
        return $this->cancelAbilities;
    }

    /**
     * @return FrameDataInterface
     */
    public function getFrameData()
    {
        return $this->frameData;
    }
}
