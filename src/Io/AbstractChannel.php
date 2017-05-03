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
 * Class AbstractChannel
 * @package KarmaBot\Platform\Io
 */
abstract class AbstractChannel implements ChannelInterface
{
    /**
     * @var SystemInterface
     */
    protected $system;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * GitterChannel constructor.
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
