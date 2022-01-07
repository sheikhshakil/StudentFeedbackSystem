<div class="col-md-9 mx-auto">
    <form action={{url("/sendFeedback")}} method="post">
        @csrf
        <div class="tSelectDiv">
            <label for="teacher-list" class="form-label">Select teacher</label>
            {{-- student er same dept er teacher der nam ekhane show korbe. onno dept teacher der nam show korbe na --}}
            <select required name="t_id" id="teacher-list" class="form-select">
                @foreach ($teachers as $teacher)
                    <option value={{$teacher->t_id}}>{{$teacher->fullName}}</option>
                @endforeach
            </select>
        </div>
        <div class="questionsDiv">
            <h6>Aspects of evaluation (Rate out of 5)</h6>
            <hr>
            <div>
                {{-- questions list --}}
                {{-- q1 --}}
                <div class="mb-3">
                    <label class="form-label"><b>Q1 - </b>How much you are satisfied with your teacher performance?</label>
                    <div>
                        {{-- 5 star radio --}}
                        <input type="radio" required value="5" class="btn-check" name="q1" id="q1s5" autocomplete="off">
                        <label class="btn btn-outline-success" for="q1s5">5 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 4 star radio --}}
                        <input type="radio" required value="4" class="btn-check" name="q1" id="q1s4" autocomplete="off">
                        <label class="btn btn-outline-success" for="q1s4">4 <i class="bi bi-star-fill"></i></label>

                        {{-- 3 star radio --}}
                        <input type="radio" required value="3" class="btn-check" name="q1" id="q1s3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q1s3">3 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 2 star radio --}}
                        <input type="radio" required value="2" class="btn-check" name="q1" id="q1s2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q1s2">2 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 1 star radio --}}
                        <input type="radio" required value="1" class="btn-check" name="q1" id="q1s1" autocomplete="off">
                        <label class="btn btn-outline-danger" for="q1s1">1 <i class="bi bi-star-fill"></i></label>
                    </div>
                </div>

                {{-- q2 --}}
                <div class="mb-3">
                    <label class="form-label"><b>Q2 - </b>I had enough prior knowledge to be able to follow the course.</label>
                    <div>
                        {{-- 5 star radio --}}
                        <input type="radio" required value="5" class="btn-check" name="q2" id="q2s5" autocomplete="off">
                        <label class="btn btn-outline-success" for="q2s5">5 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 4 star radio --}}
                        <input type="radio" required value="4" class="btn-check" name="q2" id="q2s4" autocomplete="off">
                        <label class="btn btn-outline-success" for="q2s4">4 <i class="bi bi-star-fill"></i></label>

                        {{-- 3 star radio --}}
                        <input type="radio" required value="3" class="btn-check" name="q2" id="q2s3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q2s3">3 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 2 star radio --}}
                        <input type="radio" required value="2" class="btn-check" name="q2" id="q2s2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q2s2">2 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 1 star radio --}}
                        <input type="radio" required value="1" class="btn-check" name="q2" id="q2s1" autocomplete="off">
                        <label class="btn btn-outline-danger" for="q2s1">1 <i class="bi bi-star-fill"></i></label>
                    </div>
                </div>

                {{-- q3 --}}
                <div class="mb-3">
                    <label class="form-label"><b>Q3 - </b>The course outcomes in course plan clearly describe what I should expect from the course.</label>
                    <div>
                        {{-- 5 star radio --}}
                        <input type="radio" required value="5" class="btn-check" name="q3" id="q3s5" autocomplete="off">
                        <label class="btn btn-outline-success" for="q3s5">5 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 4 star radio --}}
                        <input type="radio" required value="4" class="btn-check" name="q3" id="q3s4" autocomplete="off">
                        <label class="btn btn-outline-success" for="q3s4">4 <i class="bi bi-star-fill"></i></label>

                        {{-- 3 star radio --}}
                        <input type="radio" required value="3" class="btn-check" name="q3" id="q3s3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q3s3">3 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 2 star radio --}}
                        <input type="radio" required value="2" class="btn-check" name="q3" id="q3s2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q3s2">2 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 1 star radio --}}
                        <input type="radio" required value="1" class="btn-check" name="q3" id="q3s1" autocomplete="off">
                        <label class="btn btn-outline-danger" for="q3s1">1 <i class="bi bi-star-fill"></i></label>
                    </div>
                </div>

                {{-- q4 --}}
                <div class="mb-3">
                    <label class="form-label"><b>Q4 - </b>The course teacher followed course outline properly to deliver expected outcomes from the course.</label>
                    <div>
                        {{-- 5 star radio --}}
                        <input type="radio" required value="5" class="btn-check" name="q4" id="q4s5" autocomplete="off">
                        <label class="btn btn-outline-success" for="q4s5">5 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 4 star radio --}}
                        <input type="radio" required value="4" class="btn-check" name="q4" id="q4s4" autocomplete="off">
                        <label class="btn btn-outline-success" for="q4s4">4 <i class="bi bi-star-fill"></i></label>

                        {{-- 3 star radio --}}
                        <input type="radio" required value="3" class="btn-check" name="q4" id="q4s3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q4s3">3 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 2 star radio --}}
                        <input type="radio" required value="2" class="btn-check" name="q4" id="q4s2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q4s2">2 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 1 star radio --}}
                        <input type="radio" required value="1" class="btn-check" name="q4" id="q4s1" autocomplete="off">
                        <label class="btn btn-outline-danger" for="q4s1">1 <i class="bi bi-star-fill"></i></label>
                    </div>
                </div>

                {{-- q5 --}}
                <div class="mb-3">
                    <label class="form-label"><b>Q5 - </b>The course teacher provided necessary course materials when needed.</label>
                    <div>
                        {{-- 5 star radio --}}
                        <input type="radio" required value="5" class="btn-check" name="q5" id="q5s5" autocomplete="off">
                        <label class="btn btn-outline-success" for="q5s5">5 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 4 star radio --}}
                        <input type="radio" required value="4" class="btn-check" name="q5" id="q5s4" autocomplete="off">
                        <label class="btn btn-outline-success" for="q5s4">4 <i class="bi bi-star-fill"></i></label>

                        {{-- 3 star radio --}}
                        <input type="radio" required value="3" class="btn-check" name="q5" id="q5s3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q5s3">3 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 2 star radio --}}
                        <input type="radio" required value="2" class="btn-check" name="q5" id="q5s2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q5s2">2 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 1 star radio --}}
                        <input type="radio" required value="1" class="btn-check" name="q5" id="q5s1" autocomplete="off">
                        <label class="btn btn-outline-danger" for="q5s1">1 <i class="bi bi-star-fill"></i></label>
                    </div>
                </div>

                {{-- q6 --}}
                <div>
                    <label class="form-label"><b>Q6 - </b>How effective was the teaching method of the course overall?</label>
                    <div>
                        {{-- 5 star radio --}}
                        <input type="radio" required value="5" class="btn-check" name="q6" id="q6s5" autocomplete="off">
                        <label class="btn btn-outline-success" for="q6s5">5 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 4 star radio --}}
                        <input type="radio" required value="4" class="btn-check" name="q6" id="q6s4" autocomplete="off">
                        <label class="btn btn-outline-success" for="q6s4">4 <i class="bi bi-star-fill"></i></label>

                        {{-- 3 star radio --}}
                        <input type="radio" required value="3" class="btn-check" name="q6" id="q6s3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q6s3">3 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 2 star radio --}}
                        <input type="radio" required value="2" class="btn-check" name="q6" id="q6s2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="q6s2">2 <i class="bi bi-star-fill"></i></label>
                        
                        {{-- 1 star radio --}}
                        <input type="radio" required value="1" class="btn-check" name="q6" id="q6s1" autocomplete="off">
                        <label class="btn btn-outline-danger" for="q6s1">1 <i class="bi bi-star-fill"></i></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-warning" type="submit">Submit</button>
        </div>
    </form>
</div>