@extends('./layouts\admin')
@section('page-content')


    <div class="container">
        <div class="row">

        <div class="card-header">crer une chambre dans votre hotel</div>
        <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-success" > {{ session()->get('success') }} </div>

            @endif

            <form action="/chambre/update/{{ $c->ID_CHAMBRE  }}" method="post" enctype="multipart/form-data">
            @method('put')
              {!! csrf_field() !!}
              <input type="hidden" value="{{ Auth::user()->id }}" name="id">
              <div class="form-group">
                <label for="exampleFormControlSelect1">categorie</label>
                <select class="form-control"  name="cat" id="exampleFormControlSelect1">
                  <option>simple</option>
                  <option>doubles</option>
                  <option>suite</option>
                </select>
              </div></br>
              @error('name')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror

              <div class="form-group">
                <label for="exampleFormControlSelect1">type</label>
                <select class="form-control"  name="type" id="exampleFormControlSelect1">
                  <option>simple</option>
                  <option>luxe</option>
                  <option>grand luxe</option>
                </select>
              </div></br>
                @error('type')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror

          <div class="form-group">
            <label for="exampleFormControlTextarea1">description</label>
            <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"> {{ $c->DESCRIPTION  }} </textarea>
          </div>
              @error('desc')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror
          <label>prix</label></br>
          <input type="text" name="prix" value="{{ $c->PRIX }}" id="name" class="form-control">
          @error('prix')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
      @enderror
              <label for="exampleDataList" class="form-label">photo </label></br>
              <input class="form-control" name="photo" type="file" id="photo"></br>
              @error('photo')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror

              <input type="submit" value="actualiser" class="btn btn-success"></br>
          </form>

        </div>
      </div>
      </div>
@endsection
