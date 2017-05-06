@extends("layouts.app")
@section("content")
  <div class="big-padding text-center blue-grey white-text">
    <h1>Estudiantes</h1>

  </div>
    <div class="container">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td>ID</td>
            <td>Nombres</td>
            <td>Apellido paterno</td>
            <td>Apellido materno</td>
            <td>Email</td>
            <td>Teléfono</td>
            <td>Móvil</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
           @foreach ($students as $student)
            <tr>
              <td>{{$student->id}}</td>
              <td>{{$student->firstname}} </td>
              <td>{{$student->middlename}}</td>
              <td>{{$student->lastname}}</td>
              <td>{{$student->email}}</td>
              <td>{{$student->phone}}</td>
              <td>{{$student->mobile}}</td>
              <td><a href="">
               Editar</a></td>
            </tr>
           @endforeach
        </tbody>
      </table>
    </div>
    <div class="floating">
      <a href="{{url('/students/create')}}" class="btn btn-default btn-fab bottom right"><i class="material-icons">add</i></a>

    </div>
@endsection
