<?php

namespace App\Listeners;
use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductStock implements ShouldQueue
{
    use InteractsWithQueue;
    
    public function handle(OrderPlaced $event): void
    {
        $order = $event->order;

        foreach($order->products as $product) {
            $product->decrement('stock', $product->pivot->quantity);
        }
    }
}
