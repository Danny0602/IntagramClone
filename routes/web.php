<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;

Route::get('/', HomeController::class)->name('home');

//REGISTER
Route::get('/register',[RegisterController::class,'index'] )->name('register');
Route::post('/register',[RegisterController::class,'store'] );

//LOGIN
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

//LOGOUT
Route::post('/logout', [LogoutController::class,'store'])->name('logout');

//POSTS
Route::get('/{user:username}',[PostController::class,'index'] )->name('post.index');
Route::get('/post/create',[PostController::class,'create'] )->name('post.create');
Route::post('/post',[PostController::class,'store'] )->name('post.store');

Route::delete('/post/{post}',[PostController::class,'destroy'] )->name('post.destroy');

//POST COMENTARIOS
Route::post('/{user:username}/post/{post}',[ComentarioController::class,'store'])->name('comentarios.store');


//POST IMAGES
Route::post('/imagenes', [ImagenController::class,'store'])->name('imagenes.store');
Route::get('/{user:username}/post/{post}',[PostController::class,'show'])->name('post.show');

//LIKES A LAS FOTOS
Route::post('/post/{post}/likes',[LikeController::class,'store'])->name('post.likes.store');
Route::delete('/post/{post}/likes',[LikeController::class,'destroy'])->name('post.likes.destroy');

//Editar Perfil
Route::get('{user:username}/editar-perfil',[PerfilController::class,'index'])->name('perfil.index');
Route::post ('{user:username}/editar-perfil',[PerfilController::class,'store'])->name('perfil.store');

//FOLLOWER
Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('user.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('user.unfollow');