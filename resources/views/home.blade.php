@include('partials/header')
<section id="home-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h1>Student Feedback System</h1>
                    <p>Participate in and view academic surveys more conveniently.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div id="home-top-img-div">
                    <img class="home-top-img" src={{'img/feedback.svg'}} alt="home-illust">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="features">
    <div class="container">
        <div>
            <h3>Features</h3>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header p-3">
                      <h6>Annonymous feedback</h6>
                    </div>
                    <div class="card-body">
                      <p>Feedbacks submitted by students here will be annonymous to the teachers. So no teachers can see who awarded them with how many stars. This makes submitting feedbacks safely without any worries.</p>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header p-3">
                      <h6>Convenient feedbacks view</h6>
                    </div>
                    <div class="card-body">
                      <p>Teachers can see their respective feedbacks in depth along with every feedback result submitted by students. Also an average feedback result is shown to provide convenience and for easier evaluation.</p>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header p-3">
                      <h6>Admin management</h6>
                    </div>
                    <div class="card-body">
                      <p>Admin can manage all students and teachers list with right to delete users. Admin can also see detailed feedback results along with who submitted which feedback for whom preserving the right to delete feedbacks if necessary.</p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@include('partials/footer')

        
