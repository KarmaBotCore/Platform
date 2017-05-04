<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace KarmaBot\Platform\System\Gitter;

use KarmaBot\Platform\Io\User;
use KarmaBot\Platform\Io\UserInterface;
use KarmaBot\Platform\Io\SystemInterface;

/**
 * Class GitterUser
 * @package KarmaBot\Platform\System\Gitter
 */
class GitterUser extends User
{
    /**
     * @param SystemInterface $system
     * @param array $data
     * @return UserInterface
     */
    public static function new(SystemInterface $system, array $data): UserInterface
    {
        $user = new static($system, $data['id'], $data['username']);
        $user->avatar = $data['avatarUrl'];

        return $user;
    }
}
