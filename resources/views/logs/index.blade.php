@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbo">
        <h1>Подсказки</h1>
        <p>Лог запросов с результатами</p>
    </div>

    <div id="content">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Запрос</th>
                <th>Результат</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->search }}</td>
                    <td>
                        <ul>
                            @foreach($log->result as $r)
                                <li>{{ $r }} </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
