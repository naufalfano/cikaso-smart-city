<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('form.list');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', \App\Http\Livewire\Users\Login::class)->name('login');
    Route::get('/register', \App\Http\Livewire\Users\Register::class)->name('register');


    Route::get('/admin/login', \App\Http\Livewire\Admins\Login::class)->name('login.admin');
});

Route::middleware(['auth.cikaso.user'])->group(function () {
    Route::get('/auth', function () {
        return "Authenticated Only, <a href='/logout'>Logout</a>";
    });
    Route::get('/logout', \App\Http\Livewire\Logout::class)->name('logout');

    Route::get('/home', \App\Http\Livewire\Users\ListForm::class)->name('form.list');
    Route::get('/form/new/{id}', \App\Http\Livewire\Users\NgisiForm::class)->name('form.isi');

    Route::get('/form/my/', \App\Http\Livewire\Users\SuratKu::class)->name('form.my');

    Route::get('/form/my/{id}', \App\Http\Livewire\Users\SuratKuDetail::class)->name('form.my.view');
});

Route::middleware(['auth.cikaso.admin'])->prefix('admin')->group(function () {
    Route::get('/admin', function () {
        return "Admin Only, <a href='logout'>Logout</a>";
    });

    Route::get('/logout', \App\Http\Livewire\Admins\Logout::class)->name('logout');
    Route::get('/home', \App\Http\Livewire\Admins\Home::class)->name('home');

    Route::get('/submissions', \App\Http\Livewire\Admins\SubmissionList::class)->name('submissions');
    Route::get('/submissions/{id}', \App\Http\Livewire\Admins\ReviewSubmission::class)->name('submissions.preview');
});
