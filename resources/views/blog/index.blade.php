@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table">
            <thead>
            <th>S/N</th>
            <th>Name</th>
            <th>Slug</th>
            </thead>
            <tbody>
            <?php print_r($blog); ?>
            @foreach($blog as $key =>$row)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><?php echo $row->name; ?></td>
                    {{--<td>{{$row->slug}}</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
