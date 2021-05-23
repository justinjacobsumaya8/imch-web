<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\CovidCIFRequest;
use App\Models\{Entry, Schedule, EntrySchedule};
use DB;

class CovidCIFController extends Controller
{
    public function index()
    {
    	$genders = ['Male', 'Female'];
    	$civil_statuses = ['Married', 'Widowed', 'Separated', 'Divorced', 'Single'];

        $country_path = public_path() . "/json/countries.json";
        $countries = json_decode(file_get_contents($country_path), true); 

        $nationality_path = public_path() . "/json/nationalities.json";
        $nationalities = json_decode(file_get_contents($nationality_path), true); 

        $schedules = Schedule::active()->get();
    	return view('frontend.pages.covid-cif.index', compact('genders', 'civil_statuses', 'countries', 'nationalities', 'schedules'));
    }

    public function store(CovidCIFRequest $request)
    {
        $data = Entry::where('permanent_email_address', $request->permanent_email_address)->first();
        if (!$data) 
        {
            $data = new Entry;
        }
    	
        $data->fill($request->except(['birthday', 'is_history_of_travel_symptom', 'is_returning_ofw', 'is_locally_stranded_lsi', 'schedule_date', 'schedule_id']));
        $data->status = 'Pending';
        $data->birthday = \Carbon\Carbon::createFromFormat('m/d/Y', $request->birthday)->format('Y-m-d');
        $data->is_history_of_travel_symptom = isset($request->is_history_of_travel_symptom) ? 1 : 0;
        $data->is_returning_ofw = isset($request->is_returning_ofw) ? 1 : 0;
        $data->is_locally_stranded_lsi = isset($request->is_locally_stranded_lsi) ? 1 : 0;
        $data->save();

        $schedule = EntrySchedule::where('entry_id', $data->id)
                            ->where('is_cancelled', false)
                            ->where('is_approved', false)
                            ->first();
        if (!$schedule) 
        {
            $schedule = new EntrySchedule;
        }

        $sched = Schedule::find($request->schedule_id);

        $schedule->entry_id = $data->id;
        $schedule->schedule_id = $sched->id;
        $schedule->schedule_name = $sched->name;
        $schedule->schedule_date = $request->schedule_date;
        $schedule->save();


        return redirect()->back()->with('flash_success', 'Form submitted successfully.');
    }

    public function schedules(Request $request)
    {
        $schedules = [];
        if ($request->schedule_date) 
        {
            $schedule_date = date('Y-m-d', strtotime($request->schedule_date));
            $schedules = Schedule::leftJoin(DB::Raw("(SELECT COUNT(*) as schedule_count, e.schedule_id
                                FROM entry_has_schedules e 
                                WHERE e.schedule_date = '" . $schedule_date . "'
                                AND e.is_cancelled = false
                                AND e.is_resched = false 
                                AND e.is_approved = true
                                GROUP BY schedule_id) e "),"e.schedule_id","schedules.id")
                            ->select('schedules.name', 'schedules.limit', DB::raw('COALESCE(e.schedule_count, 0) as schedule_count'), DB::raw('(schedules.limit - COALESCE(e.schedule_count, 0)) as schedule_availability'))
                            ->where('schedules.is_deleted', false)
                            ->get();
        }

        return response()->json($schedules);
    }
}
