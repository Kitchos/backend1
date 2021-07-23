@extends('main')
@section('content')
<form action="{{ route('employee.update', $employee) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}" placeholder="Введите имя">
    <span>{{ $errors->first('first_name') }}</span>
    <br>

    <input type="text" name="surname" value="{{ old('surname', $employee->surname) }}" placeholder="Введите фамилию">
    <span>{{ $errors->first('surname') }}</span>
    <br>

    <input type="text" name="patronymic" value="{{ old('patronymic', $employee->patronymic) }}" placeholder="Введите отчество">
    <span>{{ $errors->first('patronymic') }}</span>
    <br>

    <input type="text" name="sex" value="{{ old('sex', $employee->sex) }}" placeholder="Введите пол">
    <span>{{ $errors->first('sex') }}</span>
    <br>

    <input type="number" name="wage" value="{{ old('wage', $employee->wage) }}" placeholder="Введите зп">
    <span>{{ $errors->first('wage') }}</span>
    <br>

    <?php
    foreach($employee->department as $key => $department){
        $department_id[$key] = $department->id;
    }
    ?>
    <select name="department_ids[]" size="2" multiple>
        @foreach($departments as $department)
            <option @if(in_array($department->id, old('department_ids', $department_id))) selected @endif value="{{$department->id}}">{{$department->name}}</option>
        @endforeach
    </select>
    <span>{{ $errors->first('department_ids') }}</span>
    <br>

    <button>Сохранить</button>

</form>
@endsection
