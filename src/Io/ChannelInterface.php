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
 * Interface ChannelInterface
 * @package KarmaBot\Platform\Io
 */
interface ChannelInterface extends PublishInterface, SubscribeInterface
{
    /**
     * @return SystemInterface
     */
    public function getSystem(): SystemInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @param string $messageId
     * @param string $message
     * @return ChannelInterface
     */
    public function update(string $messageId, string $message): ChannelInterface;

    /**
     * @param string|null $beforeId
     * @return ReceivedMessageInterface[]|\Traversable
     */
    public function messages(string $beforeId = null): \Traversable;
}
