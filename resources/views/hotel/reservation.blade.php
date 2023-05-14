@extends('./layouts\admin')
@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">reservation</div>
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>photo</th>
            <th>debut</th>
            <th>fin</th>


        </tr>
    </thead>
    <tbody>
        @forelse ($ch as $chs)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <img src="{{ asset($chs->NOM) }}" width= '50' height='50' class="img img-responsive" />
            </td>
            <td>{{ $chs->DATE_DEBUT }}</td>
            <td>{{ $chs->DATE_FIN }}</td>


            <td><a class="btn btn-success btn-sm" href="">valider</a></td>

        </tr>
        @empty
            <h2>Aucune données disponible</h2>
        @endforelse

    </tbody>
</div>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
