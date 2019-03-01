<?php

namespace App\Http\Controllers;

use App\Events\NewMessageNotification;
use App\Models\Message;
use Illuminate\Http\Request;
use MongoDB\Driver\Manager;

class MessageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = \Auth::id();
        $data = array('user_id' => $user_id);

        return view('welcome', $data);
    }

    public function send()
    {
        // ...

        // message is being sent
        $message = new Message;
        $message->setAttribute('from', 1);
        $message->setAttribute('to', 2);
        $message->setAttribute('message', 'Demo message from user 1 to user 2');
        $message->save();

        // want to broadcast NewMessageNotification event
        $event = event(new NewMessageNotification($message));

        \App\Models\Manager::find(2)->notify($event);
        return 'Event has been sent';
        // ...
    }
}
