<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Ast;

use Karma\Platform\Io\UserInterface;

/**
 * Class UserNode
 * @package Karma\Platform\Ast
 */
class UserNode extends TextNode
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $login;

    /**
     * @var null|string
     */
    private $avatar;

    /**
     * @param string $body
     * @param UserInterface $user
     * @return static|UserNode
     */
    public static function fromUserInterface(string $body, UserInterface $user): UserNode
    {
        return new static($body, $user->getId(), $user->getName(), $user->getAvatar());
    }

    /**
     * UserNode constructor.
     * @param string $body
     * @param string $id
     * @param string $login
     * @param null|string $avatar
     */
    public function __construct(string $body, string $id, string $login, ?string $avatar)
    {
        $this->id = $id;
        $this->login = $login;
        $this->avatar = $avatar;

        parent::__construct($body);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return null|string
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }
}
