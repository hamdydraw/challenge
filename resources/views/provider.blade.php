@extends('layouts.provider') 

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Provider Dashboard</div>

                <div class="card-body">
                    <a href="{{ route('provider.newproduct') }}" >
                       <h1> Add Product </h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection