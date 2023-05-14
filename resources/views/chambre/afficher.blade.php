@extends('./layouts\admin')
@section('page-content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Chambres</div>
                @if (session()->has('success'))
                <div class="alert alert-success" > {{ session()->get('success') }} </div>

                @endif
                <div class="card-body">
                    <a href="/chambre" class="btn btn-success btn-sm" title="Add New Contact">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New chambre
                    </a>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>prix</th>
            <th>categri</th>
            <th>type</th>
            <th>description</th>
            <th>Photos</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($chambre as $ch)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ch->PRIX}}</td>
            <td>{{ $ch->CATEGORI }}</td>
            <td>{{ $ch->TYPE }}</td>
            <td class="small text-muted">{{ $ch->DESCRIPTION}}</td>
            <td>
                <img src="{{ asset($ch->PHOTO_CHAMBRE) }}" width= '50' height='50' class="img img-responsive" />
            </td>
            <td><a class="btn btn-danger btn-sm" href="/chambre/delete/{{$ch->ID_CHAMBRE}}">delete</a></td>
            <td><a class="btn btn-success btn-sm" href="/chambre/edit/{{$ch->ID_CHAMBRE}}">update</a></td>
            <td><a class="btn btn-warning btn-sm" href="/chambre/publier/{{$ch->ID_CHAMBRE}}">publier</a></td>
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
