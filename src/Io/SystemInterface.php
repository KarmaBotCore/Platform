<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Io;

use Psr\Log\LoggerInterface;
use React\EventLoop\LoopInterface;

/**
 * Interface SystemInterface
 * @package Karma\Platform\Io
 */
interface SystemInterface
{
    /***
     * @param LoopInterface $loop
     * @param null|LoggerInterface $logger
     * @return void
     */
    public function onRegister(LoopInterface $loop, ?LoggerInterface $logger): void;

    /**
     * @return UserInterface
     */
    public function auth(): UserInterface;

    /**
     * @param string $channelId
     * @return bool
     */
    public function has(string $channelId): bool;

    /**
     * @param string $channelId
     * @return ChannelInterface
     */
    public function channel(string $channelId): ChannelInterface;

    /**
     * @return \Traversable|ChannelInterface[]
     */
    public function channels(): \Traversable;

    /**
     * @return string
     */
    public function getName(): string;
}
