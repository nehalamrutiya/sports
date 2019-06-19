@inject('User', 'App\User')
<div class = "modal-header">
    <a href="{{route('sportstest.view',$athlete->test_id)}}" class = "close" aria-hidden = "true">
          &times;
    </a>

    <h4 class = "modal-title center" id = "myModalLabel">
       CHANGE DATA FOR ATHLETE
    </h4>
</div>
<div class = "modal-body">
    {!! Form::model($athlete,['route' => ['athlete.update',$athlete->id], 'method' => 'POST'])!!}
<div class="row">
    <div class="col-xs-12 center">
        <div class="form-group">
            <strong>Name </strong>
            {!! Form::select('user_id', $User::all()->pluck('name', 'id'), $athlete->user_id, ['class'=>'form-control','style'=>'width:25%;margin:0 auto;']) !!}
        </div>
    </div>
    <div class="col-xs-12 center">
        <div class="form-group">
            <strong>Distance (meter) </strong>
            {!! Form::text('distance', $athlete->distance, ['placeholder'=>'Distance','class'=>'form-control','style'=>'width:25%;margin:0 auto;']) !!}
        </div>
    </div>
    <div class = "col-xs-12 center">
        <a href="{{ route('athlete.destroy',$athlete->id)}}" class = "btn btn-primary btn-lg" style="margin-bottom: 5px;">DELETE ATHLETE FROM TEST</a>
    </div>
    <div class = "col-xs-12 center">
        <button type = "submit" class = "btn btn-primary btn-lg">SAVE</button>
    </div>
</div>
    {!! Form::close() !!}
</div>
    