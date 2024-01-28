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
    <a href="{{route('admin.featured products.create')}}"><button>+Add Featured Product</button></a>

    @if (session()->has('success')) 
        <span>{{ session('success') }}</span>
    @endif

    <table>
        <tr>
            <th>Image</th>
            <th>Description</th>
            <th>Link</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($featuredProducts as $product)
            <tr>
                <td><img src="{{asset('images/featured products/'.$product->image)}}"></td>
                <td>{{$product->description}}</td>
                <td>{{$product->link}}</td>
                <td>
                    <a href="{{route('admin.featured products.edit', ['product' => $product])}}"><button>Edit</button></a>
                </td>
                <td>
                    <form action="{{route('admin.featured products.delete', ['product' => $product])}}" method="post">
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