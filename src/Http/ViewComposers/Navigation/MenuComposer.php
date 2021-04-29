<?php

namespace Sequelone\Sone\Menus\Http\ViewComposers\Navigation;

use Illuminate\Contracts\View\View;
use Sequelone\Sone\Menus\Models\Menu;

class MenuComposer
{
    public function compose(View $view)
    {
        $menus = \Sequelone\Sone\Menus\Models\Menu::isLive()
            ->ofSort(['parent_id' => 'asc', 'sort_order' => 'asc'])
            ->where('level', '=', 0)
            ->get();

        $menus = $this->buildTree($menus);

        return $view->with('menus', $menus);
    }

    public function buildTree($mitems)
    {
        $grouped = $mitems->groupBy('parent_id');

        foreach ($mitems as $mitem) {
            if ($grouped->has($mitem->id)) {
                $mitem->children = $grouped[$mitem->id];
            }
        }

        return $mitems->where('parent_id', null);
    }

    function buildMenu($menus, $level = 0)
    {
        foreach ($menus as $mitem) {
            if (isset($mitem->children)) {
                buildMenu($mitem, $level+1);
            } else {
                echo str_repeat('--', $level) . $mitem . '\n';
            }
        }
    }
}
