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
 * Class Manager
 * @package KarmaBot\Platform
 */
class Manager
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
     * @var array|SystemInterface[]
     */
    private $systems = [];

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
     * @return Manager
     */
    public function register(string $system, array $config): Manager
    {
        $this->systems[$system] = new $system($config, $this->loop, $this->logger);

        return $this;
    }

    /**
     * @param string $system
     * @return SystemInterface
     */
    public function get(string $system): SystemInterface
    {
        return $this->systems[$system];
    }

    /**
     * @return LoopInterface
     */
    public function getEventLoop(): LoopInterface
    {
        return $this->loop;
    }

    /**
     * @return void
     */
    public function connect(): void
    {
        $this->loop->run();
    }
}
