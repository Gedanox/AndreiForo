@extends('app.base')

@section('content')
<div>
    aquí va el contenido de create, se presenta el formulario con los campos
    que se han de introducir para dar de alta una bicicleta nueva
</div>
<div>
    <form action="{{ url('post') }}" method="post">
    @csrf
    <table class="table table-striped" id="bikeTable">
            <thead>
                <tr>
                    <th scope="col">Text</th>
                    <th scope="col">Author</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <input required type="text" maxlength="100" class="form-control" id="titulo" name="titulo" placeholder="titulo">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input required type="text" maxlength="80" class="form-control" id="titulo" name="titulo" placeholder="titulo">
                        </div>
                    </td>
                    <td>
                        @if(session()->has('user'))
                            <button type="submit" class="btn btn-primary">Save</button>
                        @else
                            <a href="{{ url('post/' . $post -> id . '/edit') }}" style="pointer-events: none">Save</a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
        <a href="{{ url('/') }}" class="btn btn-primary">back</a>
        &nbsp;
</div>
@endsection