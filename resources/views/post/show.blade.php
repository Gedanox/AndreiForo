@extends('app.base')

@section('content')
    @php
        use Carbon\Carbon;
        $comments = \App\Models\Comment::where(['id' => $post -> id])
    @endphp
<div>
    <table class="table table-striped" id="bikeTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Text</th>
                    <th scope="col">Author</th>
                    <th scope="col">Created</th>
                </tr>
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
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>
                        {{ $comment -> id }}
                    </td>
                    <td>
                        {{ $comment -> message }}
                    </td>
                    <td>
                        {{ $comment -> user -> name}}
                    </td>
                    <td>
                        <!--{{ $post -> fechapubli }}-->
                        {{ Carbon::parse($comment -> created_at)->format('d/m/Y')}}
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
    <br>
    <a href="{{ url('post') }}" class="btn btn-primary">back</a>
    &nbsp;
    <a href="{{ url('post/' . $post -> id . '/edit') }}" class="btn btn-primary">edit post</a>
    &nbsp;
    <button form="deleteForm" type="submit" class="btn btn-primary">delete post</button>
</div>
<form action="{{ url('post/' . $post->id) }}" method="post" id="deleteForm">
    @csrf
    @method('delete')
</form>
@endsection

@section('scripts')
<script src="{{ url('assets/js/bikeedit.js') }}"></script>
@endsection