@extends ('layouts.app')

@section ('content')

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>

    @endif
    @if (Session::has('success'))
        <div class="alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif

    @include('inc.form.createNewAlbum')
   
@endsection
