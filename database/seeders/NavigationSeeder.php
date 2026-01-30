<?php

namespace Database\Seeders;

use App\Models\NavigationItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks to truncate safely
        Schema::disableForeignKeyConstraints();
        NavigationItem::truncate();
        Schema::enableForeignKeyConstraints();

        $menu = [
            [
                'name' => 'Dashboard',
                'order' => 1,
                'route' => '/',
                'icon' => 'dashboard',
                'color' => '#6366f1',
            ],
            [
                'name' => 'Drinks',
                'order' => 2,
                'route' => '#',
                'icon' => 'local_cafe',
                'color' => '#10b981',
                'children' => [
                    [
                        'name' => 'Order Drinks',
                        'order' => 1,
                        'route' => '/drinks',
                        'icon' => 'shopping_cart',
                    ],
                    [
                        'name' => 'Manage Drinks',
                        'order' => 2,
                        'route' => '/admin/drinks',
                        'icon' => 'settings',
                    ],
                    [
                        'name' => 'Manage Orders',
                        'order' => 3,
                        'route' => '/admin/orders',
                        'icon' => 'view_list',
                    ],
                ]
            ],
            // Future module placeholders can be easily added here
        ];

        $this->seedMenu($menu);
    }

    /**
     * Recursively seed the menu items.
     */
    private function seedMenu(array $items, $parentId = null)
    {
        foreach ($items as $item) {
            $children = $item['children'] ?? [];
            unset($item['children']);
            
            $item['parent_id'] = $parentId;
            $navItem = NavigationItem::create($item);

            if (!empty($children)) {
                $this->seedMenu($children, $navItem->id);
            }
        }
    }
}
