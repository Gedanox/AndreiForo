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
                    <th scope="col">Last comment</th>
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
                        {{ $post -> idUser}}
                    </td>
                    <td>
                        <!--{{ $post -> fechapubli }}-->
                        {{ Carbon::parse($post -> created_at)->format('d/m/Y')}}
                    </td>
                    <td>
                        {{ $post -> idUser }}
                    </td>
                    <td>
                        <a href="javascript: void(0);"
                            class = "deleteRow"
                            data-name="{{ $post -> id }}"
                            data-url="{{ url('post/' . $post -> id ) }}">
                            delete
                        </a>
                    </td>
                    <td>
                        <a href="{{ url('post/' . $post -> id . '/edit') }}">edit</a>
                    </td>
                    <td>
                        <a href="{{ url('post/' . $post->id) }}">show</a>
                    </td>
                </tr>
               
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="{{ url('post/create') }}" class="btn btn-success">Create post</a>
    </div>
    <form action="" method="post" id="deleteForm">
        @csrf
        @method('delete')
    </form>
@endsection

@section('scripts')
<script src="{{ url('assets/js/bikeindex.js') }}"></script>
@endsection