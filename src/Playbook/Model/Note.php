<?php

namespace Yami\Playbook\Model;

class Note
{
    /**
     * @var \Yami\SheetFight\Model\CharacterInterface
     */
    private $character;

    /**
     * @var \Yami\SheetFight\Model\CharacterInterface
     */
    private $opponent;

    /**
     * @var string
     */
    private $details;

    /**
     * @param Matchup $matchup
     * @param string  $details
     */
    public function __construct(Matchup $matchup, $details)
    {
        $this->character = $matchup->getCharacter();
        $this->opponent = $matchup->getOpponent();
        $this->details = $details;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }
}
