<section class="info_section layout_padding2-top">
  <div class="social_container">
    <div class="social_box">
      <a href="" class="social-icon">
        <i class="fa fa-facebook" aria-hidden="true"></i>
      </a>
      <a href="" class="social-icon">
        <i class="fa fa-twitter" aria-hidden="true"></i>
      </a>
      <a href="" class="social-icon">
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </a>
      <a href="" class="social-icon">
        <i class="fa fa-youtube" aria-hidden="true"></i>
      </a>
    </div>
  </div>
  <div class="info_container">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 fade-in">
          <h6>ABOUT US</h6>
          <p>Our online destination for books.</p>
        </div>
        <div class="col-md-6 col-lg-3 fade-in">
          <div class="info_form">
            <h5>Newsletter</h5>
            <form action="#">
              <input type="email" placeholder="Enter your email">
              <button class="subscribe-btn">Subscribe</button>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 fade-in">
          <h6>NEED HELP</h6>
          <p>Contact our support team.</p>
        </div>
        <div class="col-md-6 col-lg-3 fade-in">
          <h6>CONTACT US</h6>
          <div class="info_link-box">
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Bahaddrhut, Chittagong</span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>+880 1824010930</span>
            </a>
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>hossensajjad24@gmail.com</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer_section">
    <div class="container">
      <p>&copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Online Book Store</a></p>
    </div>
  </footer>
</section>

<style>
  .info_section {
    background-color: #000000; /* Dark theme */
    color: #ffffff; /* White text */
    padding: 40px 0;
    max-width: 2000px; /* Adjusted width */
    margin: auto;
  }
  .social-icon {
    transition: transform 0.3s ease-in-out;
    color: white;
  }
  .social-icon:hover {
    transform: scale(1.2);
    color: #f90404;
  }
  .fade-in {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 1s forwards;
  }
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  .subscribe-btn {
    background-color: #f90404;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
  }
  .subscribe-btn:hover {
    background-color: #d00000;
  }
  .info_link-box a {
    display: flex;
    align-items: center;
    color: white;
    margin-bottom: 8px;
  }
  .info_link-box a i {
    margin-right: 10px;
    color: #f90404;
  }
</style>

<script>
  $(document).ready(function() {
    $('.fade-in').each(function(index) {
      $(this).delay(200 * index).queue(function(next) {
        $(this).addClass('visible');
        next();
      });
    });
  });
</script>
