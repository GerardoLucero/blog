<?php

namespace App\Listeners;
use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAutoresponder implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;


        if(auth()->check()){
            $message->email = auth()->user()->email;
            $message->nombre = auth()->user()->name;
        }


        Mail::send('emails.contact', ['msg' => $message], function($m) use ($message){

            $m->to($message->email,$message->nombre)->subject('Tu mensaje fue recibido');
        });
    }
}
