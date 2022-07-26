<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $notificaciones = auth()->user()->unreadNotifications;

        // Clean notifications
        auth()->user()->unreadNotifications->markAsRead();
        
        return view('notificaciones.index', [
          'notificaciones' => $notificaciones 
        ]);
    }
}
