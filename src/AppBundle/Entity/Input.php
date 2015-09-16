<?php

namespace Yami\AppBundle\Entity;

use Yami\SheetFight\Model\Input as BaseInput;

class Input extends BaseInput
{
    /**
     * @var int
     */
    private $id;

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }
}
