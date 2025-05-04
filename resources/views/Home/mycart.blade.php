<!DOCTYPE html>
<html>

<head>
    @include('home.css')

   
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }

        .container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.cart_value {
    text-align: center;
    margin-top: 20px; /* Adjust as needed */
    padding: 20px;
    font-size: 24px;
    font-weight: bold;
    color: #1e1e2d;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    border: 1px solid #0386d1c4;
}


.div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 800px;
            border-collapse: collapse;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            border: 2px solid black;
            text-align: center;
            color: white;
            font-size: 20px;
            font-weight: bold;
            background: linear-gradient(135deg, #1e1e2d, #3a3a4f);
            padding: 12px;
        }

        td {
            border: 1px solid skyblue;
            padding: 15px;
            transition: background-color 0.3s;
        }

        td:hover {
            background-color: rgba(135, 206, 250, 0.3);
        }

        .cart_value {
            text-align: center;
            margin-bottom: 70px;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #1e1e2d;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .order_deg {
            padding-right: 100px;
            margin-top: -50px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .order_deg:hover {
            transform: scale(1.03);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        label {
            display: inline-block;
            width: 160px;
            font-weight: bold;
            color: #1e1e2d;
        }

        .div_gap {
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            border-radius: 8px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            padding-left: 20px;
            width: 600px;
        }

        input, textarea {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: 0.3s;
           
            font-size: 16px;
        }

        input:focus, textarea:focus {
            border-color: skyblue;
            outline: none;
            box-shadow: 0 0 8px skyblue;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4fe023, #3a3a4f);
            color: white;
            padding: 12px 10px;
            border: none;
            border-radius: 2px;
            transition: 0.3s;
            font-size: 20px;
            max-width: 50%;
            
        }

        .btn-success{
            background: linear-gradient(135deg, #4fe023, #3a3a4f);
            color: white;
            padding: 12px 10px;
            border: none;
            border-radius: 2px;
            transition: 0.3s;
            font-size: 18px;
            max-width: 50%;
        }

        .btn-success:hover {
            background: skyblue;
            color: black;
        }

        .btn-primary:hover {
            background: skyblue;
            color: black;
        }
        .btn-danger {
            background-color: red;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 5px;
            transition: 0.3s;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: darkred;
        }

        .cart_value {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>
  <div class="hero_area">
    @include('home.header')
  </div>

  
    <div class="container">
    <table>
        <tr>
            <th>Book Title</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th>Remove</th>
        </tr>
    
        <?php
        $value = 0;
        $cartGrouped = [];
        ?>
    
        @foreach ($cart as $item)
            <?php
            $productId = $item->product->id;
            if (!isset($cartGrouped[$productId])) {
                $cartGrouped[$productId] = [
                    'product' => $item->product,
                    'quantity' => 1,
                    'cart_id' => $item->id // Save one of the cart item IDs for removal
                ];
            } else {
                $cartGrouped[$productId]['quantity']++;
            }
            ?>
        @endforeach
    
        @foreach ($cartGrouped as $group)
            <tr>
                <td>{{ $group['product']->title }}</td>
                <td>{{ $group['quantity'] }}</td>
                <td>৳ {{ $group['product']->price * $group['quantity'] }}</td>
                <td>
                    <img width="150" height="150" src="/products/{{ $group['product']->image }}">
                </td>
                <td>
                    <a class="btn btn-danger" href="{{ url('delete_cart', $group['cart_id']) }}">Remove</a>
                </td>
            </tr>
    
            <?php
            $value += $group['product']->price * $group['quantity'];
            ?>
        @endforeach
    </table>
    
    <div class="cart_value">
        <h3>Total Value of Cart: ৳ {{$value}}</h3>
    </div>
</div>


<div class="div_deg">

    <div class="order_deg">
        <form action="{{url('comfirm_order')}}" method="Post">

            @csrf

            <div class="div_gap">
                <label for="">Receiver Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>

            <div class="div_gap">
                <label for="">Receiver Address</label>
                <textarea name="address">{{Auth::user()->address}}</textarea>
            </div>

            <div class="div_gap">
                <label for="">Receiver Phone</label>
                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>

            <div class="div_gap">
                <input class="btn btn-primary" type="submit" value="Cash on Delivery">
            
                <a class="btn btn-success" href="{{url('stripe',$value)}}">Pay Using Card</a>
            </div>

        </form>
    </div>


</body>

</html>