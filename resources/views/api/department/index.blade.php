
@extends('main')
@section('content')
    <table>
        @foreach($departments as $department)
        <tr>
            <td>{{$department->name}}</td>
            <td >{{$department->employee->count()}}</td>
            <td>{{$department->employee->max('wage')}}</td>
            <td>
                <a href="{{ route('department.edit', $department) }}">Редактироваать</a>
            </td>
            <td>
                <form action="{{ route('department.destroy', $department) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Удалить</button>
                </form>
                <span>{{ $errors->first('department_error'.$department->id) }}</span>
            </td>
        <tr>
        @endforeach
    </table>

<a href="{{ route('department.create') }}">Создать</a>
@endsection
