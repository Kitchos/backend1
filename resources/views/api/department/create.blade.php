@extends('main')
@section('content')
    <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" value="{{ old('name') }}" placeholder="Введите имя">
        <span>{{ $errors->first('name') }}</span>
        <br>

        <button>Сохранить</button>

    </form>
@endsection
