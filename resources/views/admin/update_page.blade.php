<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style>
        body {
          background-image: url('../images/p1.jpg');
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;

            border: 3px solid #2e3531c4;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            
        }

        .form-container {
            background: #fff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            transition: all 0.3s ease;
            border: 1px solid #454b4fc4;
           
        }

        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            color: #010101;
            margin-bottom: 20px;
           
        }

        label {
            font-weight: 600;
            color: #000000;
            margin-bottom: 5px;
            display: block;
            
            
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            border: 1px solid #03131ec4;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #007bff;
            box-shadow: 0px 0px 8px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        textarea {
            height: 120px;
            resize: none;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background: linear-gradient(135deg, #28a745, #218838);
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #218838, #1e7e34);
            transform: translateY(-2px);
            box-shadow: 0px 4px 10px rgba(40, 167, 69, 0.3);
        }

        .image-preview {
            display: flex;
            justify-content: center;
            margin: 15px 0;
        }

        .image-preview img {
            width: 150px;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .image-preview img:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="container">
        <div class="form-container">
            <h2>Update Product</h2>
            <form action="{{url('edit_product', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label style="color: black">Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>

                <div>
                    <label style="color: black">Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>

                <div>
                    <label style="color: black">Price</label>
                    <input type="text" name="price" value="{{$data->price}}">
                </div>

                <div>
                    <label style="color: black">Quantity</label>
                    <input type="number" name="quantity" value="{{$data->quantity}}">
                </div>

                <div>
                    <label style="color: black">Category</label>
                    <select name="category">
                        <option value="{{$data->category}}">{{$data->category}}</option>
                        @foreach ($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="image-preview">
                    <label style="color: black">Current Image</label>
                    <img src="/products/{{$data->image}}" alt="Product Image">
                </div>

                <div>
                    <label style="color: black">New Image</label>
                    <input type="file" name="image">
                </div>

                <div>
                    <button type="submit" class="btn-submit">Update Product</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
</body>
</html>
