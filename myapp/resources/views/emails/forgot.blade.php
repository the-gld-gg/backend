<!-- View stored in resources/views/greeting.blade.php -->

<html>
    <body>
        <h1>Hello, {{ $user->name }}</h1>
        <p>
            use this token
            <br />
            {{ $token }}
        </p>
    </body>
</html>
