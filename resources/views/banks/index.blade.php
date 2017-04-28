@extends("layouts.app")
@section("content")
  <div class="big-padding text-center blue-grey white-text">
    <h1>Banks</h1>

  </div>
    <div class="container">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td>ID</td>
            <td>Nombre de banco</td>
            <td>Actions</td>

          </tr>
        </thead>
        <tbody>
           @foreach ($banks as $bank)
            <tr>
              <td>{{$bank->id}}</td>
              <td>{{$bank->name}}</td>
              <td>Actions</td>

            </tr>
           @endforeach
        </tbody>
      </table>
    </div>


@endsection
