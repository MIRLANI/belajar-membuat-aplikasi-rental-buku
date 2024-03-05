<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
   public function index(Request $request): Response
   {
      $users = User::query()->where("role_id", "=", 2)->get();
      return response()->view("pages.users.users", [
         "users" => $users
      ]);
   }

   public function userRegister():Response
   {
      $registers = User::query()->where("status", "inactive")->where("role_id", 2)->get();
      return response()->view("pages.users.register", ["registers" => $registers]);
   }

   public function userDetail(string $slug):Response
   {
      $user = User::query()->where("slug", $slug)->first();
      return response()->view("pages.users.detail", [
         "user" => $user
      ]);
   }

   public function userUpprove(string $slug):RedirectResponse
   {

      $user = User::query()->where("slug", $slug)->first();
      $user->status = "active";
      $user->update();
      return redirect("/users-detail/". $slug)->with("message", "User Ipprove Successfully");
   }

   public function ban(string $slug):RedirectResponse
   {
      $user = User::query()->where("slug", $slug)->first();
      $user->delete();
      return redirect("/users")->with("message", "User Ban Successfully");
   }

   public function viewdelete():Response
   {
      $users = User::onlyTrashed()->get();
      return response()->view("pages.users.viewdelete", [
         "users" => $users
      ]);
   }

   public function restore(string $slug):RedirectResponse
   {
      $user = User::withTrashed()->where("slug", $slug)->first();
      $user->restore();
      return redirect("/users")->with("message", "User Restore Successfully");
   }
}
