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
            padding: 30px;
            
          
        }

        .sidebar {
            width: 25%;
            background: white;
            padding: 20px;
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
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-left:auto; /* Moves it to the right */
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
            font-weight: bold;
            font-size: 24px;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .book-card img {
    width: 100%; /* Makes sure the image fills the card */
    /* Set a fixed height for uniformity */
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
                <li><a href="{{ url('books?category=E-book') }}">E-book</a></li>
                <li><a href="{{ url('eaudio?category=E-audio') }}">E-audio</a></li>
                <li><a href="{{ url('notes?category=notes') }}">Notes</a></li>
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
            <h2>Latest Book</h2>
            <div class="book-grid">
                @foreach($product as $products)
                <div class="book-card">
                    <img src="products/{{$products->image}}" alt="Product Image">
                    <div>
                        <h6 class="text-lg font-bold">{{$products->title}}</h6>
                        <h6 class="text-gray-600">Price: <span class="text-red-500 font-bold">৳ {{$products->price}}</span></h6>
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
