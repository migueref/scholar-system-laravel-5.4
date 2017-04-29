@extends("layouts.app")
@section("content")
  <div class="form-control white black-text">
    <a class="form-control white black-text" href="{{url('/enrolments')}}">Regresar a inscripciones</a>
  </div>
  <div class=" text-center ">
    <h1>Registro</h1>

  </div>
    <div class="container">
      <div class="col-xs-12">
        <div class="col-xs-12">
          <div class="jumbotron col-sm-12">
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
                </tr>
              </thead>
              <tbody>
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
                            <button type="button" class="btn btn-primary">Guardar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </tr>
              </tbody>
            </table>
          </div>

        </div>
        <div class="jumbotron col-sm-6">
          {!!Form::open(['url' => '/payments', 'method' => 'POST']) !!}
          <h2>Registrar colegiatura</h2>
          <div class="form-group">
            {{ Form::number('number','',['class' => 'form-control', 'placeholder'=>'Número de colegiatura'])}}
          </div>
          <div class="form-group">
            {{ Form::number('amount','',['class' => 'form-control', 'placeholder'=>'Monto'])}}
          </div>
          <div class="form-group">
            {{ Form::text('type','',['class' => 'form-control', 'placeholder'=>'Tipo'])}}
          </div>
          <div class="form-group">
            {{ Form::text('reference','',['class' => 'form-control', 'placeholder'=>'Referencia'])}}
          </div>
          <div class="form-group">
            {{ Form::label('bank_id', 'Banco', ['class' => 'control-label']) }}
            {{ Form::select('bank_id',$banks,['class' => 'form-control', 'placeholder'=>'banco'])}}
          </div>
          <div class="form-group">
            {{ Form::text('bill','',['class' => 'form-control', 'placeholder'=>'Factura'])}}
          </div>
          <div class="form-group">
            {{ Form::text('description','',['class' => 'form-control', 'placeholder'=>'Comentarios'])}}
          </div>
          <div class="form-group">
            {{ Form::date('payment_date','',['class' => 'form-control', 'placeholder'=>'Comentarios'])}}
          </div>
          <div class="form-group">
            {{ Form::label('module_id', 'Módulo', ['class' => 'control-label']) }}

            {{ Form::select('module_id',$modules,['class' => 'form-control', 'placeholder'=>'Módulo'])}}
          </div>
          <div class="form-group">

            {{ Form::hidden('enrolment_id',$enrolment->id,['class' => 'form-control', 'placeholder'=>'Módulo'])}}
          </div>
          <div class="form-group text-right">
            <input type="submit" name="" value="Save" class="btn btn-success">
          </div>
          {!! Form::close() !!}
        </div>

         <div class="col-sm-6">
           @foreach ($payments as $payment)
           <div class="col-xs-12 jumbotron">
             {!!Form::open(['url' => '/payments', 'method' => 'POST']) !!}
             <h2>Pagos realizados</h2>
             <div class="form-group">
               <label for="">Número de colegiatura</label>
               {{ Form::number('number',$payment->number,['class' => 'form-control', 'placeholder'=>'Número de colegiatura'])}}
             </div>
             <div class="form-group">
               <label for="">Monto</label>

               {{ Form::number('amount',$payment->amount,['class' => 'form-control', 'placeholder'=>'Monto'])}}
             </div>
             <div class="form-group">
               <label for="">Tipo</label>

               {{ Form::text('type',$payment->type,['class' => 'form-control', 'placeholder'=>'Tipo'])}}
             </div>
             <div class="form-group">
               <label for="">Referencia</label>

               {{ Form::text('reference',$payment->reference,['class' => 'form-control', 'placeholder'=>'Referencia'])}}
             </div>
             <div class="form-group">
               <label for="">Banco</label>

               {{ Form::text('bank',$payment->bank->name,['class' => 'form-control', 'placeholder'=>'banco'])}}
             </div>
             <div class="form-group">
               <label for="">Número de factura</label>

               {{ Form::text('bill',$payment->bill,['class' => 'form-control', 'placeholder'=>'Factura'])}}
             </div>
             <div class="form-group">
               <label for="">Comentarios</label>

               {{ Form::text('description',$payment->description,['class' => 'form-control', 'placeholder'=>'Comentarios'])}}
             </div>
             <div class="form-group">
               <label for="">Fecha del pago</label>

               {{ Form::date('payment_date',$payment->payment_date,['class' => 'form-control', 'placeholder'=>'Comentarios'])}}
             </div>
             <div class="form-group text-right">

               <input type="submit" name="" value="Actualizar" class="btn btn-success">
             </div>
             {!! Form::close() !!}
           </div>
           @endforeach
           <div class="col-xs-12">
             <?php echo $payments->render(); ?>
           </div>
         </div>


      </div>
    </div>

@endsection
