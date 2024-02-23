

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Simple Login Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'><link rel="stylesheet" href="./style.css">

  <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-form">            @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <li>{{ session('success') }}</li>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <li>{{ session('error') }}</li>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

  </div>
@endif

  <form action="{{route('login')}}" method="POST">
    @csrf
    <h1>Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="email" placeholder="Email" autocomplete="nope" name="email">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" autocomplete="new-password" name="password">
      </div>
      
    </div>
    <div class="action">
      
      <button  type="submit">Sign in</button>
    </div>
  </form>
</div>

  
  <script src="{{ asset('/assets/script.js') }}"></script>
  
</body>
</html>
