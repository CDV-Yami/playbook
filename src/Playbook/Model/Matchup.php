<?php

namespace Yami\Playbook\Model;

use Yami\SheetFight\Model\CharacterInterface;

/**
 * Value Object Matchup.
 *
 * Defines a versus between two characters where the focus will be around the "$character"
 */
class Matchup
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
     * @param CharacterInterface $character
     * @param CharacterInterface $opponent
     */
    public function __construct(CharacterInterface $character, CharacterInterface $opponent)
    {
        $this->character = $character;
        $this->opponent = $opponent;
    }

    /**
     * @return CharacterInterface
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * @return CharacterInterface
     */
    public function getOpponent()
    {
        return $this->opponent;
    }

    /**
     * @param Matchup $otherMatchup
     *
     * @return bool
     */
    public function equals(Matchup $otherMatchup)
    {
        return
            $this->character === $otherMatchup->character &&
            $this->opponent === $otherMatchup->opponent
        ;
    }
}
