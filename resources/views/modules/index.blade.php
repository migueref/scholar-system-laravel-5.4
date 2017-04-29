@extends("layouts.app")
@section("content")
  <div class="big-padding text-center blue-grey white-text">
    <h1>Módulos</h1>

  </div>
    <div class="container">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td>ID</td>
            <td>Nombre del módulo</td>
            <td>Número del módulo</td>
            <td>Actions</td>

          </tr>
        </thead>
        <tbody>
           @foreach ($modules as $module)
            <tr>
              <td>{{$module->id}}</td>
              <td>{{$module->shortname}}</td>
              <td>{{$module->number}}</td>
              <td>Actions</td>

            </tr>
           @endforeach
        </tbody>
      </table>
    </div>


@endsection
