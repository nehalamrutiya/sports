@inject('User', 'App\User')
<div class="row">
    <div>
        {{ Form::hidden('test_id','secret',array('id'=>'test_id')) }}
        {{ Form::hidden('test_type_id','secret',array('id'=>'test_type_id')) }}
    </div>
    <div class="col-xs-12 center">
        <div class="form-group">
            <strong>Name </strong>
            {!! Form::select('user_id', $User::all()->pluck('name', 'id'), null, ['class'=>'form-control','style'=>'width:25%;margin:0 auto;']) !!}
        </div>
    </div>
    <div class="col-xs-12 center">
        <div class="form-group">
            <strong>Distance (meter) </strong>
            {!! Form::text('distance', null, ['placeholder'=>'Distance','class'=>'form-control','style'=>'width:25%;margin:0 auto;']) !!}
        </div>
    </div>
    <div class = "col-xs-12 center">
        <button type = "submit" class = "btn btn-primary btn-lg">Save</button>
    </div>
</div>