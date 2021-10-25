<?php

namespace Osoobe\Laravel\DlvrIt;

use Illuminate\Notifications\Notification;
use Osoobe\DlvrItApi\Request;

class DlvrItChannel {

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return mixed
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toDlvrIt($notifiable);
        
        if ( empty($message) || config('app.env') != 'production') {
            return null;
        }
        $key = config('dlvrit.key');

        $request = new Request($key);
        switch (get_class($message)) {
            case MessageRoute::class:
                return $request->postToRoute(
                    $message->getId(),
                    $message->getMessage(), 
                    $message->getParams()
                );
                break;
            case MessageAccount::class:
                return $request->postToAccount(
                    $message->getId(),
                    $message->getMessage(), 
                    $message->getParams()
                );
                break;
            
            default:
                return null;
                break;
        }
        return null;
    }

}

?>