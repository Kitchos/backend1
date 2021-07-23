
@extends('main')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

    <table>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->first_name}}</td>
            <td >{{$employee->surname}}</td>
            <td>{{$employee->patronymic}}</td>
            <td>{{$employee->sex}}</td>
            <td>{{$employee->wage}}</td>
            <td>
                <?php
                $array= [];
                foreach($employee->department as $key => $department){
                    $array[$key] = $department->name;
                }
                echo implode(', ', $array);
                ?>

            </td>
            <td>
                <a href="{{ route('employee.edit', $employee) }}">Редактироваать</a>
            </td>
            <td>
                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Удалить</button>
                </form>
            </td>
        <tr>
        @endforeach
    </table>

<a href="{{ route('employee.create') }}">Создать</a>
@endsection
