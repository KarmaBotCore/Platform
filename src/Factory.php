<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace KarmaBot\Platform;

use Psr\Log\LoggerInterface;
use React\EventLoop\LoopInterface;
use React\EventLoop\Factory as EventLoop;
use KarmaBot\Platform\Io\SystemInterface;

/**
 * Class Factory
 * @package KarmaBot\Platform
 */
class Factory
{
    /**
     * @var LoopInterface
     */
    private $loop;

    /**
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * Factory constructor.
     * @param LoopInterface|null $loop
     * @param LoggerInterface|null $logger
     */
    public function __construct(LoopInterface $loop = null, LoggerInterface $logger = null)
    {
        $this->loop = $loop ?? EventLoop::create();
        $this->logger = $logger;
    }

    /**
     * @param string $system
     * @param array $config
     * @return SystemInterface
     */
    public function create(string $system, array $config): SystemInterface
    {
        return new $system($config, $this->loop, $this->logger);
    }

    /**
     * @return LoopInterface
     */
    public function getEventLoop(): LoopInterface
    {
        return $this->loop;
    }
}
