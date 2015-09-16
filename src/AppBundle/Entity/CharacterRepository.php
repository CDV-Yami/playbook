<?php

namespace Yami\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CharacterRepository extends EntityRepository
{
    public function findAllWithMoves()
    {
        return $this->createQueryBuilder('c')
            ->select('c', 'm')
            ->leftJoin('c.moves', 'm')
            ->getQuery()
            ->execute()
        ;
    }
}
