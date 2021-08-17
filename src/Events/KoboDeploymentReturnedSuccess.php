<?php

namespace Stats4sd\KoboLink\Events;

;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Stats4sd\KoboLink\Models\TeamXlsform;

class KoboDeploymentReturnedSuccess implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $user;
    public TeamXlsform $form;

    /**
     * Create a new event instance.
     * @return void
     */
    public function __construct($user, TeamXlsform $form)
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
