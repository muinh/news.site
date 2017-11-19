<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    public static function getItems()
    {
        $menus = DB::table('menus')->get();
        $mBuilder = Menu::make('MyNav', function($m) use ($menus) {
            foreach($menus as $item) {
                if($item->parentId == 0) {
                    $m->add($item->title, $item->url)->id($item->id);
                } else {
                    if($m->find($item->parentId)) {
                        $m->find($item->parentId)->add($item->title, $item->url)->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }

    public static function store($request)
    {
        $menu = new Menu();
        $menu->title = $request['menus-add-title'];
        $menu->url = $request['menus-add-url'];
        $menu->parentId = $request['menus-add-parent'];
        $menu->save();
    }

    public static function update($request)
    {
        $menu = Menu::findOrFail($request['menus-edit-id']);
        $menu->title = $request['menus-edit-title'];
        $menu->url = $request['menus-edit-url'];
        $menu->parentId = $request['menus-edit-parent'];
        $menu->save();
    }
}
