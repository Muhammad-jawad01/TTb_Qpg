<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $paper->subject->name }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/paper.css') }}">

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
                            <span>کلاس : <b style="font-weight:bold">{{ $paper->class->name }}</b> </span>

                        </p>
                    @else
                        <p>Cadet College Spinkai (SWTD)</p>
                        <p><span>Paper : <b style="font-weight:bold">{{ $paper->subject->name }}</b> </span>
                            <span>Class : <b style="font-weight:bold">{{ $paper->class->name }}</b> </span>
                            <span>Term :<b style="font-weight:bold">{{ $paper->Term->name }}</b></span>
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
        <div class="topheader">
            {{--  @if ($paper->papertype == 'urdu')
                <p>ماڈل پیپر </p>


                <p>{{ $paper->subject->name }} پرچہ - {{ $paper->class->name }}</p>
            @else
                <p>Paper Model</p>
                <p>{{ $paper->subject->name }} Paper -{{ $paper->class->name }}</p>
            @endif  --}}
        </div>

        @foreach ($paper->partPart as $key => $data)
            @if ($data->name == 'A' || $data->name == 'الف')
                <div class="theadSection">
                    @if ($paper->papertype == 'urdu')
                        <p>کل نمبر : {{ $data->marks }}</p>

                        <p>سیکشن – {{ $data->name }}</p>
                        <p>کل وقت : {{ $data->time_allowed }} منٹ </p>
                    @else
                        <p>Time Allowed: {{ $data->time_allowed }} Minutes</p>
                        <p>SECTION – {{ $data->name }}</p>
                        <p>Marks : {{ $data->marks }}</p>
                    @endif
                </div>
            @endif


            <div class="msqus">
                <ol type="1">
                    @php
                        $sn = 0;
                    @endphp
                    @foreach ($data->paperquestion as $key => $ques)
                        @php
                            $sn += 1;
                        @endphp
                        @if ($data->name == 'A' || $data->name == 'الف')
                            @if ($paper->papertype == 'urdu')
                                <li class="rightAfter">

                                    <span> {{ $sn }})</span>
                                    {!! $ques->question->question !!}
                                </li>
                            @else
                                <li class="leftAfter">
                                    <span>{{ $sn }}.</span>

                                    {!! $ques->question->question !!}
                                </li>
                            @endif
                        @endif
                    @endforeach

                </ol>
            </div>
        @endforeach


    </div>
    <div style="page-break-before: always;"></div>
</body>

</html>




{{-- For B ^ C --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $paper->subject->name }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/paper.css') }}">
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
        <div class="topheader">
            {{--  @if ($paper->papertype == 'urdu')
                <p>ماڈل پیپر </p>


                <p>{{ $paper->subject->name }} پرچہ - {{ $paper->class->name }}</p>
            @else
                <p>Paper Model</p>
                <p>{{ $paper->subject->name }} Paper -{{ $paper->class->name }}</p>
            @endif  --}}
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
                                <li class="rightAfter">
                                    <span> {{ $sn }})</span>
                                    {!! $ques->question->question !!}
                                </li>
                            @else
                                {{--  @dd($ques->question->m_question)  --}}
                                <li class="leftAfter  {{ $ques->question->m_question === 1 ? 'part-question' : '' }}">
                                    <div>
                                        <span>{{ $sn }}.</span>
                                    </div>
                                    <div>
                                        {!! $ques->question->question !!}
                                    </div>

                                </li>
                            @endif
                        @endif
                    @endforeach

                </ol>
            </div>
        @endforeach

    </div>

</body>

</html>
