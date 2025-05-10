<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
            animation: fadeIn 1s ease-in-out;
        }

       

        .table_deg {
            width: 90%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.8s ease-in-out;
        }

       

        th {
            background-color: #00796b;
            color: white;
            font-size: 20px;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            transition: background 0.3s;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .search-container {
            display: flex;
            justify-content: center;
            margin: 20px auto;
            position: relative;
            width: 500px;
        }

        .search-container input[type='search'] {
            width: 100%;
            height: 50px;
            border: 2px solid #009688;
            border-radius: 25px;
            padding: 10px 45px 10px 15px;
            font-size: 18px;
            transition: 0.3s;
        }

        .search-container input[type='search']:focus {
            border-color: #00796b;
            box-shadow: 0px 0px 10px rgba(0, 121, 107, 0.5);
            outline: none;
        }

        .search-container button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            cursor: pointer;
        }

        .btn {
            transition: transform 0.3s, background 0.3s;
        }

        .btn:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <form action="{{url('book_search')}}" method="get" class="search-container">
                    @csrf
                    <input type="search" name="search" placeholder="Search products...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>

                <div class="div_deg">
                    <table class="table_deg">
                        <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($product as $products)
                        <tr>
                            <td>{{$products->title}}</td>
                            <td>{!!Str::limit($products->description,50)!!}</td>
                            <td>{{$products->category}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->discount_price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>
                                <img height="120" width="120" src="products/{{$products->image}}" style="border-radius: 10px;">
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Update</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>