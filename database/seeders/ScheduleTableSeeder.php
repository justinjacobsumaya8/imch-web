<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if (!Schedule::where('name', '9AM')->count()) 
    	{
    		Schedule::create([
    		    'name' => '9AM',
    		    'limit' => 3,
    		]);
    	}

    	if (!Schedule::where('name', '11AM')->count())
    	{
	        Schedule::create([
	            'name' => '11AM',
	            'limit' => 3,
	        ]);
    	}

    	if (!Schedule::where('name', '1PM')->count())
    	{
	        Schedule::create([
	            'name' => '1PM',
	            'limit' => 3,
	        ]);
        }

        if (!Schedule::where('name', '3PM')->count())
        {
	        Schedule::create([
	            'name' => '3PM',
	            'limit' => 3,
	        ]);
	    }
    }
}
