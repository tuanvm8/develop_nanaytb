<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <form class="row" action="{{ route('resetPassword.reset-password') }}" method="POST">
        @csrf
        {{-- @include('admin.core.alert') --}}
        <div class="row">
            <img class="profile-img" src=""alt="">
            <div class="form-group">
                <input type="password" class="form-control" id="pass" name="password"
                    placeholder="Nhập mật khẩu mới" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Password'">

                <p><label for="pass">Nhập mật khẩu mới</label></p>

                <p class="help is-danger text-danger" style="padding-right: 33px;">{{ $errors->first('password') }}</p>
                <input type="password" class="form-control" id="name" name="repassword"
                    placeholder="Nhập lại mật khẩu" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Password Confirmation'">

                <p><label for="pass">Nhập lại mật khẩu</label></p>
                <p class="help is-danger text-danger" style="padding-right: 33px;">{{ $errors->first('repassword') }}
                </p>
                <button type="submit" value="submit" class="primary-btn">Đặt lại mật khẩu</button>
            </div>
        </div>
    </form>
</body>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "segoe ui", verdana, helvetica, arial, sans-serif;
        font-size: 16px;
        transition: all 500ms ease;
    }

    body {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-rendering: optimizeLegibility;
        -moz-font-feature-settings: "liga" on;
    }

    .row {
        background-color: rgba(20, 120, 200, 0.6);
        color: #fff;
        text-align: center;
        padding: 2em 2em 0.5em;
        width: 90%;
        margin: 2em auto;
        border-radius: 5px;
    }

    .row h1 {
        font-size: 2.5em;
    }

    .row .form-group {
        margin: 0.5em 0;
    }

    .row .form-group label {
        display: block;
        color: #fff;
        text-align: left;
        font-weight: 600;
    }

    .row .form-group input,
    .row .form-group button {
        display: block;
        padding: 0.5em 0;
        width: 100%;
        margin-top: 1em;
        margin-bottom: 0.5em;
        background-color: inherit;
        border: none;
        border-bottom: 1px solid #555;
        color: #eee;
    }

    .row .form-group input:focus,
    .row .form-group button:focus {
        background-color: #fff;
        color: #000;
        border: none;
        padding: 1em 0.5em;
        animation: pulse 1s infinite ease;
    }

    .row .form-group button {
        border: 1px solid #fff;
        border-radius: 5px;
        outline: none;
        -moz-user-select: none;
        user-select: none;
        color: #333;
        font-weight: 800;
        cursor: pointer;
        margin-top: 2em;
        padding: 1em;
    }

    .row .form-group button:hover,
    .row .form-group button:focus {
        background-color: #fff;
    }

    .row .form-group button.is-loading::after {
        animation: spinner 500ms infinite linear;
        content: "";
        position: absolute;
        margin-left: 2em;
        border: 2px solid #000;
        border-radius: 100%;
        border-right-color: transparent;
        border-left-color: transparent;
        height: 1em;
        width: 4%;
    }

    .row .footer h5 {
        margin-top: 1em;
    }

    .row .footer p {
        margin-top: 2em;
    }

    .row .footer p .symbols {
        color: #444;
    }

    .row .footer a {
        color: inherit;
        text-decoration: none;
    }

    .information-text {
        color: #ddd;
    }

    @media screen and (max-width: 320px) {
        .row {
            padding-left: 1em;
            padding-right: 1em;
        }

        .row h1 {
            font-size: 1.5em !important;
        }
    }

    @media screen and (min-width: 900px) {
        .row {
            width: 50%;
        }
    }
</style>
</body>

</html>
