<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class HtmlTransformer implements DataTransformerInterface
{
    protected bool $is_reverse;

    public function __construct($is_reverse = false)
    {
        $this->is_reverse = $is_reverse;
    }

    public function transform($value)
    {
        return htmlentities($value);
    }

    public function reverseTransform($value)
    {
        return $this->is_reverse ? htmlspecialchars($value) : $value;
    }
}
