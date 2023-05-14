@extends('./layouts\admin')
@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">publications</div>
                <div class="card-body">

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>prix</th>

            <th>type</th>
            <th>description</th>
            <th>Photos</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($pub as $ch)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ch->PRIX}}</td>

            <td>{{ $ch->TYPE }}</td>
            <td class="small text-muted">{{ $ch->DESCRIPTION}}</td>
            <td>
                <img src="{{ asset($ch->PHOTO) }}" width= '50' height='50' class="img img-responsive" />
            </td>
            <td><a class="btn btn-danger btn-sm" href="/delete/pub2/{{$ch->ID_C_PUB}}">delete</a></td>
        

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
