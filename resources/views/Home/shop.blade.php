<!DOCTYPE html>
<html lang="bn">

<head>
    @include('home.css')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bangla:wght@400;700&display=swap');

        body {
            font-family: 'Noto Sans Bangla', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            display: flex;
            gap: 25px;
            max-width: 1800px;
            margin: auto;
            padding: 15px;
        }

        .sidebar {
            width: 25%;
            background: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #03d1149b;
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
            color: #444;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar ul li a:hover {
            background: #dc2626;
            color: white;
        }

        .main-content {
            width: 1200px;
            background: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            background-image: url('images/img7.png');
            border: 1px solid #0386d1c4;
        }

        .main-content h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .book-card {
            background: #e0d9d9;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            height: 450px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .book-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .book-details {
            flex-grow: 1;
        }

        .book-card h6 {
            margin: 5px 0;
            font-size: 18px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            text-align: center;
            transition: all 0.3s;
            text-decoration: none;
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

        .book-card .mt-4 {
            display: flex;
            justify-content: space-between;
            margin-top: auto;
        }

        .price-box {
            margin: 10px 0;
        }

        .original-price {
            text-decoration: line-through;
            color: #000000;
            font-size: 16px;
            margin: 0;
        }

        .discount-price {
            color: #dc2626;
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }

        .save-badge {
            color: green;
            font-size: 14px;
            margin-left: 5px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar,
            .main-content {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <div class="container">
        <aside class="sidebar">
            <h2>বিষয়</h2>
            <ul>
                <li><a href="{{ url('books?category=E-book') }}">Product</a></li>
                <li><a href="{{ url('eaudio?category=E-audio') }}">E-audio</a></li>
                <li><a href="{{ url('notes?category=notes') }}">Notes</a></li>
                <li><a href="{{ url('islamic?category=islamic') }}">Islamic</a></li>
                <li><a href="{{ url('bengali?category=bengali') }}">Bengali</a></li>
                <li><a href="{{ url('childrenbooks?category=childrenbooks') }}">ChildrenProducts</a></li>
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
            <h2>Latest Book</h2>
            <div class="book-grid">
                @foreach($product as $products)
                    @php
                        $savings = $products->price - $products->discount_price;
                        $percentage = round(($savings / $products->price) * 100);
                    @endphp
                    <div class="book-card">
                        <img src="products/{{$products->image}}" alt="Product Image">
                        <div class="book-details">
                            <h6 class="text-lg font-bold" title="{{ $products->title }}">
                                {{ \Illuminate\Support\Str::limit($products->title, 20) }}
                            </h6>
                            <div class="price-box">
                                <p class="original-price">মূল্য: ৳{{$products->price}}</p>
                                <p class="discount-price">ছাড়ের মূল্য: ৳{{$products->discount_price}}</p>
                            </div>
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
</body>

</html>
