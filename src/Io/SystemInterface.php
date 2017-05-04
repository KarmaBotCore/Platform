<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace KarmaBot\Platform\Io;

use Psr\Log\LoggerInterface;
use React\EventLoop\LoopInterface;

/**
 * Interface SystemInterface
 * @package KarmaBot\Platform\Io
 */
interface SystemInterface
{
    /**
     * SystemInterface constructor.
     * @param array $config
     * @param LoopInterface $loop
     * @param null|LoggerInterface $logger
     */
    public function __construct(array $config, LoopInterface $loop, ?LoggerInterface $logger);

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
     * @return array|ChannelInterface[]
     */
    public function channels(): array;

    /**
     * @return string
     */
    public function getName(): string;
}
