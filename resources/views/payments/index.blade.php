@extends("layouts.app")
@section("content")
  <div class="big-padding text-center blue-grey white-text">
    <h1>Colegiatura </h1>
  </div>
    <div class="container">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td>ID</td>
            <td>Número</td>
            <td>Monto</td>
            <td>Tipo</td>
            <td>Referencia</td>
            <td>Banco</td>
            <td>Factura</td>
            <td>comentarios</td>
            <td>Fecha pago</td>
            <td>Modulo</td>
            <td>inscripción</td>
            <td>Acciones</td>
          </tr>
        </thead>
        <tbody>
           @foreach ($payments as $payment)
            <tr>
              <td>{{$payment->id}}</td>
              <td>{{$payment->number}}</td>
              <td>{{$payment->amount}}</td>
              <td>{{$payment->type}}</td>
              <td>{{$payment->reference}}</td>
              <td>{{$payment->bank->name}}</td>
              <td>{{$payment->bill}}</td>
              <td>{{$payment->description}}</td>
              <td>{{$payment->payment_date}}</td>
              <td>{{$payment->module->shortname}} {{$payment->module->number}}</td>
              <td>{{$payment->enrolment->id}}</td>
              <td>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#{{$payment->id}}">
                 Editar colegiatura
               </button>
              </td>

            </tr>
            <tr>
              <!-- Modal -->
              <div class="modal fade" id="{{$payment->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$payment->id}}">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="{{$payment->id}}">{{$payment->number}}</h4>
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
    <div class="container">
      <div class="col-sm-5">

      </div>
      <div class="col-xs-12 col-sm-2">
        <?php echo $payments->render(); ?>
      </div>
      <div class="col-sm-5">

      </div>
    </div>

@endsection
