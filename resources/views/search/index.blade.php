@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbo">
        <h1>Подсказки</h1>
        <p>Поиск подходяшего адреса</p>
    </div>

    <div id="content">
        <panel-search></panel-search>
    </div>
</div>
@endsection
