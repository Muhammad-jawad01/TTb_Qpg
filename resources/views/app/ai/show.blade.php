{{-- For B ^ C --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $paper->subject->name }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/paper1.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .button {
            background-color: #04AA6D;
            /* Green */
            border: none;
            color: white;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 10px;
            font-size: 16px;
        }
    </style>
</head>



<body dir="{{ $paper->papertype == 'urdu' ? 'rtl' : 'ltr' }}">
    <div class="main">
        <div class="intro">
            <div class="introTop">
                <div class="logo">
                    <img src="{{ asset('assets/img/logo1.jpeg') }}" alt="">
                </div>
                <div class="text-div">
                    @if ($paper->papertype == 'urdu')
                        <p>(SWTD) کیڈٹ کالج سپنکی </p>
                        <p>
                            <span> سال : <b style="font-weight:bold">{{ $paper->session }}</b> </span>
                            <span> ٹرم :<b style="font-weight:bold">{{ $paper->Term->name }}</b> </span>

                            <span>پرچہ :<b style="font-weight:bold">{{ $paper->subject->name }}</b> </span>
                            <span>کلاس :<b style="font-weight:bold">{{ $paper->class->name }}</b> </span>

                        </p>
                    @else
                        <p>Cadet College Spinkai (SWTD)</p>
                        <p><span>Paper : <b style="font-weight:bold">{{ $paper->subject->name }}</b> </span>
                            <span>Class : <b style="font-weight:bold">{{ $paper->class->name }}</b> </span> <span>Term
                                :
                                <b style="font-weight:bold">{{ $paper->Term->name }}</b></span>
                            <span>Year :
                                <b style="font-weight:bold">{{ $paper->session }}</b></span>
                        </p>
                    @endif
                </div>
                <div class="logo">
                    <img src="{{ asset('assets/img/logo2.jpeg') }}" alt="">
                </div>
            </div>
            <div class="introBottom">
                @if ($paper->papertype == 'urdu')
                    <p><span>رول نَمْبَر ____________</span> <span>نام ________________________</span><span>سیکشن
                            ______</span><span>تاریخ ___/____/<u>{{ now()->year }}</u></span></p>
                @else
                    <p><span>C/RNo ____________</span> <span>Name ________________________</span><span>Section
                            ______</span><span>Date ___/____/<u>{{ now()->year }}</u></span></p>
                @endif

            </div>
        </div>



        @foreach ($paper->partPart as $key => $data)
            @if ($data->name == 'B' || $data->name == 'ب' || $data->name == 'C' || $data->name == 'ج')
                <div class="theadSection">
                    @if ($paper->papertype == 'urdu')
                        <p>کل نمبر : {{ $data->marks }}</p>

                        <p>سیکشن – {{ $data->name }}</p>
                        <p>کل وقت : {{ $data->time_allowed }} منٹ </p>
                    @else
                        <p>Time Allowed: {{ $data->time_allowed }} Minutes</p>


                        <p class="text-center">SECTION – {{ $data->name }}</p>
                        <p>Marks : {{ $data->marks }}</p>
                    @endif

                </div>
                @if ($data->name == 'B' || $data->name == 'ب')
                    @if ($paper->papertype == 'urdu')
                        <p class="attemp_question"> درج زیل میں سے {{ $data->attempt_question }} مختصر جوابات تحریر
                            کریں ہر سوال کے نمبر برابر ہے
                        </p>
                    @else
                        <p class="attemp_question">Answers {{ $data->attempt_question }} Questions of the following
                        </p>
                    @endif
                @else
                    @if ($paper->papertype == 'urdu')
                        <p class="attemp_question"> درج زیل میں سے {{ $data->attempt_question }} جوابات تحریر
                            کریں ہر سوال کے نمبر برابر ہے
                        </p>
                    @else
                        <p class="attemp_question">Answers {{ $data->attempt_question }} of the following Questions
                            briefly</p>
                    @endif
                @endif
            @endif


            <div class="sectionB-C">
                <ol type="1">
                    @php
                        $sn = 0;
                    @endphp
                    @foreach ($data->paperquestion as $key => $ques)
                        @php
                            $sn += 1;
                        @endphp
                        @if ($data->name == 'B' || $data->name == 'ب' || $data->name == 'C' || $data->name == 'ج')
                            @if ($paper->papertype == 'urdu')
                                <li class="rightAfter" id="step{{ $sn }}"
                                    style="{{ $sn > 1 ? 'display:none;' : '' }}">
                                    {{-- <span> {{ $sn }})</span> --}}
                                    {!! $ques->question->question !!}

                                    <div>
                                        {{-- {!! $ques->question->question !!} <br> --}}
                                        <br>
                                        <textarea id="answer{{ $sn }}" class="abc" rows="3" cols="50"
                                            style="width:100%;resize: vertical; border-radius:10px;border:1px solid black; box-shadow:4px 4px 10px rgba(0,0,0,0.06);height:150px;"></textarea>
                                        <input type="hidden" id="questionId{{ $sn }}"
                                            value="{{ $ques->question->id }}">
                                    </div>
                                    <button class="button"
                                        onclick="submitAnswer({{ $sn }}, {{ $paper->id }})">Submit
                                        {{ $sn }}</button>
                                </li>
                            @else
                                {{--  @dd($ques->question->m_question)  --}}
                                <li class="leftAfter {{ $ques->question->m_question === 1 ? 'part-question' : '' }}"
                                    id="step{{ $sn }}" style="{{ $sn > 1 ? 'display:none;' : '' }}">
                                    <div>
                                        {{-- <span>{{ $sn }}.</span> --}}
                                    </div>
                                    <div>
                                        {!! $ques->question->question !!} <br>
                                        <br>
                                        <textarea id="answer{{ $sn }}" class="abc" rows="3" cols="50"
                                            style="width:100%;resize: vertical; border-radius:10px;border:1px solid black; box-shadow:4px 4px 10px rgba(0,0,0,0.06);height:150px;"></textarea>
                                        <input type="hidden" id="questionId{{ $sn }}"
                                            value="{{ $ques->question->id }}">
                                    </div>
                                    <button class="button"
                                        onclick="submitAnswer({{ $sn }}, {{ $paper->id }})">Submit
                                        {{ $sn }}</button>


                                </li>
                            @endif
                        @endif
                        <button class="button" id="nextBtn" style="display: none;" onclick="nextStep()">Next</button>
                    @endforeach
                </ol>
            </div>
        @endforeach

    </div>
    <script>
        // function nextStep(currentStep) {
        //     // Hide the current step
        //     document.getElementById('step' + currentStep).style.display = 'none';
        //     var nextStep = currentStep + 1;
        //     if (document.getElementById('step' + nextStep)) {
        //         document.getElementById('step' + nextStep).style.display = 'block';
        //     } else {
        //         alert('All questions submitted!');
        //     }
        // }

        function submitAnswer(currentStep, paperId) {
            // Get the answer from the textarea
            var answer = document.getElementById('answer' + currentStep).value;

            // Send AJAX request to save the answer
            var questionId = document.getElementById('questionId' + currentStep).value;
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // AJAX request
            fetch('{{ route('Ai.save.answer') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        question_id: questionId,
                        answer: answer,
                        paper_id: paperId,

                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Do something if the answer is successfully saved
                        console.log('Answer saved successfully');
                    } else {
                        // Handle error if needed
                        console.error('Failed to save answer');
                    }

                    // Continue to the next step
                    nextStep(currentStep);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function nextStep(currentStep) {
            // Hide the current step
            document.getElementById('step' + currentStep).style.display = 'none';

            // Remove highlight from the current step
            document.getElementById('step' + currentStep).classList.remove('highlight');

            // Show the next step
            var nextStep = currentStep + 1;
            if (document.getElementById('step' + nextStep)) {
                document.getElementById('step' + nextStep).style.display = 'block';
                document.getElementById('step' + nextStep).classList.add('highlight');
                document.getElementById('nextBtn').style.display = 'block';
            } else {
                alert('All questions submitted!');
                window.location.href = '{{ route('ai.question.paper') }}';

            }
        }
    </script>

</body>

</html>
