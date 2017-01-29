<?php

Route::get('login', function(Request $request){
    $auth = new \SteamAuth();
    if ($auth->user) {
        return redirect()->route('login/done');
    }
    return redirect($auth->authUrl);
});

Route::get('login/done', function(Request $request){
    $auth = new \SteamAuth();
    if (!$auth->user) {
        return redirect()->route('login');
    }
    $user = \App\User::where("name", $auth->user)->first();
    if (!$user) {
        $user = new \App\User;
        $user->name = $auth->user;
        $user->save();
    }

    \Auth::login($user);
    return redirect()->intended(\Config::get('steam_auth.redirect')));
});
