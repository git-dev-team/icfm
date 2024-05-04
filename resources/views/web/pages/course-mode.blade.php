
 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-dark" id="myModal">{{ $course->title }}</h4>
</div>
<div class="modal-body">
    <label class="text-dark">Choose Course Mode</label>
<form method="post" action="{{ route('pay-now') }}" onsubmit="return validateMode()" name="f4">
    <input type="hidden" name="course_id" value="{{ $course->id }}">
    @csrf
        <div class="radio">
    <?php foreach ($course_mode as $c_mode) { ?>
        <label class="radio-inline">
            <input type="radio" name="course_mode_id" onclick="getCourseFees(this.value,{{ $course->id }})" <?php    if ($fees->course_mode_id == $c_mode->id) {
        echo 'checked';
    } ?> value="{{ $c_mode->id }}">{{ $c_mode->title }}
        </label>
    <?php } ?>
    <span class="text-danger" id="cf1Error"></span>
    <div class="form-group mt-2">
        <input class="form-control" id="selected_course_fees" type="text" value="{{ $fees->amount }}" placeholder="Your Mood" disabled>
    </div>
        <button type="submit" class="btn btn-primary btn-style-1">Book Now</button>
</form>
</div>
