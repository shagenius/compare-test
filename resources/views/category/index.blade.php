@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts/admin-menu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories <span class="right"><a class="btn btn-primary" href="categories/create">Create</a></span></div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Active</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($categories as $category) { ?>
                            <tr>
                                <td><a href="{{route('categories.edit',$category->id)}}">{{ $category->id }}</a></td>
                                <td>{{ $category->name }}</td>
                                <td>@if($category->active) Yes @else No @endif</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-small btn-info">Edit</a> &nbsp;   
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display: inline;">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit" onclick="confirm('Are you sure you want to delete this category?'); return false;">Delete</button>
                                  </form>
                                </td>
                            </tr>
                        <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
