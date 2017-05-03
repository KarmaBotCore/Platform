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
 * Class User
 * @package KarmaBot\Platform\Io
 */
class User implements UserInterface
{
    /**
     * @var SystemInterface
     */
    private $system;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * User constructor.
     * @param SystemInterface $system
     * @param string $id
     * @param string $name
     */
    public function __construct(SystemInterface $system, string $id, string $name)
    {
        $this->system = $system;
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return [
            'system' => $this->getSystem()->getName(),
            'id'     => $this->getId(),
            'name'   => $this->getName(),
        ];
    }

    /**
     * @return SystemInterface
     */
    public function getSystem(): SystemInterface
    {
        return $this->system;
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
    public function getName(): string
    {
        return $this->name;
    }
}
