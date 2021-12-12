@include('partials/header')

<section id="account">
    <div class="container">
        {{-- reg notification --}}
        <div>
            @if (session()->get('regSuccess') == 1)
                <div class="col-md-6 mx-auto p-3 alert alert-success text-center mb-3">
                    <span>Registration successful. Please log in.</span>
                </div>
            @elseif(session()->get('regSuccess') == -1)
                <div class="col-md-6 mx-auto p-3 alert alert-danger text-center mb-3">
                    <span>Registration failed! Internal server error.</span>
                </div>
            @elseif(session()->get('regSuccess') == 2)
                <div class="col-md-6 mx-auto p-3 alert alert-danger text-center mb-3">
                    <span>Registration failed! User already exists.</span>
                </div>
            @endif
        </div>
        {{-- login notification --}}
        <div>
            @if (session()->get('loginSuccess') == -1)
            <div class="col-md-6 mx-auto p-3 alert alert-danger text-center mb-3">
                <span>Login failed! Wrong credentials.</span>
            </div>
            @elseif (session()->get('loginSuccess') == -2)
            <div class="col-md-6 mx-auto p-3 alert alert-danger text-center mb-3">
                <span>Login failed! Internal server error.</span>
            </div>
            @endif
        </div>
        
        <div id="form" class="col-md-6 mx-auto ">
            <div class="p-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Register</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    {{-- login tab --}}
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                        <div class="icon-holder">
                            <i class="form-icon bi bi-shield-lock-fill"></i> 
                            <div>
                                Login as {{$type}}
                            </div>
                        </div>
                        <div>
                            <form action={{url('/login')}} method="post">
                                @csrf
                                <div>
                                    <input name="accType" readonly type="text" value={{$type}} class="form-control d-none">
                                </div>
                                <div class="mb-3">
                                    <label id="id-input" for="uid" class="form-label">{{$type}} ID</label>
                                    <input name="id" required type="text" class="form-control" id="uid">
                                </div>
                                <div class="mb-3">
                                    <label for="pass" class="form-label">Password</label>
                                    <input name="password" required type="password" class="form-control" id="pass">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning">Proceed</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- register tab --}}
                    <div class="tab-pane fade" id="register" role="tabpanel">
                        <div class="icon-holder">
                            <i class="form-icon bi bi-person-bounding-box"></i>
                            <div>
                                Register as {{$type}}
                            </div>
                        </div>
                        <div id="form-body">
                            <form action={{url('/register')}} method="post">
                                @csrf
                                <div>
                                    <input name="accType" readonly type="text" value={{$type}} class="form-control d-none">
                                </div>

                                <div class="mb-3">
                                    <label for="dept" class="form-label">Select your department</label>
                                    <select name="dept" required id="dept" class="form-select">
                                        <option value="cse">CSE</option>
                                        <option value="cce">CCE</option>
                                        <option value="eee">EEE</option>
                                        <option value="ete">ETE</option>
                                    </select>
                                </div>

                                @if ($type === "student")
                                    <div class="mb-3">
                                        <label for="sem" class="form-label">Select your semester</label>
                                        <select name="semester" required id="sem" class="form-select">
                                            <option value="1">1st</option>
                                            <option value="2">2nd</option>
                                            <option value="3">3rd</option>
                                            <option value="4">4th</option>
                                            <option value="5">5th</option>
                                            <option value="6">6th</option>
                                            <option value="7">7th</option>
                                            <option value="8">8th</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Student ID</label>
                                        <input name="std_id" required type="text" class="form-control" id="id">
                                    </div>
                                @elseif ($type === "teacher")
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Teacher ID</label>
                                        <input name="t_id" required type="text" class="form-control" id="id">
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="name" class="form-label">Full name</label>
                                    <input name="fullName" required type="text" class="form-control" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input name="email" required type="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="pass-reg" class="form-label">Password</label>
                                    <input name="password" required type="password" class="form-control" id="pass-reg">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials/footer')