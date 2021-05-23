<!-- Modal -->
<div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduleModalLabel">Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/entries/' . $entry_schedule->entry_id . '/update/' . $entry_schedule->id .'?status=Resched') }}" method="POST" id="form-schedule">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="schedule_date" value="{{ $entry_schedule->schedule_date }}" class="form-control" form="form-schedule" required="" id="input-schedule-date">
                    </div>
                    <div class="form-group">
                        <label>Schedule</label>
                        <div class="row">
                            @foreach($schedules as $i => $schedule)
                            <div class="col-md-6 col-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input radio-schedule radio-slot-{{ $schedule->name }}" form="form-schedule" type="radio" name="schedule_id" id="inlineRadio{{ $i }}" value="{{ $schedule->id }}" {{ $loop->first ? 'required' : '' }} {{ $entry_schedule->schedule_id == $schedule->id ? 'checked' : '' }}/>
                                    <label class="form-check-label" for="inlineRadio{{ $i }}">{{ $schedule->name }}</label>
                                </div>
                                <div class="my-1 mb-2">
                                    <small>Available Slot: <span class="span-slot-{{ $schedule->name }}"></span></small>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form-schedule">Save</button>
            </div>
        </div>
    </div>
</div>