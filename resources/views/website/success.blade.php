<!-- resources/views/order/complete.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placed Successfully</title>
<style>
    /* resources/css/app.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

.alert {
    padding: 20px;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
    color: #155724;
    text-align: center;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    text-decoration: none;
}

.btn:hover {
    background-color: #0056b3;
}

</style>    
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success">
            <h1>Order Placed Successfully!</h1>
            <p>Your order has been placed successfully. Your bill ID is <strong>{{$billing_id}}</strong>.</p>
            <a href="{{route('index')}}" class="btn btn-primary">Return to Home</a>
        </div>
    </div>
</body>
</html>
