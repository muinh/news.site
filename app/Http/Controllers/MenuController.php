<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        Menu::store($request);
        return redirect()->route('menuIndex');
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request)
    {
        Menu::update($request);
        return redirect()->route('menuIndex');
    }
}
