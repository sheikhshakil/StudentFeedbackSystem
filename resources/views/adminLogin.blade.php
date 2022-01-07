@include('partials/header')

<section class="container">
  {{-- login notification --}}
    <div>
      @if (session()->get('loginSuccess') == -1)
        <div class="col-md-6 mx-auto p-3 alert alert-danger text-center mb-3">
            <span>Login failed! Wrong credentials.</span>
        </div>
      @endif
    </div>
    <div class="col-md-6 mx-auto" id="form">
        <div class="card-header light-bg text-center p-4">
            <h5>Login as Admin</h5>
        </div>
        <div class="card-body p-4">
            <form action={{url("/admin")}} method="post">
                @csrf
                <div class="mb-3">
                    <label for="uname" class="form-label">Username</label>
                    <input required name="username" type="text" class="form-control" id="uname">
                  </div>
                  <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input required name="password" type="password" class="form-control" id="pass">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-danger">Login</button>
                  </div>
            </form>
        </div>
    </div>

    <!-- for hiding noti -->
    <script>
      $().ready(function () {
        $("div.alert").delay(5000);
        $("div.alert").hide(2000);
      });
    </script>
</section>

@include('partials/footer')