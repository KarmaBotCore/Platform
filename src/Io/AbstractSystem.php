<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Io;

use Karma\Platform\Support\IdentityMap;
use Karma\Platform\Support\Loggable;
use Psr\Log\LoggerInterface;
use React\EventLoop\LoopInterface;
use Karma\Platform\Support\LoggableInterface;

/**
 * Class AbstractSystem
 * @package Karma\Platform\Io
 */
abstract class AbstractSystem implements SystemInterface, LoggableInterface
{
    use Loggable;
    use IdentityMap;

    /**
     * @var LoopInterface
     */
    protected $loop;

    /**
     * @param LoopInterface $loop
     * @param null|LoggerInterface $logger
     */
    public function onRegister(LoopInterface $loop, ?LoggerInterface $logger): void
    {
        $this->loop = $loop;
        $this->logger = $logger;
    }

    /**
     * @param string $id
     * @param \Closure $then
     * @return ChannelInterface
     */
    public function getChannel(string $id, \Closure $then): ChannelInterface
    {
        return $this->fetch(ChannelInterface::class, $id, $then);
    }

    /**
     * @param string $id
     * @param \Closure $then
     * @return UserInterface
     */
    public function getUser(string $id, \Closure $then): UserInterface
    {
        return $this->fetch(UserInterface::class, $id, $then);
    }
}
