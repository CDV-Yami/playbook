<?php

namespace Yami\AppBundle\Doctrine\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type as AbstractType;
use Yami\AppBundle\Entity\Input;

/**
 * Inputs type used to serialize & unserialize a sequence of input.
 *
 * The input should never contains a "|".
 */
class Inputs extends AbstractType
{
    const INPUTS = 'inputs';

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getClobTypeDeclarationSQL($fieldDeclaration);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($inputs, AbstractPlatform $platform)
    {
        if (!$inputs || empty($inputs)) {
            return;
        }

        $flat = [];
        foreach ($inputs as $input) {
            $flat[] = $input->getValue();
        }

        return implode('|', $flat);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($serialized, AbstractPlatform $platform)
    {
        if ($serialized === null) {
            return [];
        }

        $serialized = (is_resource($serialized)) ? stream_get_contents($serialized) : $serialized;

        $flat = explode('|', $serialized);
        $inputs = [];
        foreach ($flat as $value) {
            $inputs[] = new Input($value);
        }

        return $inputs;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::INPUTS;
    }

    /**
     * {@inheritdoc}
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}
