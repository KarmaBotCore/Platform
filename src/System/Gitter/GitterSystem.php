<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace KarmaBot\Platform\System\Gitter;

use Gitter\Client;
use Illuminate\Support\Arr;
use KarmaBot\Platform\Io\User;
use Psr\Log\LoggerInterface;
use React\EventLoop\LoopInterface;
use KarmaBot\Platform\Io\UserInterface;
use KarmaBot\Platform\Support\Loggable;
use KarmaBot\Platform\Io\SystemInterface;
use KarmaBot\Platform\Io\ChannelInterface;

/**
 * Class GitterSystem
 * @package KarmaBot\Platform\System\Gitter
 */
class GitterSystem implements SystemInterface
{
    use Loggable;

    /**
     * System name
     */
    private const SYSTEM_NAME = 'gitter';

    /**
     * @var LoopInterface
     */
    private $loop;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var UserInterface|null
     */
    private $auth;

    /**
     * @var array|GitterChannel[]
     */
    private $channels = [];

    /**
     * GitterSystem constructor.
     * @param array $config
     * @param LoopInterface $loop
     * @param null|LoggerInterface $logger
     * @throws \DomainException
     */
    public function __construct(array $config, LoopInterface $loop, ?LoggerInterface $logger)
    {
        if (!class_exists(Client::class)) {
            throw new \DomainException('"serafim/gitter-api": "~4.0" required');
        }

        $this->loop = $loop;
        $this->logger = $logger;
        $this->client = new Client(Arr::get($config, 'token'), $logger);
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::SYSTEM_NAME;
    }

    /**
     * @return UserInterface
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\ClientException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     * @throws \Throwable
     */
    public function auth(): UserInterface
    {
        if ($this->auth === null) {
            $this->auth = GitterUser::new($this, $this->client->authUser());
        }

        return $this->auth;
    }

    /**
     * @param string $channelId
     * @return bool
     */
    public function has(string $channelId): bool
    {
        if (!array_key_exists($channelId, $this->channels)) {
            try {
                $this->addChannel($this->client->rooms->join($channelId));
            } catch (\Throwable $e) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $data
     * @return $this
     */
    private function addChannel(array $data)
    {
        $channel = GitterChannel::new($this, $data);

        $this->channels[$channel->getId()] = $channel;

        return $this;
    }

    /**
     * @param string $channelId
     * @return ChannelInterface
     * @throws \InvalidArgumentException
     */
    public function channel(string $channelId): ChannelInterface
    {
        if (!$this->has($channelId)) {
            $message = sprintf('Channel %s not found', $channelId);
            throw new \InvalidArgumentException($message);
        }

        return $this->channels[$channelId];
    }

    /**
     * @return array
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\ClientException
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     * @throws \Throwable
     */
    public function channels(): array
    {
        if ($this->channels === []) {
            foreach ((array)$this->client->rooms->all() as $data) {
                $this->addChannel($data);
            }
        }

        return array_values($this->channels);
    }

    /**
     * @return array
     */
    public function __debugInfo(): array
    {
        return [
            'name' => $this->getName()
        ];
    }


}
