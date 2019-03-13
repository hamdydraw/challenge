@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products Cart</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                    {{ session()->get('message') }}
                    </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-warning">
                        {{ session()->get('error') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            
                          </tr>
                        
                         
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                            <th scope="row">{{$item->Product->id}}</th>
                            <td>{{$item->Product->title}}</td>
                            <td>{{$item->Product->price}}</td>
                        
                          </tr>
                           @endforeach 
                          
                           
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
