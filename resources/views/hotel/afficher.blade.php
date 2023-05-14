@extends('./layouts\admin3')
@section('page-content')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">hotels</div>
                    <div class="card-body">
                       
                        <div class="table-responsive">
                            <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>categori</th>
            <th>localisation</th>
            <th>rccm</th>
            <th>ville</th>
            <th>photo</th>
            <th>action</th>


        </tr>
    </thead>
    <tbody>
        @forelse ($hotel as $ho)
            <tr>
             <td>{{ $loop->iteration }}</td>
            <td>{{ $ho->NOM_HOTEL }}</td>
            <td>{{ $ho->CATEGORIE_HOTEL }}</td>
            <td>{{ $ho->LOCALISATION }}</td>
            <td>{{ $ho->RCCM}}</td>
            <td>{{ $ho->VILLE}}</td>
            <td>
                <img src="{{ asset($ho->DOCUMENT) }}" width= '50' height='50' class="img img-responsive" />
            </td>
            <td><a <a class="btn btn-success btn-sm" href="/hotel/delete/{{$ho->ID_HOTEL}}">delete</a></td>

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
@endsection
