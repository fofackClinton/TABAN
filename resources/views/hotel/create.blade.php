@extends('./layouts\app')
@section('page-content')




<div class="container">
    <div class="row">

    <div class="card-header">crer votre hotel</div>
    <div class="card-body">
        @if (session()->has('success'))
        <div class="alert alert-success" > {{ session()->get('success') }} </div>

        @endif

        <form action="/hotel/create" method="post" enctype="multipart/form-data">
        @method('post')
          {!! csrf_field() !!}
          <label>Name</label></br>
          <input type="text" name="name" id="name" class="form-control">
          <input type="hidden" value="{{ $var }}" name="id">
          <div class="form-group"></br>
            <label for="exampleFormControlSelect1">categori</label>
            <select class="form-control" name="cat" id="exampleFormControlSelect1">
              <option>sans etoile</option>
              <option>1 etoile</option>
              <option>2 etoile</option>
              <option>3 etoiles</option>
              <option>4 etoiles</option>
              <option>5 etoiles</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">ville</label>
            <select class="form-control"  name="ville" id="exampleFormControlSelect1">
              <option>douala</option>
              <option>paris</option>
              <option>londre</option>
              <option> new-york</option>
              <option>yahoude</option>
              <option>bamenda</option>
            </select>
          </div></br>

          <label> *RCCM</label></br>
          <input type="text" name="rccm" id="rccm" class="form-control"></br>
          <label for="exampleDataList" class="form-label">document legal de creation </label></br>
          <input class="form-control" name="photo" type="file" id="photo"></br>


          <input type="submit" value="Save" class="btn btn-success"></br>
      </form>

    </div>
  </div>
  </div>


@endsection
