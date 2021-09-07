<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class JsonDecodeExtension extends AbstractExtension
{
    public function getName(): string
    {
        return 'twig.json_decode';
    }

    /**
     * Returns a list of filters to add to the existing list.
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('json_decode', [$this, 'jsonDecode']),
        ];
    }

    /**
     * Returns a list of functions to add to the existing list.
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('json_decode', [$this, 'jsonDecode']),
        ];
    }

    /**
     * @return mixed
     */
    public function jsonDecode(string $string, bool $assoc = false, int $depth = 512, int $options = 0)
    {
        return json_decode($string, $assoc, $depth, $options);
    }
}
