@extends('layouts.app')
@section('content')
    @include('admin.nav-admin');
    <div class="container adminPanel mt-3">
        <my-button text="" type="submit"></my-button>
    @if(session()->has('message'))
            <div class="alert alert-success w-25 d-block mr-auto ml-auto text-center" role="alert">
                {{session()->get('message')}}
            </div>
        @endif
            @if(session()->has('message_wrong'))
                <div class="alert alert-danger w-25 d-block mr-auto ml-auto text-center" role="alert">
                    {{session()->get('message_wrong')}}
                </div>
            @endif
            <form method="post" action=" {{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="subject" placeholder="Subject" class="form-control mt-1" value="{{old('subject')}}">
            <field-required text="{{$errors->first('subject')}}"></field-required>
        <textarea name="message" id="message" class="form-control mt-1" placeholder="Enter message to user">
            {{old('message')}}
        </textarea>
            <field-required text="{{$errors->first('message')}}"></field-required>
            <!--How to pass old values in a select-->
            <p>To:</p>
        <select name="recip_id">
            <option class="form-control mt-1" disabled>Choose a user</option>
            {{--<option class="form-control mt-1">All users</option>--}}
            @foreach($users as $user)
                <option value=" {{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
            <field-required text="{{$errors->first('recip_id')}}"></field-required>

            <p>Message type:</p>
            <select name="type">
                <option class="form-control mt-1" disabled>Choose message type</option>

                @foreach($types as $type)
                    <option value=" {{old('type') ?? $type->id }}">{{ ucfirst($type->type) }}</option>
                @endforeach
            </select>
            <field-required text="{{$errors->first('type')}}"></field-required>

            <search-email text="search"></search-email>
        <button class="btn alert-success mt-1">Send</button>
        </form>
        <a class="badge badge-success p-2 mt-2" href="{{route('admin.index')}}">Back admin page</a>
    </div>


@endsection
