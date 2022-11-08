@extends('app.base')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
<div>
</div>
<div>
    <form action="{{ url('post/' . $post->id) }}" method="post">
    @csrf
    @method('put')
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
                <tr>
                    <td>
                        {{ $post -> id }}
                    </td>
                    <td>
                            <div class="form-group">
                                <input value="{{ old('message', $post->message) }}" required type="text" minlength="3" maxlength="80" class="form-control" id="titulo" name="titulo" placeholder="titulo">
                            </div>
                    </td>
                    <td>
                        {{ $post -> user -> name}}
                    </td>
                    <td>
                        {{ Carbon::parse($post -> created_at)->format('d/m/Y')}}
                    </td>
                    <td>
                        @if(session()->has('user'))
                            <button type="submit" class="btn btn-primary">Save</button>
                        @else
                            <a href="{{ url('post/' . $post -> id . '/edit') }}" style="pointer-events: none">Save</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('post/' . $post->id) }}">Show</a>
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
        <a href="{{ url('/') }}" class="btn btn-primary">back</a>
        &nbsp;
    
</div>
@endsection

@section('scripts')
<script src="{{ url('assets/js/bikeedit.js') }}"></script>
@endsection