
<div class="container">
    <aside class="sidebar">
        <h2>বিষয়</h2>
        <ul style="border: 1px solid #96db9d">
            <li><a href="{{ url('books?category=E-book') }}">E-book</a></li>
            <li><a href="{{ url('eaudio?category=E-audio') }}">E-Audio</a></li>
            <li><a href="{{ url('notes?category=notes') }}">Notes</a></li>
            <li><a href="{{ url('bookmela?category=bookmela') }}">Book Mela</a></li>
            <li><a href="{{ url('islamic?category=islamic') }}">Islamic</a></li>
            <li><a href="{{ url('bengali?category=bengali') }}">Bengali</a></li>
            <li><a href="{{ url('childrenbooks?category=childrenbooks') }}">ChildrenBooks</a></li>
            <li><a href="{{ url('historical?category=historical') }}">Historical</a></li>
            <li><a href="{{ url('adventure?category=adventure') }}">Adventure</a></li>
            <li><a href="{{ url('thriller?category=thriller') }}">Thriller</a></li>
            <li><a href="{{ url('biography?category=biography') }}">Biography</a></li>
            <li><a href="{{ url('mystery?category=mystery') }}">Mystery</a></li>
            <li><a href="{{ url('selfhelp?category=selfhelp') }}">Selfhelp</a></li>
            <li><a href="{{ url('horror?category=horror') }}">Horror</a></li>
            <li><a href="{{ url('goosebumps?category=goosebumps') }}">Goosebumps</a></li>


        </ul>
    </aside>

    <main class="main-content">
        <h1>Horror</h1>
        <div class="book-grid">
            @foreach($product as $products)
            <div class="book-card">
                <img src="products/{{$products->image}}" alt="Product Image">
                <div>
                    <h6 class="text-lg font-bold">{{$products->title}}</h6>
                    <h6 class="text-gray-600">Price: <span class="text-red-500 font-bold">${{$products->price}}</span></h6>
                </div>
                <div class="mt-4">
                    <a class="btn btn-danger" href="{{url('product_details', $products->id)}}">Details</a>
                    <a class="btn btn-primary" href="{{url('add_cart', $products->id)}}">Add to cart</a>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</div>
<a href="shop" class="btn btn-secondary back-btn">← Back</a>
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bangla:wght@400;700&display=swap');

body {
font-family: 'Noto Sans Bangla', sans-serif;
background-color: #96cadb;
margin: 0;
padding: 0;
color: #333;
}

.container {
display: flex;
gap: 25px;
max-width: 1800px;
margin: auto;
padding: 30px;

}

.sidebar {
width: 25%;
background: #6eacc082;
padding: 20px;
border-radius: 10px;
box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
border: 1px solid #0488ac;
}

.sidebar h2 {
font-size: 22px;
font-weight: bold;
margin-bottom: 15px;
}

.sidebar ul {
list-style: none;
padding: 0;
}

.sidebar ul li a {
display: block;
color: #0a0808;
text-decoration: none;
padding: 10px 15px;
border-radius: 5px;
transition: background 0.3s, color 0.3s;
border: 2px solid #23515b;

}



.sidebar ul li a:hover {
background: #f89898;
color: white;
}

.main-content {
width: 1200px;
background: rgba(12, 133, 173, 0.352);
padding: 25px;
border-radius: 10px;
box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
border: 2px solid #0385d1;

}


.main-content h2 {
font-size: 60px;
font-weight: bold;
margin-bottom: 20px;
color: #0a0808;

}

.book-grid {
display: flex;
flex-wrap: wrap;  /* Ensures items wrap to the next row */
gap: 20px;  /* Adds space between book cards */

}

.book-card {
background: rgba(227, 216, 216, 0.301);
padding: 10px;
border-radius: 10px;
box-shadow: 0 2px 8px rgba(83, 31, 31, 0.1);
transition: transform 0.3s ease, box-shadow 0.3s ease;
width: calc(33.33% - 10px); /* Adjust based on your design */
max-width: 240px; /* Prevents excessive stretching */
border: 2px solid #008484;
}

.book-card img {
width: 100%; /* Makes sure the image fills the card */
height: 200px; /* Set a fixed height for uniformity */
object-fit: cover; /* Ensures the image maintains aspect ratio */
border-radius: 8px;
}



.btn {
display: inline-block;
padding: 10px 15px;
border-radius: 5px;
font-size: 14px;
text-align: center;
transition: all 0.3s;
}

.btn-danger {
background: #dc2626;
color: white;
}

.btn-primary {
background: #2563eb;
color: white;
}

.btn:hover {
opacity: 0.9;
}

@media (max-width: 768px) {
.container {
    flex-direction: column;
}
.sidebar, .main-content {
    width: 100%;
}
}
.back-btn {
display: inline-block;
margin: 15px;
padding: 8px 15px;
font-size: 20px;
background: #f80e0e;
color: white;
border-radius: 5px;
text-decoration: none;
transition: all 0.3s ease-in-out;
}

.back-btn:hover {
background: #09e639;
transform: translateY(-2px);
box-shadow: 0 3px 8px rgba(104, 255, 3, 0.2);
}









.book-card:hover {
transform: scale(1.05);
box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* Book Image */
.book-img {
width: 100%;
height: 150px;
object-fit: cover;
border-radius: 6px;
transition: transform 0.3s ease-in-out;
}

.book-card:hover .book-img {
transform: scale(1.08);
}

/* Title and Price */
.book-title {
font-size: 14px;
font-weight: bold;
margin: 8px 0 4px;
color: #333;
}

.book-price {
font-size: 12px;
color: #666;
}

.book-price span {
color: #dc2626;
font-weight: bold;
}

/* Floating animated background */
@keyframes moveBackground {
0% { background-position: 0% 0%; }
50% { background-position: 100% 100%; }
100% { background-position: 0% 0%; }
}

body::before {
content: "";
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #fad0c4, #ffdde1);
background-size: 400% 400%;
animation: moveBackground 10s infinite linear alternate;
opacity: 0.1;
z-index: -1;
}

/* Buttons */
.button-group {
display: flex;
justify-content: space-between;
margin-top: 8px;
}

.animate-btn {
display: inline-block;
padding: 6px 10px;
font-size: 12px;
border-radius: 5px;
text-align: center;
transition: all 0.3s ease-in-out;
}

.btn-danger {
background: #dc2626;
color: white;
}

.btn-primary {
background: #2563eb;
color: white;
}

.animate-btn:hover {
transform: translateY(-2px);
box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
}

</style>