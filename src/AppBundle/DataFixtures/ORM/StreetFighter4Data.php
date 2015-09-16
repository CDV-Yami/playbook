<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Yami\AppBundle\Entity;
use Yami\SheetFight\Model;

class StreetFighter4Data implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ken = new Entity\Character('Ken', 90, []);
        $manager->persist($ken);

        $ryu = new Entity\Character('Ryu', 90, []);
        $manager->persist($ryu);

        $hadoken = new Entity\Move(
            $ryu,
            Model\MoveInterface::TYPE_SPECIAL,
            'Hadoken',
            'standing',
            [new Model\Input('2'), new Model\Input('3'), new Model\Input('6'), new Model\Input('P')],
            10,
            10,
            'mid',
            [],
            1,
            2,
            3,
            4,
            5
        );
        $manager->persist($hadoken);

        $shoryuken = new Entity\Move(
            $ken,
            Model\MoveInterface::TYPE_SPECIAL,
            'Shoryuken',
            'standing',
            [new Model\Input('6'), new Model\Input('2'), new Model\Input('3'), new Model\Input('P')],
            10,
            10,
            'mid',
            [],
            1,
            2,
            3,
            4,
            5
        );
        $manager->persist($shoryuken);

        $tigerShot = new Entity\Move(
            $ryu,
            Model\MoveInterface::TYPE_SPECIAL,
            'Tiger Shot',
            'standing',
            [new Model\Input('2'), new Model\Input('3'), new Model\Input('6'), new Model\Input('K')],
            10,
            10,
            'mid',
            [$shoryuken, $hadoken],
            1,
            2,
            3,
            4,
            5
        );
        $manager->persist($tigerShot);

        $manager->flush();
    }
}
