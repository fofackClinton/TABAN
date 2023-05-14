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
                                        <th>statut</th>


                                </thead>
                                </thead>
                                <tbody>
                                    @forelse ($us as $ag)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ag->name }}</td>
                                        <td>{{ $ag->etat}}</td>




                                        <td><a class="btn btn-warning btn-sm" href="/utilisateur/onoff/{{$ag->id}}">on-off</a></td>

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
