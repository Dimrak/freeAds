<div class="container-fluid" style="border-bottom: 2px solid black;">
    <div class="row">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm navbar-bg w-100 d-inline-block" style="background-color: rgba(164,159,149,0.49)">
            <div class="container" style="margin-right: 0;">
                {{--<a class="navbar-brand font-weight-bolder" href="{{ url('/') }}">Home</a>--}}
                {{--<button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#admin-options" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
                    {{--<span class="navbar-toggler-icon"></span>--}}
                {{--</button>--}}
                {{--<active-nav></active-nav>--}}
                <ul class="nav flex-row " id="admin-options">

                    <li class="nav-item active">
                        <a href="{{route('search.mostVisited')}}" class="nav-link hoverNav font-weight-bolder ">Most visited</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('search.recentlyAdded')}}" class="nav-link hoverNav font-weight-bolder">Recently added</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" disabled>Last day</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" disabled>Discount</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('search.lastUpdated')}}" class="nav-link hoverNav font-weight-bolder">Last updated</a>
                    </li>

                </ul>

            </div>
        </nav>
    </div>
</div>

{{--For the active tag--}}
{{--<style>--}}
    {{--/* Style the buttons */--}}
    {{--#admin-options .nav-item {--}}
        {{--border: none;--}}
        {{--outline: none;--}}
        {{--padding: 10px 16px;--}}
        {{--/*background-color: indianred;*/--}}
        {{--cursor: pointer;--}}
        {{--font-size: 18px;--}}
    {{--}--}}

    {{--/* Style the active class, and buttons on mouse-over */--}}
    {{--.active, .nav-item:hover {--}}
        {{--background-color: indianred;--}}
        {{--color: white;--}}
    {{--}--}}
{{--</style>--}}
{{--<script>--}}
    {{--// Add active class to the current button (highlight it)--}}
    {{--console.log('active');--}}
    {{--var header = document.getElementById("admin-options");--}}
    {{--var btns = header.getElementsByClassName("nav-item");--}}
    {{--for (var i = 0; i < btns.length; i++) {--}}
        {{--btns[i].addEventListener("click", function() {--}}
            {{--var current = document.getElementsByClassName("active");--}}
            {{--current[0].className = current[0].className.replace(" active", "");--}}
            {{--this.className += " active";--}}
        {{--});--}}
    {{--}--}}
{{--</script>--}}

