<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class BooleanToStringTransformer implements DataTransformerInterface
{
    public function transform($value): bool
    {
        return empty($value) ? false : true;
    }

    public function reverseTransform($value): string
    {
        return empty($value) ? '0' : '1';
    }
}
