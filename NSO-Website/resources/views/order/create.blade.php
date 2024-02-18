<?php
    $user = auth()->user();
?>

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
    <a href="{{route('dashboard')}}"><button>Cancel</button></a>
    <h1>Create Order</h1>
    <ul>
        <?php
            foreach ($errors->all() as $message) {
                echo "<li>$message</li>";
            }
        ?>
    </ul>

    <form action="{{route('order.place')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('post')
        <input type="hidden" name="username" value="{{$user->username}}">
        <input type="hidden" name="deliveryAddress" value="{{$user->deliveryAddress}}">
        <div>
            <label for="type">Shirt Type:</label>
            <select name="type" id="type" onchange="populateSize()">
                <option value=""></option>
                <option value="regular">REGULAR</option>
                <option value="premium">PREMIUM</option>
            </select>
        </div>
        <div>
            <label for="desc">Design Description:</label>
            <textarea name="design_text" id="desc" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="img">{{__('Design (if applicable):')}}</label>
            <input type="file" name="design_img" id="img" class="@error('design_img') is-invalid @enderror">

            @error('design_img')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="size">Shirt Size:</label>
            <select name="size" id="size">
                <option value="">Select a shirt type first</option>
            </select>
        </div>
        <div>
            <label for="qty">Quantity:</label>
            <input type="number" name="quantity" id="qty">
        </div>
        <label for="MOD">Mode of Payment:</label>
            <select name="mode_of_payment" id="MOD">
                <option value=""></option>
                <option value="Gcash">{{__('Gcash')}}</option>
            </select>
        </div>
        <div>
            <input type="submit" value="+Add Product">
        </div>
    </form>
</body>
<script>
    const regularSizes = ['Small', 'Medium', 'Large', 'XLarge', 'XXLarge'];        
    const premiumSizes = ['Small', 'Medium', 'Large', 'XLarge'];

    const tpyeSelect = document.getElementById('type');
    const sizeSelect = document.getElementById('size');

    function populateSize() {
        sizeSelect.innerHTML = "";

        if (tpyeSelect.value == 'regular') {
            for(let i = 0; i < regularSizes.length; i++) {
                var option = document.createElement("option");
                option.textContent = regularSizes[i];
                option.value = regularSizes[i];
                sizeSelect.appendChild(option);
            }
        } else if (tpyeSelect.value == 'premium') {
            for(let i = 0; i < premiumSizes.length; i++) {
                var option = document.createElement("option");
                option.textContent = premiumSizes[i];
                option.value = premiumSizes[i];
                sizeSelect.appendChild(option);
            }
        } else {
            var option = document.createElement("option");
            option.textContent = "Select a shirt type first";
            sizeSelect.appendChild(option);
        }
    }
</script>
</html>