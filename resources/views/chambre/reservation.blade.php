@extends('./layouts\app')
@section('page-content')
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="bt btn-success" href="#!">back</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">


            </div>
        </div>
    </nav>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset($pub->PHOTO) }}" /></div>
                <div class="col-md-6">

                    <h1 class="display-5 fw-bolder">{{ $pub->VILLE }}</h1>
                    <div class="fs-5 mb-5">
                        <span>{{ $pub->PRIX }} / jour</span>
                    </div>
                    @if (session()->has('success'))
                    <div class="alert alert-success" > {{ session()->get('success') }} </div>

                    @endif
                        <form action="/reservation/create1" method="post">
                            @method('post')

                         {!! csrf_field() !!}
                         <input type="hidden" value="{{  Auth::user()->id  }}" name="idd">
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Date debut</label>
                                <div class="col-sm-10">
                                  <input type="date" name="dateD" class="form-control">
                                </div>
                                <div class="row mb-3">
                                    <input type="hidden" value="{{ $pub->PHOTO }}" name="photo">
                                    <input type="hidden" name="id_pub" value="{{ $pub->ID_C_PUB }}" >
                                    <input type="hidden" value="{{ $pub->IDC }}" name="iduser">
                                    <label for="inputDate"  class="col-sm-2 col-form-label">Date fin</label>
                                    <div class="col-sm-10">
                                      <input type="date" name="dateF" class="form-control">
                                    </div>

                                    <div class="d-flex">

                                        <button class="btn btn-outline-success flex-shrink-0" type="submit">

                                            reserver
                                        </button>
                                    </div>

                        </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
@endsection
