<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Contas\ContasController;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Models\Contas;
use App\Models\Cuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth.login'])->group(function () {
    Route::get('/painel', function () {
        return view('painel');
    })->name('painel');

    Route::get('/doacoes', function () {
        return view('doacoes');
    })->name('doacoes');

    Route::post('/create-game-account', [ContasController::class, 'create'])->name('create.game.account');

    Route::post('/update-profile', function (Illuminate\Http\Request $request) {
        $request->validate(
            [
                'current_password' => 'required',
                'new_password' => 'required|confirmed|min:8',
            ],
            [
                'current_password.required' => 'O campo senha atual é obrigatório.',
                'new_password.required' => 'O campo nova senha é obrigatório.',
                'new_password.confirmed' => 'As senhas não coincidem.',
                'new_password.min' => 'A nova senha deve ter no mínimo 8 caracteres.',
            ],
        );

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Senha atual está incorreta.']);
        }

        auth()
            ->user()
            ->update(['password' => bcrypt($request->new_password)]);

        return back()->with('success', 'Senha alterada com sucesso!');
    })->name('update.profile');

    Route::post('/update-password', function (Request $request) {
        $validated = $request->validate([
            'id' => 'required|exists:mysql2.cuentas,id',
            'contraseña' => 'required|string|min:8',
        ]);

        $cuentaExist = Contas::where('cuenta_id', $validated['id'])
            ->where('user_id', auth()->id())
            ->exists();

        if (!$cuentaExist) {
            return redirect()->back()->with('error', 'Conta não encontrada.');
        }

        $cuenta = Cuenta::find($validated['id']);

        $cuenta->contraseña = $validated['contraseña'];
        $cuenta->save();

        // Retorna para a página anterior com mensagem de sucesso
        return redirect()->back()->with('success', 'Senha atualizada com sucesso!');
    })->name('update.password');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/noticia/{id}', function ($id) {
    $noticia = News::find($id);
    return view('noticia', ['noticia' => $noticia]);
})->name('news.show');

Route::get('/noticias', function () {
    $noticias = News::orderBy('created_at', 'desc')->paginate(10);
    return view('noticias', ['noticias' => $noticias]);
})->name('news.index');
