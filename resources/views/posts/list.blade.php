@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    My Posts                    
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-12" style="text-align: end;">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">+ New</a>
                    </div>
                    <div class="clearfix"></div>
                    <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                            <tr>
                                <th>Title</th>
                                <th>Publication Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td><a href="{{ url('posts/'.$post->id) }}"> {{ $post->title }}</a></td>
                                <td> {{ $post->publication_date }}</td>
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
