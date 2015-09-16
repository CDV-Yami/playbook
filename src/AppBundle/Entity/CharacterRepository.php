<?php

namespace Yami\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

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

    public function findOneWithMoves($name)
    {
        $characters = $this->createQueryBuilder('c')
            ->select('c', 'm', 'f', 'ca', 'caf')
            ->where('c.name = :name')
            ->leftJoin('c.moves', 'm')
            ->leftJoin('m.frameData', 'f')
            ->leftJoin('m.cancelAbilities', 'ca')
            ->leftJoin('ca.frameData', 'caf')
            ->setParameter('name', $name)
            ->getQuery()
            ->execute()
        ;

        if (empty($characters) || null === $characters) {
            return;
        }

        if (count($characters) > 1) {
            throw new NonUniqueResultException();
        }

        return $characters[0];
    }
}
