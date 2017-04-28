@extends("layouts.app")
@section("content")
  <div class="big-padding text-center blue-grey white-text">
    <h1>Inscripciones</h1>

  </div>
    <div class="container">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td>ID</td>
            <td>Grupo</td>
            <td>Curso</td>
            <td>Estudiante</td>
            <td>Estado</td>
            <td>Descuento</td>
            <td>Cargos</td>
            <td>comentarios</td>
            <td>Matrícula</td>
            <td>Fecha de registro</td>
            <td>Corte</td>
            <td>Acciones</td>
          </tr>
        </thead>
        <tbody>
           @foreach ($enrolments as $enrolment)
            <tr>
              <td>{{$enrolment->id}}</td>
              <td>{{$enrolment->group->shortname}} </td>
              <td>{{$enrolment->group->course->shortname}}</td>
              <td>{{$enrolment->student->firstname}} {{$enrolment->student->middlename}} {{$enrolment->student->lastname}}</td>
              <td>{{$enrolment->state}}</td>
              <td>{{$enrolment->discount}}</td>
              <td>{{$enrolment->surcharge}}</td>
              <td>{{$enrolment->description}}</td>
              <td>{{$enrolment->registration_number}}</td>
              <td>{{$enrolment->enrolment_date}}</td>
              <td>{{$enrolment->due_Date}}</td>
              <td>Actions</td>
            </tr>
           @endforeach
        </tbody>
      </table>
    </div>


@endsection
