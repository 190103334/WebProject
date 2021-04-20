<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic</title>
</head>
<body>
    <form action="{{ route('save') }}" method="post" enctype="multipart/form-data">
       @csrf
       <p>Smart booking</p>
       <input type="text" placeholder="Full name" name="full_name"><br><br>
       <input type="email" placeholder="Email" name="email"><br>
       <input type="text" placeholder="Phone number" name="phone_number"><br>
       <p>Upload photo of id card for user information:</p>
       <input type="file" name="id_card_image" accept="image/jpeg, image/png, image/png"><br>
       <input type="submit" value="Submit" href="{{ route('send') }}">
    </form>
</body>
</html>