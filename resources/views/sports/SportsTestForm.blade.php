@inject('SportsTestTypes', 'App\SportsTestTypes')
<div class="row">
    <div class="col-xs-12 center">
        <div class="form-group">
            <strong>Type </strong>
            {!! Form::select('test_type_id', $SportsTestTypes::all()->pluck('test_type_name', 'id'), null, ['class'=>'form-control','style'=>'width:25%;margin:0 auto;']) !!}
        </div>
    </div>
    <div class="col-xs-12 center">
        <div class="form-group">
            <strong>Date </strong>
            {!! Form::date('test_date', null, ['id'=>'datepicker','placeholder'=>'Date','class'=>'form-control','style'=>'width:25%;margin:0 auto;']) !!}
        </div>
    </div>
    <div class = "col-xs-12 center">
            <button type = "submit" class = "btn btn-primary">
               CREATE TEST
            </button>
    </div>
</div>