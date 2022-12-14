<?php

use App\Http\Controllers\CabinetsController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\PairsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('UserControl')->group(function () {
    Route::get('/mySchedule', [UserController::class, 'mySchedule'])->name('mySchedule');
});

Route::middleware('AdminControl')->group(function (){
    Route::get('/admin', [UserController::class, 'adminView'])->name('admin');
    Route::post('/admin', [UserController::class, 'adminViewPost']);

    Route::get('/registration', [UserController::class, 'registration'])->name('reg');
    Route::post('/registration', [UserController::class, 'registrationPost']);

    Route::get('/addgroup', [GroupsController::class, 'addGroup'])->name('add_group');
    Route::post('/addgroup', [GroupsController::class, 'addGroupPost']);

    Route::get('/addcab', [CabinetsController::class, 'addCabinets'])->name('add_cab');
    Route::post('/addcab', [CabinetsController::class, 'addCabinetsPost']);

    Route::get('/addsub', [SubjectsController::class, 'addSubject'])->name('add_sub');
    Route::post('/addsub', [SubjectsController::class, 'addSubjectsPost']);

    Route::get('/addpairs', [PairsController::class, 'addPairs'])->name('add_pairs');
    Route::post('/addpairs', [PairsController::class, 'addPairsPost']);

    Route::get('/studentslist', [UserController::class, 'studentList'])->name('student_list');
    Route::get('/teacherlist', [UserController::class, 'teacherList'])->name('teacher_list');

    Route::get('/editUser{user}', [UserController::class, 'editUser'])->name('edit_user');
    Route::post('/editUser{user}', [UserController::class, 'editUserPost']);

    Route::get('/deleteUser{user}', [UserController::class, 'deleteUser'])->name('delete_user');
    Route::post('/deleteUser{user}', [UserController::class, 'deleteUserPost']);

    Route::get('/editPair{pairs}', [PairsController::class, 'editPairs'])->name('edit_pair');
    Route::post('/editPair{pairs}', [PairsController::class, 'editPairsPost']);

    Route::get('/deletePair{pairs}', [PairsController::class, 'deletePairs'])->name('delete_pair');
    Route::post('/deletePair{pairs}', [PairsController::class, 'deletePairsPost']);
});

Route::get('/', [PairsController::class, 'mainView'])->name('/');
Route::post('/', [PairsController::class, 'mainViewPost']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginPost']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/noAccess', [UserController::class, 'noAccess'])->name('noAccess');


