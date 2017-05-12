<?php

namespace Blog1\Events;


use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QuoteCreated
{
    use InteractsWithSockets, SerializesModels;
    public $author;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($author)
    {
        $this->author_name = $author->name;
        $this->author_email = $author->email;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
