<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Featured Products</title>
</head>
<body> 
    <h1>Featured Products</h1>
    <a href="{{route('admin.createfeaturedproducts')}}"><button>+Add Featured Product</button></a>

    <table>
        <tr>
            <th>Image</th>
            <th>Description</th>
            <th>Link</th>
            <th>Delete</th>
        </tr>
        @foreach ($featuredProducts as $product)
            <tr>
                <td><img src="{{asset('images/featured products/'.$product->image)}}"></td>
                <td>{{$product->description}}</td>
                <td>{{$product->link}}</td>
                <td>
                    <form action="{{route('admin.delete', ['product' => $product])}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>