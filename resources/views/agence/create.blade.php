@extends('./layouts\app')
@section('page-content')


    <div class="container">
        <div class="row">

        <div class="card-header">crer votre agence</div>
        <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-success" > {{ session()->get('success') }} </div>

            @endif

            <form action="/agence/create" method="post" enctype="multipart/form-data">
            @method('post')
              {!! csrf_field() !!}
              <input type="hidden" value="{{ $var }}" name="id">
              <label>Name</label></br>
              <input type="text" name="name" id="name" class="form-control">
              @error('name')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror

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
                @error('ville')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror

              <label> *RCCM</label></br>
              <input type="text" name="rccm" id="rccm" class="form-control"></br>
              @error('rccm')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror

              <label for="exampleDataList" class="form-label">document legal de creation </label></br>
              <input class="form-control" name="photo" type="file" id="photo"></br>
              @error('photo')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror

              <input type="submit" value="Save" class="btn btn-success"></br>
          </form>

        </div>
      </div>
      </div>


@endsection
