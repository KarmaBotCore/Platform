<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform;

use Psr\Log\LoggerInterface;
use React\EventLoop\LoopInterface;
use React\EventLoop\Factory as EventLoop;
use Karma\Platform\Io\SystemInterface;

/**
 * Class Manager
 * @package Karma\Platform
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
     * @param SystemInterface $system
     * @param null|string $alias
     * @return Manager
     */
    public function register(SystemInterface $system, ?string $alias = null): Manager
    {
        if ($alias !== null) {
            $this->systems[$alias] = $system;
        }

        if (!isset($this->systems[$system->getName()])) {
            $this->systems[$system->getName()] = $system;
        }

        if (!isset($this->systems[get_class($system)])) {
            $this->systems[get_class($system)] = $system;
        }

        $system->onRegister($this->loop, $this->logger);

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
