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
 * Class ReceivedMessage
 * @package KarmaBot\Platform\Io
 */
abstract class ReceivedMessage implements ReceivedMessageInterface
{
    /**
     * @var ChannelInterface
     */
    private $channel;

    /**
     * @var UserInterface
     */
    private $author;

    /**
     * @var \DateTimeInterface
     */
    private $date;

    /**
     * ReceivedMessage constructor.
     * @param ChannelInterface $channel
     * @param UserInterface $author
     * @param \DateTimeInterface $date
     */
    public function __construct(ChannelInterface $channel, UserInterface $author, \DateTimeInterface $date)
    {
        $this->channel = $channel;
        $this->author = $author;
        $this->date = $date;
    }

    /**
     * @param string $message
     * @return bool
     */
    public function update(string $message): bool
    {
        if ($this->canBeUpdated()) {
            try {
                $this->channel->update($this->getId(), $message);
            } catch (\Throwable $e) {
                return false;
            }

            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function canBeUpdated(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function __debugInfo()
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
     * @return \DateTimeInterface
     */
    public function at(): \DateTimeInterface
    {
        return $this->date;
    }

}
