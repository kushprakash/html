<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
use DB;

/**
 * Class GlobalTemplateServiceProvider
 * @package App\Providers
 * @codeCoverageIgnore
 */
class GlobalTemplateServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['ui.layout.main_ui'], function ($view) {
            $view->with('headerMenus', $this->getHeaderMenu());
        });
    }

    

    /**
     * @return int
     */
    private function getHeaderMenu()
    {
    	if (!empty(Redis::get('header:menu'))) {
    		return json_decode(Redis::get('header:menu'), 1);
    	}
    	$headerMenus = [];
    	$menus = DB::table('header_menu')
    	->select('header_menu.id as menu_id', 'header_menu.menu_name as menu_name', 'category.id as category_id', 'category.category as category_name')
    	->leftJoin('category', 'category.header_name', '=', 'header_menu.id')
    	->where(['header_menu.status' => 1, 'category.status' => 1])
    	->orderBy('header_menu.id')
    	->get();
    	foreach ($menus as $key => $menu) {
    		$headerMenus[$menu->menu_id]['id']   = $menu->menu_id;
    		$headerMenus[$menu->menu_id]['name'] = $menu->menu_name;
    		$headerMenus[$menu->menu_id]['categories'][] = [
    			'id' => $menu->category_id,
    			'name' => $menu->category_name
    		];
    	}

    	Redis::set('header:menu', json_encode($headerMenus), 'EX', 60*60*12);
        
        return $headerMenus;
    }

    
    
}
