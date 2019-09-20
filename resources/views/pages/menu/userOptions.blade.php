<li class="nav-item dropdown">
    {{--@hasanyrole('client|admin')--}}

    {{--@endrole--}}
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        @role('admin')
        <a class="dropdown-item" href="{{ route('admin.index') }}">Admin panel</a>
        <a class="dropdown-item" href="{{ route('category.create') }}">New category</a>
        @endrole
{{--        @hasanyrole('client|admin')--}}
        <a class="dropdown-item" href="{{ route('advert.create') }}">New advert</a>
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        @auth
{{--            <button type="button" class="btn">--}}
{{--                <a  href="{{route('message.showAll')}}">--}}
{{--                    <i class="far fa-envelope"></i>--}}
{{--                    Pranešimai <span class="badge badge-pill badge-light @if(count($messages) > 0){{'red'}} @endif">{{count($messages)}}</span>--}}
{{--                    <span class="sr-only">Neskaitytos</span>--}}
{{--                </a>--}}
{{--            </button>--}}
        @endauth

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

{{--        @endhasanyrole--}}
    </div>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" type="button" class="btn btn-primary nav-link dropdown-toggle btn btn-primary"
            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Notifications <h3 class="badge badge-light">
            {{count($messages)}}
        </h3>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

        @foreach($messages as $message)
            <a class="dropdown-item" href="{{route('message.show', $message->id)}}">{{$message->subject}}</a>
            @endforeach
        <a href="{{route('messages.showAll', Auth::user()->id)}}">
            View all messages
        </a>
        </div>
    </a>
{{--    <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-primary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--        Inbox--}}
{{--        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--            @foreach($messages as $message)--}}
{{--            <a class="dropdown-item" href="{{route('message.show', $message->id)}}">{{$message->subject}}</a>--}}
{{--                @endforeach--}}
{{--                @endauth--}}
{{--        </div>--}}
{{--        </span>--}}
{{--    </a>--}}

{{--    <a href="{{route('message.index')}}" class="notifications badge badge-dark">{{count($messages)}} new message</a>--}}

</li>



