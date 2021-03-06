<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Entry, Schedule, EntrySchedule};
use DB;

class EntriesController extends Controller
{
    public function index(Request $request)
    {
    	return view('backend.entries.index', compact('request'));
    }

    public function show($id, $entry_schedule_id)
    {
        $entry_schedule = EntrySchedule::join('schedules as s', 's.id', 'entry_has_schedules.schedule_id')
                                ->where('is_cancelled', false)
                                ->select('entry_has_schedules.*', 's.name')
                                ->find($entry_schedule_id);
        if (!$entry_schedule) 
        {
            abort(404);
        }

    	$entry = Entry::findOrFail($id);

        $schedule = Schedule::leftJoin(DB::Raw("(SELECT COUNT(*) as schedule_count, e.schedule_id
                                FROM entry_has_schedules e 
                                WHERE e.schedule_date = '" . $entry_schedule->schedule_date . "'
                                AND e.is_cancelled = false
                                AND e.is_resched = false 
                                AND e.is_approved = true
                                GROUP BY schedule_id) e "),"e.schedule_id","schedules.id")
                            // ->select('schedules.name', 'schedules.limit', DB::raw('IFNULL(e.schedule_count, 0) as schedule_count'), DB::raw('(schedules.limit - IFNULL(e.schedule_count, 0)) as schedule_availability'))
                            ->select('schedules.name', 'schedules.limit', DB::raw('COALESCE(e.schedule_count, 0) as schedule_count'), DB::raw('(schedules.limit - COALESCE(e.schedule_count, 0)) as schedule_availability'))
                            ->where('schedules.is_deleted', false)
                            ->find($entry_schedule->schedule_id);

        $statuses = ['Approved', 'Resched', 'Cancel'];
        $schedules = Schedule::active()->get();
    	return view('backend.entries.show', compact('entry', 'statuses', 'schedules', 'schedule', 'entry_schedule'));
    }

    public function update(Request $request, $id, $entry_schedule_id)
    {
        $entry = Entry::leftJoin(DB::Raw("(SELECT *
                                FROM entry_has_schedules e 
                                WHERE e.is_cancelled = false) e "),"e.entry_id","entries.id")
                    ->select('entries.*', 'e.schedule_date', 'e.schedule_id')
                    ->findOrFail($id);

        $schedule = Schedule::leftJoin(DB::Raw("(SELECT COUNT(*) as schedule_count, e.schedule_id
                                FROM entry_has_schedules e 
                                WHERE e.schedule_date = '" . $entry->schedule_date . "'
                                AND e.is_cancelled = false
                                AND e.is_resched = false 
                                AND e.is_approved = true
                                GROUP BY schedule_id) e "),"e.schedule_id","schedules.id")
                            ->select('schedules.name', 'schedules.limit', DB::raw('COALESCE(e.schedule_count, 0) as schedule_count'), DB::raw('(schedules.limit - COALESCE(e.schedule_count, 0)) as schedule_availability'))
                            ->where('schedules.is_deleted', false)
                            ->find($entry->schedule_id);

        if ($schedule->schedule_availability <= 0) 
        {
            return redirect()->back()->with('flash_danger', 'No available slot for this schedule.');
        }

        $entry->status = $request->status;
        $entry->save();

        $entry_schedule = EntrySchedule::find($entry_schedule_id);

        if ($request->status == 'Approved') 
        {
            $entry_schedule->is_approved = true;
            $entry_schedule->approved_by = auth()->user()->id;
            $entry_schedule->approved_at = now();
            $entry_schedule->save();

            $redirect = redirect('admin/entries')->with('flash_success', 'Entry approved successfully.');
        }

        else if ($request->status == 'Cancel') 
        {
            $entry_schedule->is_cancelled = true;
            $entry_schedule->cancelled_by = auth()->user()->id;
            $entry_schedule->cancelled_at = now();
            $entry_schedule->save();

            $redirect = redirect('admin/entries')->with('flash_success', 'Entry cancelled successfully.');
        }

        else if ($request->status == 'Resched') 
        {
            $entry_schedule->is_resched = true;
            $entry_schedule->resched_by = auth()->user()->id;
            $entry_schedule->resched_at = now();
            $entry_schedule->save();

            $sched = Schedule::find($request->schedule_id);

            $new_sched = New EntrySchedule;
            $new_sched->entry_id = $entry->id;
            $new_sched->schedule_id = $sched->id;
            $new_sched->schedule_name = $sched->name;
            $new_sched->schedule_date = $request->schedule_date;
            $new_sched->save();

            $redirect = redirect('admin/entries')->with('flash_success', 'Entry rescheduled succesfully.');
        }

        return $redirect;
    }

    public function print($id)
    {
        $entry = Entry::findOrFail($id);
        return view('backend.entries.print', compact('entry'));
    }

    public function getEntries(Request $request)
    {
        $user = auth()->user();

        $data = EntrySchedule::join('entries as e', 'e.id', 'entry_has_schedules.entry_id')
                            ->join('schedules as s', 's.id', 'entry_has_schedules.schedule_id')
                            ->where('is_cancelled', false)
                            ->select('entry_has_schedules.*', 'e.first_name', 'e.middle_name', 'e.last_name', 'e.status', 's.name', 'e.permanent_cellphone_number');

        if ($user->hasRole('Administrator')) 
        {
            $data = $data->where('entry_has_schedules.is_approved', true)
                        ->where('entry_has_schedules.is_resched', false);
        }

        if ($user->hasRole('Personnel')) 
        {
            $data = $data->where('entry_has_schedules.is_approved', false)
                        ->where('entry_has_schedules.is_resched', false);
        }

        if ($request->date_schedule) 
        {
            $data = $data->whereDate('schedule_date', $request->date_schedule);
        }
        
        $data = $data->get();

        if ($request->ajax()) 
        {
            return response()->json(['data' => $data]);
        }

        return redirect('admin/entries?date_schedule=' . $request->date_schedule);
    }

    public function getScheduleModal($entry_schedule_id)
    {
        $entry_schedule = EntrySchedule::join('schedules as s', 's.id', 'entry_has_schedules.schedule_id')
                                ->where('is_cancelled', false)
                                ->select('entry_has_schedules.*', 's.name')
                                ->find($entry_schedule_id);

        $schedules = Schedule::active()->get();

        return view('backend.entries._schedule', compact('entry_schedule', 'schedules'));
    }
}
