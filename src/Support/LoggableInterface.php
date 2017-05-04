<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace KarmaBot\Platform\Support;

use Psr\Log\LoggerInterface;

/**
 * Interface LoggableInterface
 * @package KarmaBot\Platform\Support
 */
interface LoggableInterface
{
    /**
     * @return null|LoggerInterface
     */
    public function getLogger(): ?LoggerInterface;

    /**
     * @param string $message
     */
    public function info(string $message): void;

    /**
     * @param string $message
     */
    public function error(string $message): void;
}
