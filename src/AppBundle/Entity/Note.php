<?php

namespace Yami\AppBundle\Entity;

use Yami\Playbook\Model\Matchup;
use Yami\Playbook\Model\Note as BaseNote;

class Note extends BaseNote
{
    /**
     * @var int
     */
    private $id;

    /**
     * @param Matchup $matchup
     * @param string  $details
     */
    public function __construct(Matchup $matchup, $details)
    {
        parent::__construct($matchup, $details);
    }
}
