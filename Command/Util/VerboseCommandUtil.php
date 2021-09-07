<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Command\Util;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class VerboseCommandUtil
{
    protected SymfonyStyle $io;
    protected OutputInterface $output;

    public function __construct(SymfonyStyle $io, OutputInterface $output)
    {
        $this->io = $io;
        $this->output = $output;
    }

    public function text($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->text($message);
        }
    }

    public function comment($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->comment($message);
        }
    }

    public function error($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->error($message);
        }
    }

    public function success($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->success($message);
        }
    }

    public function warning($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->warning($message);
        }
    }

    public function note($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->note($message);
        }
    }

    public function info($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->info($message);
        }
    }

    public function caution($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->caution($message);
        }
    }
}
