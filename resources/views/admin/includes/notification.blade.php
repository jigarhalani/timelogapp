@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('message'))
    <div class="alert {{Session::get('message.type')}}"> {{ Session::get('message.msg') }}</div>
@endif

{{-- Used for Common noticiation by ajax request --}}
<div class="wrapper">
    <div class="notification-container">

    </div>
</div>