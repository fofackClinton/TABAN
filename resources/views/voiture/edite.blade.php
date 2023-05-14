@extends('./layouts\admin1')
@section('page-content')

    <div class="container">
        <div class="row">

        <div class="card-header">ajoutez vos voitures</div>
        <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-success" > {{ session()->get('success') }} </div>

            @endif

            <form action="/voiture/update/{{ $v->ID_VEHICUL }}" method="post" enctype="multipart/form-data">
            @method('put')
              {!! csrf_field() !!}
              <label>Name</label></br>
              <input type="text" name="name" value="{{ $v->NOM  }}" id="name" class="form-control">
              @error('name')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror
          <input type="hidden" value="{{ Auth::user()->id }}" name="id">

              <div class="form-group">
                <label for="exampleFormControlSelect1">type</label>
                <select class="form-control"  name="type" id="exampleFormControlSelect1">
                  <option>4 X 4</option>
                  <option>BERLING</option>
                  <option>vanne</option>
                </select>
              </div></br>
                @error('type')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror
          <div class="form-group">
            <label for="exampleFormControlTextarea1">description</label>
            <textarea class="form-control"  name="desc" id="exampleFormControlTextarea1" rows="3">{{ $v->DESCRIPTION  }} </textarea>
          </div>
              @error('desc')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
          @enderror
          <label>prix</label></br>
          <input type="text" name="prix" value="{{ $v->PRIX }}" id="name" class="form-control">
          @error('prix')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
      @enderror
              <label for="exampleDataList" class="form-label">photo </label></br>
              <input class="form-control"  name="photo" type="file" id="photo"></br>
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
