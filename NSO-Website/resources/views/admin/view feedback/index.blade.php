<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feedback</title>
</head>
<body> 
    <h1>Feedback</h1>
    

    <table>
        <tr>
            <th>Image</th>
            <th>Rating</th>
            <th>Message</th>
        </tr>
        @foreach ($feedbacks as $feedback)
            <tr>
                <td><img src="{{asset('images/feedback images/'.$feedback->image)}}"></td>
                <td>{{$feedback->rating}}</td>
                <td>{{$feedback->message}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>