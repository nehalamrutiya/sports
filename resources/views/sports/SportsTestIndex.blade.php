@extends('layouts.app')
@section('content')
@inject('sportstestc','App\Http\Controllers\SportsTestController')
@inject('user','App\User')
<div class="row">
    @if ($user::isCoach(Auth::user()))
        <div class="col-sm-12">
            <div class="center">
                <button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target = "#myModal">
                CREATE NEW TEST</button>
            </div>  
        </div>
    @endif
</div>
<div class="row" style="padding: 10px;"></div>
@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<table class="table table-borderless" align="center" style="width:60%">
    <tr>
        <th class="center">Date</th>
        <th class="center">Number of participants</th>
        <th class="center">Test Type</th>
    </tr>

    @foreach($SportsTests as $SportsTest)
    <tr>
        <td class="center">{{$SportsTest->test_date}}</td>
        <td class="center">{{$sportstestc->numberOfParticipants($SportsTest->id)}}</td>
        <td class="center"><a href="{{route('sportstest.view',$SportsTest->id)}}">{{$SportsTest->test_type_name}}</a></td>
    </tr>
    @endforeach
</table>
<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title center" id = "myModalLabel">
               CREATE NEW TEST
            </h4>
         </div>
         
         <div class = "modal-body">
            {!! Form::open(['route' => 'sportstest.store', 'method' => 'POST'])!!}
            @include('sports.SportsTestForm') 
            {!! Form::close() !!}
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
