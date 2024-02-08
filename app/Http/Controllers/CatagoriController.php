<?php

namespace App\Http\Controllers;

use App\Models\Catagori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class CatagoriController extends Controller
{
  public function index(): Response
  {

    $catagories = Catagori::query()->get();

    return response()->view("pages.catagories.catagories", [
      "catagories" => $catagories
    ]);
  }

  public function add(): Response
  {
    return response()->view("pages.catagories.add_catagories");
  }

  public function store(Request $request): RedirectResponse
  {
    App::setLocale("id");
    $request->validate([
      "name" => ["required", "unique:catagories"]
    ]);
    Catagori::query()->create($request->all());
    $catagories = $request['name'];
    return response()->redirectTo("/catagories")->with("message",  "Catagori Add Successfull");
  }

  public function delete(string $slug): RedirectResponse
  {
    $catagori = Catagori::query()->where("slug", $slug)->first();
    $catagori->delete();
    return response()->redirectToRoute("index.catagories")->with("message", "Catagori Delete Successfull");
  }

  public function edit(string $slug): Response
  {
    $catagori = Catagori::query()->where("slug", $slug)->first();
    return response()->view("pages.catagories.edit_catagories", ["catagori" => $catagori]);
  }
 
  public function update(string $slug, Request $request): RedirectResponse
  {
      $catagori = Catagori::query()->where("slug", $slug)->first();
      $catagori->slug = null;
      $catagori->update([
        "name" => $request->input("name")
      ]);
      $catagori->save();

      return response()->redirectTo("/catagories")->with("message",  "Catagori Update Successfull");
   
  }

  public function viewdelete():Response
  {
    $catagories = Catagori::onlyTrashed()->get();
    return response()->view("pages.catagories.view_delete_catagories", [
      "catagories" => $catagories
    ]);
  }


  public function restore(string $slug):RedirectResponse
  {
      $catagories = Catagori::withTrashed()->where("slug", $slug)->first();
      $catagories->restore();
      return response()->redirectTo("/catagories")->with("message", "Catagori Restore Successfull");
  }

}
