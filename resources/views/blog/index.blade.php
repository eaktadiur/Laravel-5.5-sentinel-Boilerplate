@extends('layouts.app')

@section('content')

    {{--{{dump($blog)}}--}}
    <div class="container">
        <table class="table">
            <thead>
            <th>S/N</th>
            <th>Name</th>
            <th>Slug</th>
            </thead>
            <tbody>
            @foreach($blog as $key =>$row)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{!! $row->title !!}</td>
                    <td>{{$row->slug}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
