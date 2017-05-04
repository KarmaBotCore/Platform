<?php declare(strict_types=1);
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace KarmaBot\Platform\Io;

/**
 * Interface UserInterface
 * @package KarmaBot\Platform\Io
 */
interface UserInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string|null
     */
    public function getAvatar(): ?string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return SystemInterface
     */
    public function getSystem(): SystemInterface;
}
