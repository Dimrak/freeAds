@extends('layouts.app')
@section('content')
    @include('admin.nav-admin');
    <div class="container adminPanel mt-3">
        <form method="post" action=" {{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf
{{--            @method('POST')--}}
        <input type="text" name="subject" placeholder="Subject" class="form-control mt-1">
        <textarea name="message" id="message" class="form-control mt-1" placeholder="Enter message to user">

        </textarea>
        <select name="user">
            <option class="form-control mt-1">Choose a user</option>
            @foreach($users as $user)
                <option value=" {{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
            <select name="type">
                <option class="form-control mt-1">Choose message type</option>
                @foreach($types as $type)
                    <option value=" {{ $type->id }}">{{ ucfirst($type->type) }}</option>
                @endforeach
            </select>
        <button class="btn alert-success mt-1">Send</button>
        </form>
        <a class="badge badge-success p-2 mt-2" href="{{route('admin.index')}}">Back admin page</a>
    </div>


@endsection
