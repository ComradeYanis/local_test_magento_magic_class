<?php
declare(strict_types=1);

namespace Elogic\MagentoFramework\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Elogic\MagentoFramework\Helper\ConsoleMagic;

/**
 *
 */
class MagicText extends Command
{

    private ConsoleMagic $console;

    /**
     * @param null $name
     */
    public function __construct(
        ConsoleMagic $console,
        $name = null
    ) {
        parent::__construct($name);
        $this->console = $console;
    }

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('elogic:magic')
            ->setDescription('Start subscriber for pubsub');
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     * @throws \Magento\Framework\Exception\FileSystemException
     * @throws \Magento\Framework\Exception\RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write($this->console::magicProperty);
    }
}
