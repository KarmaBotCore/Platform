<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Io;

use Carbon\Carbon;

/**
 * Class AbstractMessage
 * @package Karma\Platform\Io
 */
abstract class AbstractMessage implements MessageInterface
{
    /**
     * Message edit timeout
     */
    protected const MESSAGE_EDIT_TIMEOUT = -1;

    /**
     * @var ChannelInterface
     */
    protected $channel;

    /**
     * @var UserInterface
     */
    protected $author;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var array|UserInterface[]
     */
    protected $mentions = [];

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * AbstractMessage constructor.
     * @param ChannelInterface $channel
     * @param UserInterface $author
     * @param string $id
     * @param string $body
     */
    public function __construct(ChannelInterface $channel, UserInterface $author, string $id, string $body)
    {
        $this->channel = $channel;
        $this->author = $author;
        $this->id = $id;
        $this->body = $body;
        $this->createdAt = Carbon::now();
    }

    /**
     * @return bool
     */
    public function canBeUpdated(): bool
    {
        switch (static::MESSAGE_EDIT_TIMEOUT) {
            case 0:
                return true;
            case -1;
                return false;
        }

        return Carbon::createFromTimestamp($this->at()->getTimestamp(), $this->at()->getTimezone())
                ->addSeconds(static::MESSAGE_EDIT_TIMEOUT) > Carbon::now($this->at()->getTimezone());
    }

    /**
     * @return \DateTimeInterface
     */
    public function at(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return array
     */
    public function __debugInfo(): array
    {
        return [
            'id'       => $this->getId(),
            'message'  => $this->getBody(),
            'from'     => $this->getUser(),
            'in'       => $this->getChannel(),
            'at'       => $this->at(),
            'mentions' => iterator_to_array($this->getMentions()),
        ];
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
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->author;
    }

    /**
     * @return ChannelInterface
     */
    public function getChannel(): ChannelInterface
    {
        return $this->channel;
    }

    /**
     * @return \Traversable
     */
    public function getMentions(): \Traversable
    {
        return new \ArrayIterator($this->mentions);
    }
}
