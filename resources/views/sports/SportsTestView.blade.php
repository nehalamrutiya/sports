@extends('layouts.app')
@section('content')
@inject('userassociate','App\Http\Controllers\UserAssociateWithTestController')
@inject('user','App\User')
<div class="row">
    <div class="col-sm-12">
        <div class="center heading">
            {{$TestTypeName." D. ".$TestDate}}
        </div>  
    </div>
</div>
<div class="row" style="padding: 10px;"></div>
@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<table class="table table-borderless" align="center" style="width:60%">
    <tr>
        <th></th>
        <th class="center">Ranking</th>
        <th class="center">Distance (meter)</th>
        <th class="center">Fitness Rating</th>
    </tr>

@foreach($SportsTest as $key=>$Test)
    <tr>
        <td>{{++$key}}</td>
        <td class="center">
            @if ($user::isCoach(Auth::user()))
                <a href="{{route('athlete.edit',$Test->athlete_id)}}" data-toggle = "modal" data-target = "#EditAthleteModal" data-testtypeid ="{{$TestTypeId}}" data-sportstestid ="{{request()->route('id')}}">{{$Test->name}}</a>
            @else
                {{$Test->name}}
            @endif
        </td>
        <td class="center">{{$Test->distance}}</td>
        <td class="center">{{$userassociate->fitnessRating($Test->user_id)}}</td>
    </tr>
@endforeach
</table>

<div class="row">
    <div class="col-sm-12">
        <div class="center">
            (Click on player to change data)
        </div>  
    </div>
</div>
@if ($user::isCoach(Auth::user()))
<div class="row">
    <div class="col-sm-12">
        <div class="center">
            <button class = "btn btn-primary btn-lg button test" data-toggle = "modal" data-target = "#AddAthleteModal" data-testtypeid = "{{$TestTypeId}}" data-sportstestid = "{{$SportsTestId}}">ADD NEW ATHLETE TO TEST</button>
        </div>  
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="center">
            <button class = "btn btn-primary btn-lg button" data-toggle = "modal" data-target = "#DeleteTestModal">DELETE TEST</button>
        </div>  
    </div>
</div>
@endif
<!-- Add Modal -->
<div class = "modal fade" id = "AddAthleteModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title center" id = "myModalLabel">
               ADD NEW ATHLETE TO TEST
            </h4>
         </div>
         
         <div class = "modal-body">
            {!! Form::open(['route'=>'athlete.store','method' => 'POST'])!!}
               @include('sports.SportsAthleteCreate') 
            {!! Form::close() !!} 
         </div>
      </div>
   </div>
</div><!-- /.modal -->

<!-- Edit Modal -->
<div class = "modal fade" id = "EditAthleteModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   <div class = "modal-dialog">
      <div class = "modal-content">
            @if(isset($athlete))
            @include('sports.SportsAthleteEdit',$athlete,$SportsTestId)
            @endif
      </div>
   </div>
</div><!-- /.modal -->

<!-- Delete Modal -->
<div class = "modal fade" id = "DeleteTestModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   <div class = "modal-dialog">
      <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                      &times;
                </button>

                <h4 class = "modal-title center" id = "myModalLabel">
                   CONFIRM
                </h4>
            </div>
          <div class = "modal-body" style="padding-top: 15px;padding-right: 90px;padding-left: 90px;padding-bottom: 140px;">
                <div class = "col-xs-12">
                    <span class="center">Are you sure you want to delete this test?</span>
                    <div class = "col-xs-12 center" style="margin-bottom: 10px;">
                        {!! Form::open(['method'=>'DELETE','route'=>['sportstest.destroy',$SportsTestId],'class'=>'delete'])!!}
                        {!! Form::submit('YES',['class'=>'btn btn-primary btn-lg'])!!}
                        {!! Form::close() !!}

                        <button type = "button" class = "btn btn-primary btn-lg button" data-dismiss = "modal" aria-hidden = "true">NO</button>
                    </div>
                </div>
           </div>
      </div>
   </div>
</div><!-- /.modal -->

@endsection
