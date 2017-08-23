@if (count($errors))
    <ul class="list-unstyled">
        @foreach($errors->all() as $error)
            <li class="text-warning">{{ $error }}</li>
        @endforeach
    </ul>
@endif