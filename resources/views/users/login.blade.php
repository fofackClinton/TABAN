@extends('./layouts\app')
@section('page-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <H2>qui etes vous </H2>
                <div class="card-header"></div>

                <div class="card-body">
                    

                        
                            

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <a class="btn btn-primary" href="/users"> touriste</a>

                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <a class="btn btn-primary" href="/compteA"> agence de location</a>

                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <a class="btn btn-primary" href="/compteH"> hotel</a>

                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
