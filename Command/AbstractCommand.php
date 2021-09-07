<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Command;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use SmartCore\RadBundle\Command\Util\VerboseCommandUtil;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Component\Stopwatch\StopwatchEvent;

abstract class AbstractCommand extends Command
{
    use ContainerAwareTrait;

    protected EntityManagerInterface $em;
    protected SymfonyStyle $io;
    protected KernelInterface $kernel;
    protected LoggerInterface $logger;
    protected MailerInterface $mailer;
    protected InputInterface $input;
    protected OutputInterface $output;
    protected VerboseCommandUtil $verbose;
    private ProgressBar $progressBar;
    private Stopwatch $stopwatch;

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

        $this->io = new SymfonyStyle($input, $output);

        $this->verbose = new VerboseCommandUtil($this->io, $output);

        $this->stopwatch = new Stopwatch();
        $this->stopwatch->start(__FILE__);
    }

    protected function verboseComment($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->comment($message);
        }
    }

    protected function verboseError($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->error($message);
        }
    }

    protected function verboseText($message): void
    {
        if ($this->output->isVerbose()) {
            $this->io->text($message);
        }
    }

    protected function verboseProgressBarStart(int $totalCount, ?string $totalMessage = 'Всего шагов: '): void
    {
        if ($this->output->isVerbose()) {
            if ($totalMessage) {
                $this->io->text($totalMessage . ' ' . $totalCount);
            }

            $this->progressBar = new ProgressBar($this->output, $totalCount);
            $this->progressBar->setFormat('very_verbose');
            $this->progressBar->start();
        }
    }

    protected function verboseProgressBarAdvance(): void
    {
        if ($this->output->isVerbose()) {
            $this->progressBar->advance();
        }
    }

    protected function verboseProgressBarFinish(): void
    {
        if ($this->output->isVerbose()) {
            $this->progressBar->finish();
        }
    }

    protected function verboseTotalStats()
    {
        if ($this->output->isVerbose()) {
            $event = $this->stopwatch->stop(__FILE__);
            $this->io->comment(sprintf('Time: %.2f sec / Memory: %.2f MB', $event->getDuration() / 1000, $event->getMemory() / (1024 ** 2)));
        }
    }

    protected function getStopwatchEvent(): StopwatchEvent
    {
        return $this->stopwatch->getEvent(__FILE__);
    }

    /**
     * @return float|int
     */
    protected function getStopwatchEventDuration()
    {
        return $this->stopwatch->getEvent(__FILE__)->getDuration();
    }
}
