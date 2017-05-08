@extends("layouts.app")
@section("content")
  <div class="big-padding text-center blue-grey white-text">
    <h1>Grupos</h1>

  </div>
    <div class="container">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td>ID</td>
            <td>Grupo</td>
            <td>Clave de curso</td>
            <td>Curso</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
           @foreach ($groups as $group)
            <tr>
              <td>{{$group->id}}</td>
              <td>{{$group->shortname}} </td>
              <td>{{$group->course->shortname}}</td>
              <td>{{$group->course->name}}</td>
              <td>
                <a class="btn btn-info"href="{{url('/groups/'.$group->id.'/edit')}}">Editar</a>
                @include('groups.delete',['group'=>$group])
              </td>
            </tr>
           @endforeach
        </tbody>
      </table>
    </div>
    <div class="floating">
      <a href="{{url('/groups/create')}}" class="btn btn-default btn-fab bottom right"><i class="material-icons">add</i></a>
    </div>
@endsection
