<?php
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::middleware(['auth'])->get('/dashboard' , function () {
    return view('dashboard');
});

Route::middleware(['auth'])->get('/auth/xbox' , function () {
    $clientId = env('XBOX_CLIENT_ID');
    $redirectUri = env('XBOX_REDIRECT_URI');
    $scope = 'XboxLive.signin'; 

    $authorizeUrl = "https://login.microsoftonline.com/common/oauth2/v2.0/authorize";
    $authUrl = "{$authorizeUrl}?client_id={$clientId}&response_type=code&redirect_uri={$redirectUri}&scope={$scope}";

    return redirect($authUrl);
});

Route::middleware(['auth'])->get('/auth/xbox/callback', function () {
    $user = Socialite::driver('xbox')->user();

    // Salve os dados do usuário no banco de dados ou use-os para acessar a API
    // Exemplo:
    dd($user->token);

    return redirect('/dashboard')->with('xboxToken', $xboxToken);
});

require __DIR__.'/auth.php';
