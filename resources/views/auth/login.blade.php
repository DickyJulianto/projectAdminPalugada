<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('backend/loginPage/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="form-box login">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Login</h1>

                @if ($errors->any())
                    <div style="color: red; margin-bottom: 15px; text-align: left; font-size: 0.9em;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <span class="captcha-img">{!! captcha_img('flat') !!}</span>
                        <button type="button" id="reload"
                            style="background: #0d6efd; color: white; border: none; border-radius: 5px; padding: 5px 10px; font-size: 18px; cursor: pointer;">&#x21bb;</button>
                    </div>
                    <input type="text" id="captcha" name="captcha" required placeholder="Enter Captcha">
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>

        <div class="form-box register">
            <form action="{{ route('register') }}" method="POST"> {{-- <-- UBAH INI --}} @csrf {{-- <-- TAMBAHKAN INI
                    --}} <h1>Registration</h1>
                    <div class="input-box">
                        {{-- Tambahkan atribut 'name' --}}
                        <input type="text" name="name" placeholder="Username" required value="{{ old('name') }}">
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        {{-- Tambahkan atribut 'name' --}}
                        <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                        <i class='bx bxs-envelope'></i>
                    </div>
                    <div class="input-box">
                        {{-- Tambahkan atribut 'name' --}}
                        <input type="password" name="password" placeholder="Password" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <div class="input-box">
                        {{-- Tambahkan konfirmasi password --}}
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <button type="submit" class="btn">Register</button>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>

    {{-- Memanggil script untuk toggle dan reload captcha --}}
    <script src="{{ asset('backend/loginPage/script.js') }}"></script>
    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: '{{ route("captcha.reload") }}',
                success: function (data) {
                    $(".captcha-img").html(data.captcha);
                }
            });
        });
    </script>
</body>

</html>
