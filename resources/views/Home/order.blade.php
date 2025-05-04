<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    @include('home.css')
    <style type="text/css">
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes hoverGlow {
        0% {
            box-shadow: 0 0 10px rgba(0, 0, 255, 0.3);
        }
        50% {
            box-shadow: 0 0 20px rgba(0, 0, 255, 0.6);
        }
        100% {
            box-shadow: 0 0 10px rgba(0, 0, 255, 0.3);
        }
    }

    .div_center {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
        animation: fadeInUp 1s ease-in-out;
    }
    
    table {
        border: 2px solid black;
        text-align: center;
        width: 800px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        animation: fadeInUp 1s ease-in-out;
    }
    
    th {
        border: 2px solid skyblue;
        background-color: black;
        color: white;
        font-size: 19px;
        font-weight: bold;
        text-align: center;
        padding: 12px;
    }
    
    td {
        border: 1px solid rgb(18, 47, 58);
        padding: 10px;
        font-size: 16px;
        transition: transform 0.3s ease;
    }
    
    table tr {
        transition: background-color 0.3s;
    }
    
    table tr:hover {
        background-color: rgba(0, 0, 0, 0.1);
        animation: hoverGlow 1.5s infinite alternate;
    }
    
    img {
        height: 200px;
        width: 200px;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    img:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')

        <div class="div_center">
            <table>
                <tr>
                    <th>Book name</th>
                    <th>Price</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                </tr>
                @foreach ($order as $order)
                <tr>
                    <td>{{$order->product->title}}</td>
                    <td>{{$order->product->price}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <img src="products/{{$order->product->image}}">
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('home.footer')
</body>
</html>
