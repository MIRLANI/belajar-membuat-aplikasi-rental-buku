<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CatagoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PubliController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
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

Route::get("/", [PubliController::class, "index"])->name("index.public");

Route::middleware(['onlyQuest'])->controller(AuthController::class)->group(function () {
    Route::get("/login", "login")->name("login");
    Route::post("/login",  "authentication")->name("authentication");
    Route::get("/register",  "register")->name("register");
    Route::post("/register",  "doRegister")->name("doRegister");
});

Route::middleware("auth")->group(function () {
    Route::get("/logout", [AuthController::class, "logout"]);

    Route::controller(ProfileController::class)->group(function () {
        Route::get("/profile", "index")->name("index.profile")->middleware("onlyClient");
    });

    // hanya admin yang bisa mengases halaman ini
    Route::middleware("onlyAdmin")->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get("/dashboard",  "index")->name("index.dashboard");
        });

        Route::controller(BookController::class)->group(function () {
            Route::get("/books", "index")->name("index.books");
            Route::get("/books-add", "add")->name("add.books");
            Route::post("/books-add", "store")->name("store.books");
            Route::get("/books-edit/{slug}", "edit")->name("edit.books");
            Route::get("/books-delete/{slug}", "delete")->name("delete.books");
            Route::post("/books-edit/{slug}", "update")->name("update.books");
            Route::get("/books-delete", "viewdelete")->name("viewdelete.books");
            Route::get("/books-restore/{slug}", "restore")->name("restore.books");
        });

        Route::controller(CatagoriController::class)->group(function () {
            Route::get("/catagories", "index")->name("index.catagories");
            Route::get("/catagories-add", "add")->name("add.catagories");
            Route::post("/catagories-add", "store")->name("store.catagories");
            Route::get("/catagories-delete/{slug}", "delete")->name("delete.catagories");
            Route::get("/catagories-restore/{slug}", "restore")->name("restore.catagories");
            Route::get("/catagories-delete", "viewdelete")->name("viewdelete.catagories");
            Route::get("/catagories-edit/{slug}", "edit")->name("edit.catagories");
            Route::post("/catagories-edit/{slug}", "update")->name("update.catagories");
        });

        Route::controller(UserController::class)->group(function () {

            Route::get("/users", "index")->name("index.users");
            Route::get("/users-register", "userRegister")->name("register.users");
            Route::get("/users-detail/{slug}", "userDetail")->name("detail.users");
            Route::get("/users-approve/{slug}", "userUpprove")->name("upprove.users");
            Route::get("/users-ban/{slug}", "ban")->name("ban.users");
            Route::get("/users-ban", "viewdelete")->name("viewdelete.users");
            Route::get("/users-restore/{slug}", "restore")->name("restore.users");
        });

        Route::controller(BookRentController::class)->group(function () {
            Route::get("/book-rent", "index")->name("index.book-rent");
        });

        Route::controller(RentLogController::class)->group(function () {

            Route::get("/rent-log", "index")->name("index.rent-log");
        });
    });
});

Route::fallback(function () {
    return "halaman not foud ";
});
