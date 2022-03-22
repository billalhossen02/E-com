
<div class="nav">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top ">
    <a class="navbar-brand" href="#">Bishsas.com</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active px-3 usermargin1">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        
        <li class="nav-item active dropdown px-3">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
          </a>
           
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($categories as $category)
            <a class="dropdown-item" href="{{url('products/show/'.$category->id)}}">{{$category->name}}</a>
            @endforeach
            {{-- <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> --}}
          </div>
        </li>
        

        <li class="nav-item px-3 active">
            <a class="nav-link" href="#">Features</a>
          </li>

          <li class="nav-item px-3 active">
            <a class="nav-link" href="#">About us</a>
          </li>

        @if(Auth::check())
        <li class="nav-item dropdown px-3 usermargin active">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
         
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">  
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Order List</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{url('logout')}}">Logout</a>  
        </div>
      </li>
        @else

        <li class="nav-item px-3 usermargin active">
          <a class="nav-link" href="{{url('login/blade')}}">Login</a>
        </li>
        
        @endif

        <li class="nav-item px-3 active ">
          <a href="{{ route('cart.list') }}" class="nav-link">
            <i class="fas fa-shopping-cart"><span>{{ Cart::getTotalQuantity()}}</span></i>
        </a>
      </li>


    </ul>
      
      <form class="form-inline my-2 my-lg-0" action="{{route('search')}}">
        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search Products" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</div>

  <script>
    $(window).scroll(function(){
            if($(this).scrollTop() > 10){
                $('.nav').addClass('sticky')
            } else{
                $('.nav').removeClass('sticky')
            }
        });
  </script>


