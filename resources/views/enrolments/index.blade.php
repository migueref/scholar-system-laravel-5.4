@extends("layouts.app")
@section("content")
  <div class="big-padding text-center blue-grey white-text">
    <h1>Inscripciones</h1>

  </div>
    <div class="container">
      <div class="jumbotron">
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
                <td>
                  <a href="{{url('/enrolments/'.$enrolment->id.'/edit')}}">
                   Registrar colegiatura</a>
                 </button>
                </td>

              </tr>
              <tr>
                <!-- Modal -->
                <div class="modal fade" id="{{$enrolment->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$enrolment->id}}">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="{{$enrolment->id}}">{{$enrolment->group->shortname}}</h4>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </tr>

             @endforeach



          </tbody>
        </table>
      </div>
    </div>
    <div class="container">
      <div class="col-sm-5">

      </div>
      <div class="col-xs-12 col-sm-2">
        <?php echo $enrolments->render(); ?>
      </div>
      <div class="col-sm-5">

      </div>
    </div>

@endsection
