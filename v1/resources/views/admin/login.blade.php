<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dima-Authentification</title>
    <meta name="description" content="ExCello - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
        <link rel="shortcut icon" href="{{ asset('images/logo-ctc1.png') }}"> 
    
        <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/pe-icon-7-filled.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/flag-icon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <style>
        body {
           
            background: url('/images/casbah.jpg') no-repeat center center fixed;
            min-height: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
    </style>

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('images/dima1.png') }}" alt="" width="30%">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('acc') }}">
                        <div class="form-group">
                            <label>Matricule</label>
                            <input type="text" class="form-control @error('matricule') is-invalid @enderror" placeholder="matricule" name="matricule"  value="{{ old('matricule') }}" autofocus>
                        </div>
                        @error('matricule')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="mot de passe" name="password" required>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Souviens-toi de moi
                            </label>
                            <label class="pull-right">
                                <a href="#">Mot de passe oublié?</a>
                            </label>

                        </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 my-5">Se connecter</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <img class="align-content" src="{{ asset('images/logo-ctc1.png') }}" alt="logo ctc" width="20%">
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
