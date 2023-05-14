@extends('./layouts\index')
@section('page-content')

@forelse ($pub as $pub)
<!-- Blog entries-->
@if (session()->has('success'))
<div class="alert alert-success" > {{ session()->get('success') }} </div>

@endif


    <!-- Featured blog post-->

    <div class="card mb-4">
        <div class="card-body"><h2 class="btn btn-outline-primary" w-100">CHAMBRE A {{$pub->VILLE}}</h2></div>

        <a href="#!"><img class="card-img-top" src="{{ asset($pub->PHOTO) }}" width= '800' height='300' /></a>

        <div class="card-body">
            <h2 class="card-title">chambre {{$pub->TYPE}}</h2>
            <div class="btn btn-warning"> {{$pub->PRIX}} CFA par jour</div>
            <p class="card-text">{{$pub->DESCRIPTION}}</p>
            <div ><a class="btn btn-primary w-100"  href="/reservation/chambre/{{ $pub->ID_C_PUB }}">reserver →</a></div>
        </div>
    </div>

@empty
<h2>Aucune données disponible</h2>
@endforelse

@endsection
