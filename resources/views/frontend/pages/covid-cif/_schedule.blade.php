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
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="schedule_date" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label>Schedule</label>
                    <div>
                        @foreach($schedules as $i => $schedule)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="schedule" id="inlineRadio{{ $i }}" value="{{ $schedule->id }}" {{ $loop->first ? 'required' : '' }} />
                            <label class="form-check-label" for="inlineRadio{{ $i }}">{{ $schedule->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
