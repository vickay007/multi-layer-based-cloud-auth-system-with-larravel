<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\DownloadNotification;
use Illuminate\Http\Request;

class MailNotificationController extends Controller
{
    public function sendDownloadNotification()
    {
    	$user = User::where('type', 1)->first();

        $downloadData = [
            'body' => 'You have received a download notification',
            'downloadText' => 'Download initiated',
            'url' => url('/list/download'),
            'Thankyou' => 'Thank You'
        ];

        $user->notify(new DownloadNotification($downloadData)); 
    }

}
