@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts/admin-menu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Showing category # {{ $category->id }} - {{ $category->name }}</div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                        <div class="jumbotron text-center">
                        <p>
                            <strong>Name:</strong> {{ $category->name }}<br>
                            <strong>Active:</strong> @if ($category->active===0) Yes @else No @endif                        
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
