@extends('layouts.main')
@section('content')
    <h1 class="text-center">Cats</h1>
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 mt-5">
        <input id="search" type="search" class="form-control" placeholder="Search..." aria-label="Search">
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Weight</th>
            <th scope="col">Coffee</th>
        </tr>
        </thead>
        <tbody id="tbody">
        @foreach($cats as $cat)
            <tr>
                <th scope="row">{{ $cat->id }}</th>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->weight }}</td>
                <td>
                    @foreach($cat->coffees as $coffee)
                        {{ $coffee->name }}
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
            $('#search').keyup(function () {
                var search = $('#search').val();

                $.ajax({
                    url: "{{ route('cats.search') }}",
                    method: 'GET',
                    data: {
                        search: search
                    },
                    success: function (response){
                        $('#tbody').empty()
                        $.each(response, function (index,item){
                            console.log(item)
                            let coffees = '';
                            $.each(item['coffees'], function (i, v){

                                coffees += v['name'] + ' ';
                            });
                            $('#tbody').append('<tr>'+
                                '<th scope="row">'+ item['id'] + '</th>' +
                            '<td>' + item['name'] +'</td>' +
                            '<td>' +  item['weight'] +'</td>' +
                            '<td>' +  coffees +'</td>' +
                                '</tr>');
                        })
                    }
                })
            })
        })
    </script>
@endsection
