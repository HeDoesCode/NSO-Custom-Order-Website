<?php
    $heading = ""; 

    switch ($id) {
        case 'region':
            $heading = "Region";
            break;
        case 'province':
            $heading = "Province";
            break;
        case 'cityMun':
            $heading = "City/Municipality";
            break;
        case 'brgy':
            $heading = "Barangay";
            break;
    };
?>

<li class="mb-2">
    <x-input-label for="{{$id}}" :value="__($heading)" />
    <select class="mt-1 p-2 w-full border border-black-300 rounded-md" id="{{$id}}" required>
        <option value="">{{" --EMPTY-- "}}</option>
    </select>
</li>