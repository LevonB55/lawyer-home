<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('App.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});

// Channel for new message
Broadcast::channel('messages.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Channel for new video call
Broadcast::channel('call.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Channel for rejected video call
Broadcast::channel('reject-call.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//Broadcast::channel('lawyer_database_private-messages.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});
