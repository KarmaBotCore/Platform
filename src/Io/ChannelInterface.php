<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace KarmaBot\Platform\Io;

use KarmaBot\Platform\Support\PublishableInterface;
use KarmaBot\Platform\Support\SubscribableInterface;

/**
 * Interface ChannelInterface
 * @package KarmaBot\Platform\Io
 */
interface ChannelInterface extends
    PublishableInterface,
    SubscribableInterface
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
     * @param string|null $beforeId
     * @return MessageInterface[]|\Traversable
     */
    public function messages(string $beforeId = null): \Traversable;
}
