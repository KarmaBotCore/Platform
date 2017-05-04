<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Support;

use Psr\Log\LoggerInterface;

/**
 * Trait Loggable
 * @package Karma\Platform\Support
 * @mixin LoggableInterface
 */
trait Loggable
{
    /**
     * @var null|LoggerInterface
     */
    protected $logger;

    /**
     * @return null|LoggerInterface
     */
    public function getLogger(): ?LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param string $message
     */
    public function info(string $message): void
    {
        if ($logger = $this->getLogger()) {
            $logger->info($message);
        }
    }

    /**
     * @param string $message
     */
    public function error(string $message): void
    {
        if ($logger = $this->getLogger()) {
            $logger->error($message);
        }
    }
}
