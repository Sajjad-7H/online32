<!-- header section starts -->
<header class="header_section" style="position:relative">

    <div class="image-container" style="position: relative">
        <img src="https://bdbooks.net/helps/book_fair_top.gif" alt="Book Fair" style="display: block; margin: auto; max-width: 100%; height: auto;">

    </div>

    
    
  <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="index.html">
          <span style="position: absolute; color: black; font-size: 24px; font-weight: bold; ">Book Store</span>
      </a>
      <style>
        /* Base styles */
        .search_box_area_v7 {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            
            

        }

        .search_box1 {
            width: 80%; /* Adjust width */
            max-width: 400px; /* Prevent it from being too large */
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            border: 2px solid #008484;
            
            
        }

        .search_box_img {
            cursor: pointer;
            width: 40px; /* Adjust size */
            height: 40px;
            margin-left: 10px;
        }

        /* Responsive for smaller screens */
        @media (max-width: 768px) {
            .search_box_area_v7 {
                flex-direction: column;
            }

            .search_box1 {
                width: 90%;
            }

            .search_box_img {
                margin-top: 10px;
            }

            .image-container {
            display: flex;
            justify-content: center; /* Centers horizontally */
            align-items: center; /* Centers vertically */
            height: 100vh; /* Full viewport height */
        }
        img {
            max-width: 100%;
            height: auto;
        }
         
        }
    </style>

    
      <div class="search_box_area_v7">
        <input id="search_mob" name="search" type="text" autocomplete="off" 
               aria-label="search" placeholder="Search Book..." 
               class="form-control search_box1 input-designer ui-autocomplete-input">
        <img src="../images/download.jpg" class="search-blue2 search_box_img" alt="PBS" onclick="SearchDataMob()">
    </div>

    <script>
        function SearchDataMob() {
            let query = document.getElementById("search_mob").value;
            alert("Searching for: " + query); // Replace with actual search function
        }
    </script>
    <br>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent" >
          <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" style="color: #1e1e2d"href="{{url('offers')}}">OFFERS</a>
            </li>

            

              <li class="nav-item">
                  <a class="nav-link" href="{{url('')}}" style="color: #1e1e2d">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{url('shop')}}" style="color: #1e1e2d">Shop</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{url('why')}}" style="color: #1e1e2d">Why Us</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{url('contact')}}" style="color: #1e1e2d">Contact Us</a>
              </li>
          </ul>
          <div class="user_option">
              @if (Route::has('login'))
              @auth
              <a href="{{url('myorders')}}" class="animated-link">My Orders</a>
              <a href="{{url('mycart')}}">
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i> [{{$count}}]
              </a>
              <form style="padding: 15px" method="POST" action="{{ route('logout') }}">
                  @csrf
                  <input class="btn btn-success animated-btn" type="submit" value="Logout">
              </form>
              @else
              <a href="{{url('/login')}}" class="animated-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span>Login</span>
              </a>
              <a href="{{url('/register')}}" class="animated-link">
                  <i class="fa fa-vcard" aria-hidden="true"></i>
                  <span>Register</span>
              </a>
              @endauth
              @endif
          </div>
      </div>
  </nav>
</header>

<style>
 .header_section {
    background-image: url('images/pic8.jpg');
    padding: 15px 0;
    transition: background 0.3s;
    position: static; /* Change static to relative */
    z-index: 1000; /* Increase z-index */
    
}


  .navbar-brand span {
    font-size: 24px;
    font-weight: bold;
    color: white;
    transition: color 0.3s;
    position: relative; /* Change absolute to relative */
}

.nav-item:hover{
    background: rgb(135, 235, 153);
      color: black;
      transform: scale(1.05);

}


  .navbar-brand span:hover {
      color: rgb(46, 9, 178);
  }

  .navbar-nav .nav-item .nav-link {
      color: white;
      font-size: 18px;
      padding: 10px 15px;
      transition: color 0.3s, transform 0.2s;
      
      
  }

  .navbar-nav .nav-item .nav-link:hover {
      color: rgb(9, 62, 81);
      transform: scale(1.1);
      
     
  }

  .animated-link {
      color: white;
      font-size: 18px;
      margin-left: 15px;
      transition: color 0.3s, transform 0.2s;
  }

  .animated-link:hover {
    background:rgb(135, 235, 153);
      color: rgb(9, 52, 25);
      transform: scale(1.1);
  }
  

  .animated-btn {
    background: linear-gradient(135deg, #eb0808, #ff758c);
    color: white;
    font-size: 16px;
    padding: 10px 50px;
    position: relative;
    transition: background 0.3s, transform 0.2s;
    cursor: pointer;
    max-width: 500px; /* Adjusted to a reasonable size */
   
    justify-content: center;
    text-align: right;
    
}

.animated-btn:hover {
    background: rgb(135, 235, 153);
    color: black;
    transform: scale(1.05);
}

  .navbar-nav .nav-item .nav-link {
      color: white;
      font-size: 18px;
      padding: 10px 10px;
      transition: color 0.3s, transform 0.2s, background-color 0.3s;
  }

  .navbar-nav .nav-item .nav-link:hover {
      color: rgb(9, 62, 81);
      transform: scale(1.1);
  }

  /* Highlight active navigation link in green */
  .navbar-nav .nav-item .nav-link.active {
      background-color: green;
      color: white;
      border-radius: 5px;
  }

  


</style>

