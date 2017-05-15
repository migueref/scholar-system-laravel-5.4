@extends("layouts.app")
@section("content")
  <div class="big-padding text-center blue-grey white-text">
    <h1>Panel de control</h1>

  </div>
    <div class="container">
      <div class="form-group col-md-4 col-sm-6 col-md-4 col-sm-6">
        {{ Form::label('group_id', 'Grupo', ['class' => 'control-label']) }}
        {{ Form::select('group_id',$groups,['class' => 'form-control'])}}
      </div>
    </div>
    <div class="floating">
      <a href="{{url('/students/create')}}" class="btn btn-default btn-fab bottom right"><i class="material-icons">search</i></a>

    </div>
@endsection
