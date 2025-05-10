<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
      body {
        background-image: url('../images/p1.jpg');
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        border: 3px solid #000000c4;
      }

      .container {
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0px 4px 15px rgba(242, 241, 241, 0.745);
        width: 700px;
        background: transparent;
        background-image: url('../images/p1.jpg'); 
      }

      .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
        animation: slideInUp 1.5s ease-in-out;
        color: black;
      }

      h1 {
        color: rgb(0, 0, 0);
        text-align: center;
        font-size: 36px;
        margin-bottom: 20px;
      }

      label {
        display: inline-block;
        width: 200px;
        font-size: 18px;
        color: rgb(15, 2, 2);
      }

      input[type='text'], input[type='number'], textarea, select {
        width: 350px;
        height: 50px;
        padding: 10px;
        border: none;
        border-radius: 8px;
        transition: all 0.3s ease;
        color: black;
        border: 1px solid #454b4fc4;
      }

      textarea {
        width: 350px;
        height: 80px;
        border: 1px solid #454b4fc4;
      }

      input[type='text']:focus, input[type='number']:focus, textarea:focus, select:focus {
        outline: none;
        box-shadow: 0 0 10px rgba(0, 255, 204, 0.7);
      }

      input[type='file'] {
        color: rgb(0, 0, 0);
      }

      .input_deg {
        padding: 15px;
        transition: transform 0.3s ease;
      }

      .input_deg:hover {
        transform: scale(1.05);
      }

      .btn-success {
        background-color: #28a745;
        color: white;
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s ease;
        text-align: center;
        justify-content: center;
      }

      .btn-success:hover {
        background-color: #218838;
        transform: translateY(-3px);
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container">
          <h1>Add Product</h1>
          <div class="div_deg">
            <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="input_deg">
                <label style="color: black">Product Title</label>
                <input type="text" name="title" required>
              </div>

              <div class="input_deg">
                <label style="color: black">Description</label>
                <textarea name="description" required></textarea>
              </div>

              <div class="input_deg">
                <label style="color: black">Price</label>
                <input type="text" name="price" required>
              </div>

              <!-- ✅ Fixed Discount Price field -->
              <div class="input_deg">
                <label style="color: black">Discount Price</label>
                <input type="number" name="discount_price" placeholder="Write a Discount if applicable">
              </div>

              <div class="input_deg">
                <label style="color: black">Quantity</label>
                <input type="number" name="qty" required>
              </div>

              <div class="input_deg">
                <label style="color: black">Product category</label>
                <select name="category" required>
                  <option style="color: black">Select a Category</option>
                  @foreach($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="input_deg">
                <label style="color: black">Product Image</label>
                <input type="file" name="image">
              </div>

              <div class="input_deg">
                <input class="btn btn-success" type="submit" value="Add Book">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript files -->
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
