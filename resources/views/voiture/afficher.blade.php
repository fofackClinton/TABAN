@extends('./layouts\admin1')
@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">voitures</div>
                @if (session()->has('success'))
                <div class="alert alert-success" > {{ session()->get('success') }} </div>

                @endif
                <div class="card-body">
                    <a href="/voiture" class="btn btn-success btn-sm" title="Add New Contact">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br/>
                    <br/>
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
        @forelse ($voitures as $voiture)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $voiture->NOM }}</td>
            <td>{{ $voiture->TYPE }}</td>
            <td>{{ $voiture->DESCRIPTION }}</td>
            <td>{{ $voiture->PRIX }}</td>
            <td>
                <img src="{{ asset($voiture->PHOTO) }}" width= '50' height='50' class="img img-responsive" />
            </td>
            <td><a class="btn btn-danger btn-sm" href="/voiture/delete/{{$voiture->ID_VEHICUL}}">delete</a></td>
            <td><a class="btn btn-success btn-sm" href="/voiture/edit/{{$voiture->ID_VEHICUL}}">update</a></td>
            <td><a class="btn btn-warning btn-sm" href="/voiture/publier/{{$voiture->ID_VEHICUL}}">publier</a></td>
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
