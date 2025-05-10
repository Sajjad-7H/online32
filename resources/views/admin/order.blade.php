<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .table_container {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-in-out;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
            animation: slideIn 1s ease-in-out;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
            font-size: 18px;
        }
        td {
            background-color: #fff;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
            transition: 0.3s;
        }
        .btn {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }
        .btn:hover {
            transform: scale(1.05);
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="table_container">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print PDF</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}</td>
                    <td>
                        <img width="100" src="products/{{$data->product->image}}" style="border-radius: 5px; animation: fadeIn 1s;">
                    </td>
                    <td>
                        @if($data->status == 'in progress')
                        <span style="color: rgb(255, 99, 2)">{{$data->status}}</span>
                        @elseif($data->status == 'on the way')
                        <span style="color:rgb(15, 0, 176)">{{$data->status}}</span>
                        @else
                        <span style="color: rgb(27, 125, 48)">{{$data->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On the way</a>
                        <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
                    </td>
                    <td>
                        <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Print PDF</a>
                    </td>
                </tr>
                @endforeach
            </table>
            </div>
          </div>
      </div>
    </div>
    
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
