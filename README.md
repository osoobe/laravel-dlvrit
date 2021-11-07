# osoobe/laravel-dlvrit

Laravel Package for dlvr.it API

### Dependencies

- [osoobe/dlvrit-api](https://github.com/osoobe/dlvr.it.php-api)


### Example
```
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Osoobe\Laravel\DlvrIt\DlvrItChannel;
use Osoobe\Laravel\DlvrIt\MessageRoute;

class DlvrItNotification extends Notification
{
    use Queueable;
   
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [DlvrItChannel::class];
    }
    
   
    /**
     * Send message dlvir
     *
     * @param mixed $notifiable
     * @return mixed
     */
    public function toDlvrIt($notifiable)
    {   
        return (new MessageRoute("Write your message here"))
            ->line("New line with message");
    }
}
```
