<div class="container-fluid">
    <div class="row">
        <nav class="pt-4 col-md-2 d-none d-md-block sidebar pb-2 h-50" style="background-color: rgba(164,159,149,0.49)">
            <div class="sidebar-sticky">
                <h4 class=""><mark class="rounded pr-2 pl-2"><a class="text-black text-decoration-none" href="{{route('admin.index')}}">Admin options</a></mark></h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{route('category.create')}}" class="nav-link ">Create category</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('advert.create')}}" class="nav-link">Create advert</a>

                    </li>
                    <li class="nav-item">
                        <a href="{{route('city.create')}}" class="nav-link">Add city</a>

                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.create')}}" class="nav-link">Message-center</a>

                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.adverts')}}" class="nav-link">All adverts</a>

                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.categories')}}" class="nav-link">All Categories</a>

                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.attributes')}}" class="nav-link">Attributes</a>

                    </li>
                    <a class="badge badge-success p-2 mt-2" href="{{route('category.index')}}">Back home page</a>

                </ul>
            </div>
        </nav>

