<?php

namespace Stats4sd\KoboLink\Events;

use App\Models\User;
use Stats4sd\KoboLink\Models\Xlsform;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class KoboUploadReturnedSuccess implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $form;

    /**
     * Create a new event instance.
     * @param User $user
     * @param Xlsform $form
     * @return void
     */
    public function __construct(User $user, Xlsform $form)
    {
        $this->user = $user;
        $this->form = $form;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     */
    public function broadcastOn(): Channel
    {
        return new PrivateChannel("App.Models.User.{$this->user->id}");
    }
}