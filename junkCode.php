
Other way of nav
<ul class="navbar-nav mr-auto dropdown">
   <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">

      @foreach($categories as $cat)
      <?php $class = 'nav-item';
      if ($cat->subCategories()){
         $class .= 'dropdown nav-link dropdown-toggle';
      }
      ?>
      <li ref="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="{{$class}}">{{$cat->title}}
         @if($cat->subCategories())
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($cat->subCategories as $subcat)
            <a class="dropdown-item/">{{$subcat->title}}</a>
            @endforeach
         </div>
         @endif
      </li>
      @endforeach
   </div>
</ul>