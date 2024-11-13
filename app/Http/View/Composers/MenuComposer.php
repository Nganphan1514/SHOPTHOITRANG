<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Menu;

class MenuComposer
{
   
    protected $users;

    
    public function __construct()
    {
    
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menus= Menu::select('id','name','parent_id')->where('active', 1)->orderByDesc('id')->get();
        $view->with('menus', $menus);
    }
}
