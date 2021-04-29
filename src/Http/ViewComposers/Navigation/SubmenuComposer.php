<?php

namespace Sequelone\Sone\Menus\Http\ViewComposers\Navigation;

use Illuminate\Contracts\View\View;
use Sequelone\Sone\Menus\Models\Menu;

class SubmenuComposer
{
    public function compose(View $view)
    {
        $submenus = Menu::whereNull('parent_id')
            ->with('children')
            ->get();

        return $view->with('submenus', $submenus);
    }

}
