@extends('./layouts\admin3')
@section('page-content')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Agence</div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>ville</th>
                                        <th>RCCM</th>
                                        <th>DOCUMENT</th>

                                        <th>action</th>

                                </thead>
                                </thead>
                                <tbody>
                                    @forelse ($agence as $ag)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ag->NOM }}</td>
                                        <td>{{ $ag->VILLE}}</td>
                                        <td>{{ $ag->RCCM}}</td>
                                        <td>
                                            <img src="{{ asset($ag->DOCUMENT) }}" width= '50' height='50' class="img img-responsive" />
                                        </td>

                                        <td><a class="btn btn-danger btn-sm" href="/agence/delete/{{$ag->ID_AGENCE}}">EFFACER</a></td>
                                    </tr>
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
