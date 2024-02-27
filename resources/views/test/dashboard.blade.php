<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - WaterBilling</title>
</head>

<body>
    <div>
        @auth

            <p>congrats your login</p>
            <form action="/logout" method="POST">
                @csrf
                <button>logout</button>
            </form>
        @else
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" placeholder="name">
                <input type="text" name="username" placeholder="username">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="password" placeholder="password">
                <button>register</button>
            </form>

            <h2>login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" name="loginusername" placeholder="username">
                <input type="text" name="loginpassword" placeholder="password">
                <button>Login</button>
            </form>
        @endauth


    </div>

</body>

</html>
