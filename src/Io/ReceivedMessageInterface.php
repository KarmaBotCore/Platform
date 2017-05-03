<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace KarmaBot\Platform\Io;

/**
 * Interface ReceivedMessageInterface
 * @package KarmaBot\Platform\Io
 */
interface ReceivedMessageInterface
{
    /**
     * @return string
     */
    public function getBody(): string;

    /**
     * @return ChannelInterface
     */
    public function getChannel(): ChannelInterface;

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface;

    /**
     * @return \Traversable|UserInterface[]
     */
    public function getMentions(): \Traversable;

    /**
     * @return \DateTimeInterface
     */
    public function at(): \DateTimeInterface;

    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return bool
     */
    public function canBeUpdated(): bool;

    /**
     * @param string $message
     * @return bool
     */
    public function update(string $message): bool;
}
