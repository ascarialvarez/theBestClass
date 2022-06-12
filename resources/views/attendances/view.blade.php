@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-calendar2-week-fill"></i> {{__('View Attendance')}}
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">{{__('Courses')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('View Attendance')}}</li>
                        </ol>
                    </nav>
                    @if(request()->query('course_name'))
                        <h3><i class="bi bi-compass"></i> {{__('Course')}}: {{request()->query('course_name')}} </h3>
                    @elseif(request()->query('section_name'))
                        <h3><i class="bi bi-diagram-2"></i> {{__('Section')}}: {{request()->query('section_name')}} </h3>
                    @endif
                    <div class="mt-4">{{__('Current Date and Time')}}: {{ date('d-m-Y H:i:s') }}</div>
                    <div class="row mt-4">
                        <div class="col bg-white border shadow-sm pt-2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('Student Name')}}</th>
                                        <th scope="col">{{__('Todays Status')}}</th>
                                        <th scope="col">{{__('Total Attended')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        @php
                                            $total_attended = \App\Models\Attendance::where('student_id', $attendance->student_id)->where('session_id', $attendance->session_id)->count();
                                        @endphp
                                        <tr>
                                            <td>{{$attendance->student->first_name}} {{$attendance->student->last_name}}</td>
                                            <td>
                                                @if ($attendance->status == "on")
                                                    <span class="badge bg-success">{{__('PRESENT')}}</span>
                                                @else
                                                    <span class="badge bg-danger">{{__('ABSENT')}}</span>
                                                @endif
                                                
                                            </td>
                                            <td>{{$total_attended}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
