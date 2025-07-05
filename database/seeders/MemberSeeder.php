<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\Group;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        $members = Member::all();
        $groups = Group::all();
        Member::factory()->count(20)->create();

         $groupNames = ['Choir Ministry', 'Youth Group', 'Bible Study', 'Volunteer Team', 'Prayer Team'];

         foreach ($groupNames as $groupName) {
             $groupModel = Group::create(['name' => $groupName]);
             $groupModel->members()->attach(Member::all()->random(5));
         }

         foreach ($members as $member) {
                $member->groups()->attach(
                    $groups->random(rand(1, 2))->pluck('id')->toArray()
                );
            }
    }
}
