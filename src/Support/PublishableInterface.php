<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Support;

use Karma\Platform\Io\MessageInterface;

/**
 * Interface PublishableInterface
 * @package Karma\Platform\Support
 */
interface PublishableInterface
{
    /**
     * @param string $message
     * @return MessageInterface
     */
    public function publish(string $message): MessageInterface;
}
