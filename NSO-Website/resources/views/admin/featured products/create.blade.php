<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .is-invalid {
            border: 1px solid red;
        }

        span {
            color: red;
        }
    </style>
</head>
<body>
    <a href="{{route('admin.featured products.index')}}"><button>Cancel</button></a>
    <h1>Create Featured Product</h1>
    
    <form action="{{route('admin.featured products.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <label for="img">Image: </label>
            <input type="file" name="image" id="img" class="@error('image') is-invalid @enderror"  value="{{ old('image') }}">

            @error('image')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="desc">Description: </label>
            <input type="text" name="description" id="desc" class="@error('description') is-invalid @enderror"  value="{{ old('description') }}">

            @error('description')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="link">Link</label>
            <input type="text" name="link" id="link" class="@error('link') is-invalid @enderror"  value="{{ old('link') }}">

            @error('link')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input type="submit" value="+Add Product">
        </div>
    </form>
</body>
</html>