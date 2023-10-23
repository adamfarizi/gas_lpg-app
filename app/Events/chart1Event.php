<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class chart1Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tanggal_transaksi;
    public $jumlah_transaksi;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($tanggal_transaksi, $jumlah_transaksi)
    {
        $this->tanggal_transaksi = $tanggal_transaksi;
        $this->jumlah_transaksi = $jumlah_transaksi;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chart1-channel');
    }
}
