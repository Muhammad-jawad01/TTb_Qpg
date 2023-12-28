<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use Spatie\Permission\Models\Permission;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'title' => 'user',
                'permissions' => [
                    'user-list',
                    'user-create',
                    'user-edit',
                    'user-delete'
                ],
            ],
            [
                'title' => 'role',
                'permissions' => [
                    'role-list',
                    'role-create',
                    'role-edit',
                    'role-delete',
                ],

            ],



            [
                'title' => 'report',
                'permissions' => [
                    'report-list',
                    'report-create',
                    'report-edit',
                    'report-delete',
                ],

            ],
            [
                'title' => 'report',
                'permissions' => [
                    'report-list',
                    'report-create',
                    'report-edit',
                    'report-delete',
                ],

            ],
            [
                'title' => 'subject',
                'permissions' => [
                    'subject-list',
                    'subject-create',
                    'subject-edit',
                    'subject-delete',
                ],

            ],
            [
                'title' => 'term',
                'permissions' => [
                    'term-list',
                    'term-create',
                    'term-edit',
                    'term-delete',
                ],

            ],
            [
                'title' => 'class',
                'permissions' => [
                    'class-list',
                    'class-create',
                    'class-edit',
                    'class-delete',
                ],

            ],            [
                'title' => 'chapter',
                'permissions' => [
                    'chapter-list',
                    'chapter-create',
                    'chapter-edit',
                    'chapter-delete',
                ],

            ],    
            [
                'title' => 'question',
                'permissions' => [
                    'question-list',
                    'question-create',
                    'question-edit',
                    'question-delete',
                ],

            ],
               
            [
                'title' => 'question_detail',
                'permissions' => [
                    'question_detail-list',
                    'question_detail-create',
                    'question_detail-edit',
                    'question_detail-delete',
                ],

            ],
            [
                'title' => 'paper',
                'permissions' => [
                    'paper-list',
                    'paper-create',
                    'paper-edit',
                    'paper-delete',
                ],

            ],




        ];

        foreach ($records as $record) {
            $data = $record;
            unset($data['permissions']);
            $menu = Menu::firstOrCreate($data);
            foreach ($record['permissions'] as $permission) {
                Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web', 'menu_id' => $menu->id]);
            }
        }
    }
}