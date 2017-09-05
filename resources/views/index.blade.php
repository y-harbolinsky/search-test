@extends('layouts.layout')

@section('title')
    Search test
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Search House:</h3>
            <form id="search_form" action="" method="post" enctype="multipart/form-data">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name:</label>
                    <input class="form-control-sm" type="text" name="name" id="name">
                </div>
                <div class="form-group {{ $errors->has('bedrooms') ? 'has-error' : '' }}">
                    <label for="bedrooms">Bedrooms:</label>
                    <input class="form-control-sm" type="text" name="bedrooms" id="bedrooms">
                </div>
                <div class="form-group {{ $errors->has('bathrooms') ? 'has-error' : '' }}">
                    <label for="bathrooms">Bathrooms:</label>
                    <input class="form-control-sm" type="text" name="bathrooms" id="bathrooms">
                </div>
                <div class="form-group {{ $errors->has('storeys') ? 'has-error' : '' }}">
                    <label for="storeys">Storeys:</label>
                    <input class="form-control-sm" type="text" name="storeys" id="storeys">
                </div>
                <div class="form-group {{ $errors->has('garages') ? 'has-error' : '' }}">
                    <label for="garages">Garages:</label>
                    <input class="form-control-sm" type="text" name="garages" id="garages">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="garages">Price from:</label>
                        <input class="form-control-sm" type="text" name="priceFrom" id="priceFrom">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="garages" class="mr-2">Price to:</label>
                        <input class="form-control-sm" type="text" name="priceTo" id="priceTo">
                    </div>
                </div>

                <button type="button" id="search" class="btn btn-primary">Search</button>
                <input type="hidden" name="_token" value="{{ csrf_token()  }}">
            </form>
        </div>
    </div>
    <br/>
    <div id="loader" class="hidden"></div>
    <div class="row" id="results"></div>

    <script>
        var url = '{{ route('search') }}';
    </script>
@endsection
