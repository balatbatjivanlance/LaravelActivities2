@extends('layouts.app')


@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn button btn-info" href="/posts/create">Create New</a>
            <br><br>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>                
            @endif
            <div class="card">       
                <div class="card-body">
                    <table class="table">
                        <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Title </th>
                                    <th> Description </th>
                                    <th>  </th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $posts)
                              <tr>
                                    <td> {{ $posts->id }} </td>
                                    <td> {{ $posts->title }} </td>
                                    <td> {{ $posts->description }} </td>
                                    <td> <a  href="/posts/{{$posts->id}}" class="btn btn-info"> View </a> </td>
                                    <td> <a  href="/posts/{{$posts->id}}/edit" class="btn btn-warning"> Edit </a> </td>
                                    <td> 
                                        <form method="POST" action=" {{ route('posts.destroy', $posts->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                    Total # of Post  {{ $count }}
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection