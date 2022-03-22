<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/login.css">

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <form action="{{route('custom/login')}}" method="post">
            @csrf
            <h3 class="mb-5">Sign in</h3>
            <div class="form-outline mb-4 ">
              <label class="form-label float-left" for="typeEmailX-2">Email</label>
              <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />   
            </div>

            <div class="form-outline mb-4 ">
              <label class="form-label float-left" for="typePasswordX-2">Password</label>
              <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
            </div>
        
            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
            <p>Don't have an account? <a href="{{url('register/blade')}}" class="link-info">Register here</a></p>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

          </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>