{{ Form::model($goalTracking, ['route' => ['goaltracking.update', $goalTracking->id], 'method' => 'PUT','enctype'=>'multipart/form-data']) }}
<div class="modal-body">
    <div class="text-end">
        @if (module_is_active('AIAssistant'))
            @include('aiassistant::ai.generate_ai_btn',['template_module' => 'goal tracking','module'=>'Performance'])
        @endif
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('branch', !empty(company_setting('hrm_branch_name')) ? company_setting('hrm_branch_name') : __('Branch'), ['class' => 'col-form-label']) }}
                {{ Form::select('branch', $brances, null, ['class' => 'form-control ', 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('goal_type', __('GoalTypes'), ['class' => 'col-form-label']) }}
                {{ Form::select('goal_type', $goalTypes, null, ['class' => 'form-control ', 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('start_date', __('Start Date'), ['class' => 'col-form-label']) }}
                {{ Form::date('start_date', null, ['class' => 'form-control ', 'autocomplete' => 'off', 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('end_date', __('End Date'), ['class' => 'col-form-label']) }}
                {{ Form::date('end_date', null, ['class' => 'form-control ', 'autocomplete' => 'off', 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('subject', __('Subject'), ['class' => 'col-form-label']) }}
                {{ Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Enter subject', 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('target_achievement', __('Target Achievement'), ['class' => 'col-form-label']) }}
                {{ Form::text('target_achievement', null, ['class' => 'form-control', 'placeholder' => 'Enter target achievement']) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('description', __('Description'), ['class' => 'col-form-label']) }}
                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Enter description']) }}
            </div>
        </div>
        @if (module_is_active('CustomField') && !$customFields->isEmpty())
            <div class="col-md-12">
                <div class="tab-pane fade show" id="tab-2" role="tabpanel">
                    @include('customfield::formBuilder',['fildedata' => $goalTracking->customField])
                </div>
            </div>
        @endif
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('status', __('Status'), ['class' => 'col-form-label']) }}
                {{ Form::select('status', $status, null, ['class' => 'form-control ']) }}
            </div>
        </div>
        <div class="col-md-12">
            <fieldset id='demo1' class="rate">
                <input class="stars" type="radio" id="rating-5" name="rating" value="5"
                    {{ $goalTracking->rating == 5 ? 'checked' : '' }}>
                <label class="full" for="rating-5" title="Awesome - 5 stars"></label>
                <input class="stars" type="radio" id="rating-4" name="rating" value="4"
                    {{ $goalTracking->rating == 4 ? 'checked' : '' }}>
                <label class="full" for="rating-4" title="Pretty good - 4 stars"></label>
                <input class="stars" type="radio" id="rating-3" name="rating" value="3"
                    {{ $goalTracking->rating == 3 ? 'checked' : '' }}>
                <label class="full" for="rating-3" title="Meh - 3 stars"></label>
                <input class="stars" type="radio" id="rating-2" name="rating" value="2"
                    {{ $goalTracking->rating == 2 ? 'checked' : '' }}>
                <label class="full" for="rating-2" title="Kinda bad - 2 stars"></label>
                <input class="stars" type="radio" id="technical-1" name="rating" value="1"
                    {{ $goalTracking->rating == 1 ? 'checked' : '' }}>
                <label class="full" for="technical-1" title="Sucks big time - 1 star"></label>
            </fieldset>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <input type="range" class=" slider  w-100 mb-0 " name="progress" id="myRange"
                    value="{{ $goalTracking->progress }}" min="1" max="100"
                    oninput="ageOutputId.value = myRange.value" style="background-color: #000000;">
                <output name="ageOutputName" id="ageOutputId">{{ $goalTracking->progress }}</output>
                %
            </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Save Changes') }}" class="btn btn-primary">
</div>
{{ Form::close() }}
