@include('partials/header')

<section id="dashboard">
    <div class="container">
        @if ($user)
            @if ($user["accType"] == "student") 
                {{-- feedback notification --}}
                <div>
                    @if (session()->get('feedbackSuccess') == 1)
                        <div class="col-md-6 mx-auto p-3 alert alert-success text-center mb-3">
                            <span>Successfully submitted feedback. Thank you.</span>
                        </div>
                    @elseif(session()->get('feedbackSuccess') == -1)
                        <div class="col-md-6 mx-auto p-3 alert alert-danger text-center mb-3">
                            <span>Feedback submission failed! Internal server error.</span>
                        </div>
                    @elseif(session()->get('feedbackSuccess') == 2)
                        <div class="col-md-6 mx-auto p-3 alert alert-danger text-center mb-3">
                            <span>Feedback submission failed! You already submitted a feedback about that teacher previously.</span>
                        </div>
                    @endif
                </div>
            @endif

            <div class="row">
                <div class="col-6">
                    <div>
                        {{-- &#128522 --}}
                        <h4>Welcome</h4>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end">
                        <button class="tag btn btn-warning disabled">{{$user['accType']}}</button>
                    </div>
                </div>
            </div>

            <div class="menu-parent row mt-3">
                <div class="menu col-md-3">
                    <div>
                        <h6 class="text-center">Dashboard menu</h6>
                    </div>
                    <hr>
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                          <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#profile-tab" type="button" role="tab">Profile</button>

                          {{-- student & teacher er jnno different options --}}
                          <button class="nav-link" data-bs-toggle="pill" data-bs-target="#feedback-tab" type="button" role="tab">
                            @if ($user['accType'] === "student")
                                Submit feedback
                            @else
                                Feedback results
                            @endif
                          </button>

                          <button class="nav-link" data-bs-toggle="pill" data-bs-target="#update-tab" type="button" role="tab">Update profile</button>
                        </div>
                    </div>
                </div>

                <div class="tabs col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="profile-tab" role="tabpanel">
                            <div>
                                <h6>Your profile</h6>
                            </div>
                            <hr>
                            <div>
                                <div class="text-center">
                                    @if ($user['accType'] === "student")
                                        <img src="img/student.png" class="avatar" alt="avatar">
                                    @else
                                        <img src="img/teacher.png" class="avatar" alt="avatar">    
                                    @endif
                                    <h5 class="mt-3">{{$user["fullName"]}}</h5>
                                </div>
                                <div class="mt-3 card">
                                    <div class="card-header">
                                        Personal information
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table profile-table table-bordered table-striped my-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Department</th>
                                                        <td>{{$user["dept"]}}</td>
                                                    </tr>
    
                                                    @if ($user['accType'] === "student")
                                                        <tr>
                                                            <th>Student ID</th>
                                                            <td>{{$user["std_id"]}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Semester</th>
                                                            <td>{{$user["semester"]}}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <th>Teacher ID</th>
                                                            <td>{{$user["t_id"]}}</td>
                                                        </tr>
                                                    @endif
    
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{$user["email"]}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Registered on</th>
                                                        <td>{{$user["regDate"]}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- student r teacher er jnno alada option --}}
                        <div class="tab-pane fade" id="feedback-tab" role="tabpanel">
                            <div>
                                <h6>
                                    @if ($user['accType'] === "student")
                                        Send feedback about teachers
                                    @elseif ($user['accType'] === "teacher")
                                        Feedback results about you
                                    @endif
                                </h6>
                            </div>
                            <hr>
                            <div>
                                {{-- code gula seperate file theke include kora hoise code readability baranor jonno --}}
                                @if ($user["accType"] === "student")
                                    @include('partials/sendFeedback')
                                @elseif ($user['accType'] === "teacher")
                                    @include('partials/feedbackResults')
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="update-tab" role="tabpanel">Update profile</div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- for hiding noti -->
<script>
    $().ready(function () {
      $("div.alert").delay(5000);
      $("div.alert").hide(2000);
    });
</script>

@include('partials/footer')