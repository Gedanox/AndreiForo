@extends('app.base')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="row" style="margin-top: 8px;">
        <table class="table table-striped" id="bikeTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Text</th>
                    <th scope="col">Author</th>
                    <th scope="col">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        {{ $post -> id }}
                    </td>
                    <td>
                        {{ $post -> message }}
                    </td>
                    <td>
                        {{ $post -> user -> name}}
                    </td>
                    <td>
                        <!--{{ $post -> fechapubli }}-->
                        {{ Carbon::parse($post -> created_at)->format('d/m/Y')}}
                    </td>
                    <td>
                        @if(session()->has('user'))
                            <a href="{{ url('post/' . $post -> id . '/edit') }}">edit</a>
                        @else
                            <a href="{{ url('post/' . $post -> id . '/edit') }}" style="pointer-events: none">edit</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('post/' . $post->id) }}">show</a>
                    </td>
                </tr>
               
                @endforeach
            </tbody>
        </table>
    </div>
    @if(session()->has('user'))
    <div class="row">
        <a href="{{ url('post/create') }}" class="btn btn-success">Create Post</a>
    </div>
    @endif
    
    <form action="" method="post" id="deleteForm">
        @csrf
        @method('delete')
    </form>
@endsection

@section('scripts')
<script src="{{ url('assets/js/bikeindex.js') }}"></script>
@endsection