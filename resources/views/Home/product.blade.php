<section class="shop_section layout_padding" style="color: #de1b1b">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Books
        </h2>
      </div>
      <div class="row">

        @foreach($product as $products)
        
      


        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
       
              <div class="img-box">
                <img src="products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$products->title}}</h6>
                <h6>
                  Price
                  <span>${{$products->price}}</span>
                </h6>
              </div>

              <div style="padding: 15px" >
                <a class="btn btn-danger" href="{{url('product_details',$products->id)}}">Details</a>
             

             <a class="btn btn-primary" href="{{url('add_cart',$products->id)}}">Add to card</a>

            </div>
              

          </div>
        </div>


        @endforeach




        
        
      </div>
      
    </div>
  </section>
  <style>
    /* Animation for the product card */
    .box {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        padding: 10px;
        text-align: center;
        position: relative;
    }
    
    .box:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
    
    /* Image box styling */
    .img-box img {
        width: 100%;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }
    
    .img-box:hover img {
        transform: scale(1.1);
    }
    
    /* Detail box styling */
    .detail-box h6 {
        margin: 10px 0;
        font-weight: bold;
    }
    
    /* Button animations */
    .button-box {
        padding: 15px;
    }
    
    .button-box .btn {
        transition: all 0.3s ease-in-out;
        padding: 10px 15px;
        border-radius: 8px;
    }
    
    .button-box .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }
    </style>