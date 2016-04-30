<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout {

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event) {
        $user = $event->getUser();
        $msg = "Olá, o pedido <strong>{$event->getOrder()->id}</strong> foi realizado com sucesso!<br/><br/>";
        $msg .= 'segue abaixo a lista de itens comprados:<br/><br/>';
        foreach ($event->getOrder()->items as $item) {
            $msg .= "{$item->qtd} - <strong>{$item->product->name}</strong><br/>";
        }
        Mail::send('store.email', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');
            $m->to($user->email, $user->name)->subject('Parabeńs venda realizada com sucesso.');
        });
        return;
    }

}
