@extends('main')
@section('content')
    <table>
        <tr>
            <th></th>
            @foreach($departments as $department)
                <th>{{$department->name}}</th>
            @endforeach
        </tr>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->first_name}} {{$employee->surname}}</td>
                <?php
                $department_id =[];
                foreach($employee->department as $key => $department){
                    $department_id[$key] = $department->id;
                }
                ?>
                @foreach($departments as $department)
                    @if(!empty($department_id) && in_array($department->id, $department_id))
                        <td>&#10003;</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            <tr>
        @endforeach
    </table>
@endsection

