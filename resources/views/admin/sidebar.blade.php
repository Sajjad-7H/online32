<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <a href=""><div class="avatar"><img src="{{asset('admincss/img/admin.png')}}" alt="..." class="img-fluid rounded-circle"></div></a>
        <div class="title">
          <h1 class="h5" style="color: white">Sajjad Hosen</h1>
          <p style="color: rgb(175, 165, 165)">Web Designer</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading" style="color: rgb(183, 177, 177)">Main</span>
      <ul class="list-unstyled" style="color: white">
              <li><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home</a></li>

              <li>
                <a href="{{url('view_category')}}"> <i class="icon-grid"></i>Category
              </a>

              </li>
              
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Books </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('add_product')}}">Add Book</a></li>
                  <li><a href="{{url('view_product')}}">View Book</a></li>
                  
                </ul>
              </li>

              <li>
                <a href="{{url('view_orders')}}"> <i class="icon-grid"></i>Orders
              </a>

              </li>
              
             
              
              <li>
                <a href="{{url('profile')}}"> <i class="icon-user"></i>view profile
              </a>

              </li>
              

              <li>
                <a href="{{url('register')}}"><i class="icon-user"></i>Register User
              </a>

              </li>
      </ul>
    </nav>