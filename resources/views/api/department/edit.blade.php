@extends('main')
@section('content')
<form action="{{ route('department.update', $department) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ old('name', $department->name) }}" placeholder="Введите имя">
    <span>{{ $errors->first('name') }}</span>
    <br>

    <button>Сохранить</button>

</form>
@endsection
