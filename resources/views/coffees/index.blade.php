@extends('layouts.main')
@section('content')

    <h1 class="text-center" id="cof">Coffees</h1>
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 mt-5">
        <input id="search" type="search" class="form-control" placeholder="Search..." aria-label="Search">

        <div class="filter-calories mt-5 w-25">
            <h3>Фильтрация по калориям</h3>
            <label for="due">Калории от</label>
            <input type="number" class="form-control" id="due">

            <label for="due">Калории до</label>
            <input type="number" class="form-control" id="from">

            <button type="button" class="btn btn-secondary mt-2">Применить</button>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Type Name</th>
            <th scope="col">Calories</th>
            <th scope="col">Cats</th>
        </tr>
        </thead>
        <tbody id="tbody">
        @foreach($coffees as $coffee)
            <tr>
                <th scope="row">{{ $coffee->id }}</th>
                <td>{{ $coffee->name }}</td>
                <td>{{ $coffee->type_name }}</td>
                <td>{{ $coffee->calories }}</td>
                <td>
                    @foreach($coffee->cats as $cat)
                        {{ $cat->name }}
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('.btn-secondary').click(function () {
                $.ajax({
                    url: "{{ route('coffees.search') }}",
                    method: 'GET',
                    data: {
                        due: $('#due').val(),
                        from: $('#from').val()
                    },
                    success: function (response) {
                        $('#tbody').empty()
                        $.each(response, function (index, item) {
                            let cats = '';
                            $.each(item['cats'], function (i, v){
                                cats += v['name'] + ' ';
                            });

                            $('#tbody').append('<tr>' +
                                '<th scope="row">' + item['id'] + '</th>' +
                                '<td>' + item['name'] + '</td>' +
                                '<td>' + item['type_name'] + '</td>' +
                                '<td>' + item['calories'] + '</td>' +
                                '<td>' + cats + '</td>' +
                                '</tr>');
                        })
                    }
                })
            });
            $('#search').keyup(function () {
                var search = $('#search').val();

                $.ajax({
                    url: "{{ route('coffees.search') }}",
                    method: 'GET',
                    data: {
                        search: search
                    },
                    success: function (response) {
                        $('#tbody').empty()
                        $.each(response, function (index, item) {
                            let cats = '';
                            $.each(item['cats'], function (i, v){
                                cats += v['name'] + ' ';
                            });

                            $('#tbody').append('<tr>' +
                                '<th scope="row">' + item['id'] + '</th>' +
                                '<td>' + item['name'] + '</td>' +
                                '<td>' + item['type_name'] + '</td>' +
                                '<td>' + item['calories'] + '</td>' +
                                '<td>' + cats + '</td>' +
                                '</tr>');
                        })
                    }
                })
            })
        })
    </script>
@endsection
