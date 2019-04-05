<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('menus')->insert(['name'=>'admin']);
        $items =
            [
                [
                    'menu_id' => '1',
                    'title' => 'Dashboard',
                    'url' => NULL,
                    'target' => '_seft',
                    'icon_class' => 'ti-anchor',
                    'parent_id' => 0,
                    'order' => '1',
                    'route' => 'dashboard',
                    'parameters' => NULL,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ],
                [
                        'menu_id' => '1',
                        'title' => 'Người dùng',
                        'url' => NULL,
                        'target' => '_seft',
                        'icon_class' => 'ti-user',
                        'parent_id' => 0,
                        'order' => '2',
                        'route' => 'users.index',
                        'parameters' => NULL,
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime(),
                ],
                [
                    'menu_id' => '1',
                    'title' => 'Vai trò & Quyền',
                    'url' => '#',
                    'target' => '_seft',
                    'icon_class' => 'ti-key',
                    'parent_id' => 0,
                    'order' => '4',
                    'route' => NULL,
                    'parameters' => NULL,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ],
                [
                    'menu_id' => '1',
                    'title' => 'Vai trò',
                    'url' => NULL,
                    'target' => '_seft',
                    'icon_class' => NULL,
                    'parent_id' => 0,
                    'order' => '5',
                    'route' => 'roles.index',
                    'parameters' => NULL,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ],
                [
                    'menu_id' => '1',
                    'title' => 'Quyền',
                    'url' => NULL,
                    'target' => '_seft',
                    'icon_class' => NULL,
                    'parent_id' => 0,
                    'order' => '6',
                    'route' => 'permissions.index',
                    'parameters' => NULL,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ],
                [
                    'menu_id' => '1',
                    'title' => 'Menu Builder',
                    'url' => NULL,
                    'target' => '_seft',
                    'icon_class' => 'ti-list',
                    'parent_id' => 0,
                    'order' => '3',
                    'route' => 'menus.index',
                    'parameters' => NULL,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ],
                [
                    'menu_id' => '1',
                    'title' => 'Sản phẩm',
                    'url' => '#',
                    'target' => '_seft',
                    'icon_class' => 'ti-package',
                    'parent_id' => 0,
                    'order' => '5',
                    'route' => NULL,
                    'parameters' => NULL,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ],
                [
                    'menu_id' => '1',
                    'title' => 'Loại sản phẩm',
                    'url' => NULL,
                    'target' => '_seft',
                    'icon_class' => NULL,
                    'parent_id' => 0,
                    'order' => '6',
                    'route' => 'products.types.index',
                    'parameters' => NULL,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),

                ],
                [
                    'menu_id' => '1',
                    'title' => 'Danh sách sản phẩm',
                    'url' => NULL,
                    'target' => '_seft',
                    'icon_class' => NULL,
                    'parent_id' => 0,
                    'order' => '7',
                    'route' => 'products.index',
                    'parameters' => NULL,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ],
                [
                    'menu_id' => '1',
                    'title' => 'Hóa đơn',
                    'url' => '#',
                    'target' => '_seft',
                    'icon_class' => 'ti-receipt',
                    'parent_id' => 0,
                    'order' => '6',
                    'route' => NULL,
                    'parameters' => NULL,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ],
                [
                    'menu_id' => '1',
                    'title' => 'Hóa đơn nhập',
                    'url' => NULL,
                    'target' => '_seft',
                    'icon_class' => NULL,
                    'parent_id' => 0,
                    'order' => '8',
                    'route' => 'bill.import.index',
                    'parameters' => NULL,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ]
            ];
        foreach ($items as $item){
            \Illuminate\Support\Facades\DB::table('menu_items')->insert($item);
        }
    }
}
