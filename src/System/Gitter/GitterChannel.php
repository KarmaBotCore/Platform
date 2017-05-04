<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace KarmaBot\Platform\System\Gitter;

use KarmaBot\Platform\Io\ChannelInterface;
use KarmaBot\Platform\Io\MessageInterface;
use KarmaBot\Platform\Io\SystemInterface;

/**
 * Class GitterChannel
 * @package KarmaBot\Platform\System\Gitter
 */
class GitterChannel implements ChannelInterface
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
     * GitterChannel constructor.
     * @param SystemInterface|GitterSystem $system
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
     * @param SystemInterface $system
     * @param array $data
     * @return ChannelInterface
     */
    public static function new(SystemInterface $system, array $data): ChannelInterface
    {
        $name = ($data['url'] ?? false)
            ? substr($data['url'], 1)
            : ($data['uri'] ?? $data['name']);


        return new static($system, $data['id'], $name);
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string|null $beforeId
     * @return \Traversable|MessageInterface[]
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\ClientException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     * @throws \Throwable
     */
    public function messages(string $beforeId = null): \Traversable
    {
        $messages = $this->system->getClient()->messages->allBeforeId($this->id, $beforeId);

        foreach ($messages as $message) {
            // TODO
        }
    }

    public function publish(string $message): void
    {
        // TODO: Implement publish() method.
    }

    public function subscribe(\Closure $then): void
    {
        // TODO: Implement subscribe() method.
    }

    /**
     * @return array
     */
    public function __debugInfo(): array
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
    }
}
