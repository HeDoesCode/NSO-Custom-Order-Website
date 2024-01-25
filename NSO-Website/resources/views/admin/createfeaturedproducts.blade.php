<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('admin.featuredproducts')}}"><button>Cancel</button></a>
    <h1>Create Featured Product</h1>
    <form action="{{route('admin.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <label for="img">Image: </label>
            <input type="file" name="image" id="img">
        </div>
        <div>
            <label for="desc">Description: </label>
            <input type="text" name="description" id="desc">
        </div>
        <div>
            <label for="link">Link</label>
            <input type="text" name="link" id="link">
        </div>
        <div>
            <input type="submit" value="+Add Product">
        </div>
    </form>
</body>
</html>