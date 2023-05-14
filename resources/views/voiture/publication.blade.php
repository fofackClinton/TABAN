@extends('./layouts\admin1')
@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">publication</div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                         <tr>
             <th>#</th>
            <th>Nom</th>
            <th>Type</th>
            <th>description</th>
            <th>prix</th>
            <th>Photos</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($pub as $voiture)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $voiture->NOM }}</td>
            <td>{{ $voiture->TYPE }}</td>
            <td>{{ $voiture->DESCRIPTION }}</td>
            <td>{{ $voiture->PRIX }}</td>
            <td>
                <img src="{{ asset($voiture->PHOTO) }}" width= '50' height='50' class="img img-responsive" />
            </td>
            <td><a class="btn btn-danger btn-sm" href="/publication/delete/{{$voiture->ID_PUBLICATION}}">delete</a></td>


        </tr>
        @empty
            <h2>Aucune données disponible</h2>
        @endforelse

    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
