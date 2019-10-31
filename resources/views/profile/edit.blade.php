@extends('layouts.app')
{{----}}

@section('content')
    <div class="container mt-3">
        <h4 class="text-center mt-4 pt-4">Change your user name</h4>
        <form method="post" action=" {{ route('profile.store', $user->id) }}" class="resize-width-40 mx-auto text-center p-3">
            @csrf
            <input type="text" name="name" placeholder="Change your user name" class="form-control mt-3" autofocus>
            <button class="btn alert-success mt-3 pl-3 pr-3">Change</button>
        </form>
    </div>
@endsection