<div id="feedback-result">
    <div class="aspects mb-3">
        <div>
            <h6>Questions overview</h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered my-0">
                <thead class="table-primary">
                    <tr>
                        <th>Serial</th>
                        <th>Aspects of evaluation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Q1</th>
                        <td>How much you are satisfied with your teacher performance?</td>
                    </tr>
                    <tr>
                        <th>Q2</th>
                        <td>I had enough prior knowledge to be able to follow the course.</td>
                    </tr>
                    <tr>
                        <th>Q3</th>
                        <td>The course outcomes in course plan clearly describe what I should expect from the course.</td>
                    </tr>
                    <tr>
                        <th>Q4</th>
                        <td>The course teacher followed course outline properly to deliver expected outcomes from the course.</td>
                    </tr>
                    <tr>
                        <th>Q5</th>
                        <td>The course teacher provided necessary course materials when needed.</td>
                    </tr>
                    <tr>
                        <th>Q6</th>
                        <td>How effective was the teaching method of the course overall?</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="f-results">
        <div class="mb-3">
            <span><i class="bi bi-rss-fill text-danger"></i> Submissions overview of : </span>
            <button class="btn btn-sm btn-danger disabled">{{count($feedbacks)}} student(s) </button>
        </div>
        @if (count($feedbacks) > 0)
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped my-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Scope</th>
                            @for ($i = 1; $i <= 6; $i++)
                                <th>Q{{$i}}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        {{-- show individual ratings --}}
                        @for ($i = 0; $i < count($feedbacks); $i++)
                            <tr>
                                <th>S{{$i+1}}</th>
                                <td>{{$feedbacks[$i]->q1}} <i class="bi bi-star-fill"></i></td>
                                <td>{{$feedbacks[$i]->q2}} <i class="bi bi-star-fill"></i></td>
                                <td>{{$feedbacks[$i]->q3}} <i class="bi bi-star-fill"></i></td>
                                <td>{{$feedbacks[$i]->q4}} <i class="bi bi-star-fill"></i></td>
                                <td>{{$feedbacks[$i]->q5}} <i class="bi bi-star-fill"></i></td>
                                <td>{{$feedbacks[$i]->q6}} <i class="bi bi-star-fill"></i></td>
                            </tr>
                        @endfor
    
                        {{-- average row --}}
                        <tr class="table-warning">
                            <th>Average</th>
    
                            {{-- q1 --}}
                            <td>
                                @php
                                    $totalStars = 0;
                                    foreach ($feedbacks as $feedback) {
                                        $totalStars += $feedback->q1;
                                    }
                                    echo round($totalStars / count($feedbacks), 1);
                                @endphp
                                <span> <i class="bi bi-star-fill"></i></span>
                            </td>
    
                            {{-- q2 --}}
                            <td>
                                @php
                                    $totalStars = 0;
                                    foreach ($feedbacks as $feedback) {
                                        $totalStars += $feedback->q2;
                                    }
                                    echo round($totalStars / count($feedbacks), 1);
                                @endphp
                                <span> <i class="bi bi-star-fill"></i></span>
                            </td>
    
                            {{-- q3 --}}
                            <td>
                                @php
                                    $totalStars = 0;
                                    foreach ($feedbacks as $feedback) {
                                        $totalStars += $feedback->q3;
                                    }
                                    echo round($totalStars / count($feedbacks), 1);
                                @endphp
                                <span> <i class="bi bi-star-fill"></i></span>
                            </td>
    
                            {{-- q4 --}}
                            <td>
                                @php
                                    $totalStars = 0;
                                    foreach ($feedbacks as $feedback) {
                                        $totalStars += $feedback->q4;
                                    }
                                    echo round($totalStars / count($feedbacks), 1);
                                @endphp
                                <span> <i class="bi bi-star-fill"></i></span>
                            </td>
    
                            {{-- q5 --}}
                            <td>
                                @php
                                    $totalStars = 0;
                                    foreach ($feedbacks as $feedback) {
                                        $totalStars += $feedback->q5;
                                    }
                                    echo round($totalStars / count($feedbacks), 1);
                                @endphp
                                <span> <i class="bi bi-star-fill"></i></span>
                            </td>
    
                            {{-- q6 --}}
                            <td>
                                @php
                                    $totalStars = 0;
                                    foreach ($feedbacks as $feedback) {
                                        $totalStars += $feedback->q6;
                                    }
                                    echo round($totalStars / count($feedbacks), 1);
                                @endphp
                                <span> <i class="bi bi-star-fill"></i></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div>
                No feedback was submitted by your students till now.
            </div>
        @endif
    </div>
</div>