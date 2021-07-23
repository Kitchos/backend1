@extends('main')
@section('content')
    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Введите имя">
        <span>{{ $errors->first('first_name') }}</span>
        <br>

        <input type="text" name="surname" value="{{ old('surname') }}" placeholder="Введите фамилию">
        <span>{{ $errors->first('surname') }}</span>
        <br>

        <input type="text" name="patronymic" value="{{ old('patronymic') }}" placeholder="Введите отчество">
        <span>{{ $errors->first('patronymic') }}</span>
        <br>

        <input type="text" name="sex" value="{{ old('sex') }}" placeholder="Введите пол">
        <span>{{ $errors->first('sex') }}</span>
        <br>

        <input type="number" name="wage" value="{{ old('wage') }}" placeholder="Введите зп">
        <span>{{ $errors->first('wage') }}</span>
        <br>

        <select name="department_ids[]" size="2" multiple>
            @foreach($departments as $department)
            <option @if(!empty(old('department_ids')) && in_array($department->id, old('department_ids'))) selected @endif value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
        </select>
        <span>{{ $errors->first('department_ids') }}</span>
        <br>

        <button>Сохранить</button>

    </form>
@endsection
