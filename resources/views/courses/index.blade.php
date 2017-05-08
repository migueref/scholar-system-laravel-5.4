@extends("layouts.app")
@section("content")
  <div class="big-padding text-center blue-grey white-text">
    <h1>Cursos</h1>

  </div>
    <div class="container">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td>ID</td>
            <td>Clave</td>
            <td>Curso</td>
            <td>Mensualidad</td>
            <td>Monto de titulación</td>
            <td>Fecha de creación</td>
            <td>Última actualización</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
           @foreach ($courses as $course)
            <tr>
              <td>{{$course->id}}</td>
              <td>{{$course->shortname}}</td>
              <td>{{$course->name}}</td>
              <td>{{$course->monthly_payment}}</td>
              <td>{{$course->degree_payment}}</td>
              <td>{{$course->created_at}}</td>
              <td>{{$course->updated_at}}</td>
              <td>
                <a class="btn btn-info"href="{{url('/courses/'.$course->id.'/edit')}}">Editar</a>
                @include('courses.delete',['course'=>$course])
              </td>

            </tr>
           @endforeach
        </tbody>
      </table>
    </div>
    <div class="floating">
      <a href="{{url('/courses/create')}}" class="btn btn-default btn-fab bottom right"><i class="material-icons">add</i></a>
    </div>
@endsection
