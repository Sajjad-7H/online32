<!DOCTYPE html>
<html>
<head> 
  @include('admin.css')
  <style type="text/css">
    body {
      background: linear-gradient(135deg, #2b5876, #4e4376);
      color: white;
      font-family: 'Arial', sans-serif;
    }

    input[type='text'] {
      width: 400px;
      height: 50px;
      border: none;
      border-radius: 8px;
      padding: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      transition: box-shadow 0.3s ease-in-out;
    }

    input[type='text']:focus {
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
      outline: none;
    }

    .div_deg {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 30px;
      opacity: 0;
      animation: fadeIn 1.5s forwards;
    }

    .table_deg {
      text-align: center;
      margin: auto;
      border-collapse: collapse;
      margin-top: 50px;
      width: 80%;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    th, td {
      padding: 15px;
      font-size: 18px;
      color: white;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    th {
      background-color: #4e4376;
      color: #ffffff;
      font-size: 20px;
      text-transform: uppercase;
    }

    tr:nth-child(even) {
      background-color: rgba(255, 255, 255, 0.05);
    }

    tr:hover {
      background-color: rgba(255, 255, 255, 0.1);
      transform: scale(1.01);
      transition: all 0.2s ease-in-out;
    }

    .btn {
      transition: transform 0.3s, background-color 0.3s;
      border-radius: 8px;
    }

    .btn:hover {
      transform: translateY(-3px);
      background-color: darkblue !important;
      color: white !important;
    }

    h1 {
      text-align: center;
      animation: fadeInUp 1.5s;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(50px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  @include('admin.header')
  @include('admin.sidebar')

  <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        <h1>Add Book Category</h1>

        <div class="div_deg">
          <form action="{{url('add_category')}}" method="post">
            @csrf
            <div>
              <input type="text" name="category" placeholder="Enter Category Name">
              <input class="btn btn-primary" type="submit" value="Add Category">
            </div>
          </form>
        </div>
      </div>

      <div>
        <table class="table_deg">
          <tr>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>

          @foreach($data as $data)
          <tr>
            <td>{{$data->category_name}}</td>
            <td>
              <a class="btn btn-success" href="{{url('edit_category',$data->id)}}">Edit</a>
            </td>
            <td>
              <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$data->id)}}">Delete</a>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>

  <!-- JavaScript files-->
  <script type="text/JavaScript">
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);

      swal({
        title: "Are You Sure to Delete This?",
        text: "This delete will be permanent",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          window.location.href = urlToRedirect;
        }
      });
    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
  <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
  <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
  <script src="{{asset('admincss/js/charts-home.js')}}"></script>
  <script src="{{asset('admincss/js/front.js')}}"></script>

  @include('admin.js')
</body>
</html>
