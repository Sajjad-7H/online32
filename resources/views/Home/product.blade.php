<section class="shop_section layout_padding" style="color: #de1b1b">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Latest Books</h2>
    </div>
    <div class="row">

      @foreach($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          <div class="img-box">
            <img src="products/{{$products->image}}" alt="">
          </div>
          <div class="detail-box">
            <h6 class="title-text">{{ \Illuminate\Support\Str::limit($products->title, 20) }}</h6>

            <div class="price-box">
              <p class="original-price">${{$products->price}}</p>
              <p class="discount-price">${{$products->discount_price}}</p>
            </div>
          </div>

          <div class="button-box">
            <a class="btn btn-danger" href="{{url('product_details',$products->id)}}">Details</a>
            <a class="btn btn-primary" href="{{url('add_cart',$products->id)}}">Add to cart</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>

  <!-- WhatsApp Chat Fixed Icon -->
  <div class="whatsapp-chat">
    <a href="https://wa.me/+88 01839925280?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
      <img src="../images/whatsapp.jpeg" alt="whatsapp-logo">
    </a>
  </div>
</section>

<style>
/* Product Card Styling */
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

/* Image Box Styling */
.img-box img {
  width: 100%;
  border-radius: 10px;
  transition: transform 0.3s ease-in-out;
  margin-bottom: 10px;
}

.img-box:hover img {
  transform: scale(1.1);
}

/* Detail Text Styling */
.detail-box h6.title-text {
  margin: 10px 0 5px;
  font-weight: bold;
  color: black;
  font-size: 16px;
  min-height: 40px;
}

/* Price Styling */
.price-box {
  margin-top: 5px;
}

.original-price {
  text-decoration: line-through;
  color: #080808;
  font-size: 16px;
  margin: 0;
}

.discount-price {
  color: #de1b1b;
  font-size: 18px;
  font-weight: bold;
  margin: 0;
}

/* Button Styling */
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

/* WhatsApp Chat Styling */
.whatsapp-chat {
  position: fixed;
  bottom: 40px;
  left: 40px;
  z-index: 1000;
}

.whatsapp-chat img {
  width: 50px;
  height: 50px;
  border-radius: 40%;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
}

.whatsapp-chat img:hover {
  transform: scale(1.1);
}
</style>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/681c367ac607d8190cf39c4c/1iqn39kvp';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->