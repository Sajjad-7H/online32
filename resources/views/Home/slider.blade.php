<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider & Modal</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .slider_section {
            background-color: #ebdfdfda; /* Light background */
            padding: 5px;
            
        }

        .modal {
            display: none; /* Initially hidden */
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            position: relative;
            padding: 3px;
            width: 50%;
            background: white;
            border-radius: 10px;
            text-align: center;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 30px;
            cursor: pointer;
            color: red;
        }
    </style>
</head>
<body>

<section class="slider_section mt-5">
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="../images/pic2.jpg" alt="First slide" width="100%">
            </div>
            <div class="carousel-item">
                <img src="../images/pic3.jpg" alt="Second slide" width="100%">
            </div>
            <div class="carousel-item">
                <img src="../images/pic4.jpg" alt="Third slide" width="100%">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<!-- Modal -->
<div id="bannerModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img src="../images/img5.png" alt="Promotional Banner" width="100%" height="100%">
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById("bannerModal");
        var closeBtn = document.querySelector(".close");

        // Show modal when the page loads (optional)
        modal.style.display = "flex";

        closeBtn.onclick = function () {
            modal.style.display = "none";
        };

        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    });
</script>

</body>
</html>
