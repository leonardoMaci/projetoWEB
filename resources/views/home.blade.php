<!DOCTYPE html>
<html lang="en-US">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div ng-app="myApp">
  <div class="container">
    <div class="row">
        <title>Login</title>
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">PRIMEIRO ACESSO!</h1>
            <div class="col-lg-4 m-auto">
                <div class="mt-5">
                    <button class="btn btn-primary">
                        <a href="{{route('lista')}}" style="text-decoration:none!important; color:white!important;"> ENTRE AQUI</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>