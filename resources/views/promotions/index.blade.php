@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-sort-numeric-up-alt"></i> {{__('Promote Class Section')}}
                    </h1>
                    <h6>{{__('Filter list by')}}:</h6>
                    <div class="mb-4 mt-4">
                        <form action="{{route('promotions.index')}}" method="GET">
                            <div class="row">
                                <div class="col-3">
                                    <select class="form-select" name="class_id" required>
                                        @isset($previousSessionClasses)
                                            <option selected disabled>{{__('Please select a class')}}</option>
                                            @foreach ($previousSessionClasses as $school_class)
                                            <option value="{{$school_class->schoolClass->id}}">{{$school_class->schoolClass->class_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> {{__('Load List')}}</button>
                                </div>
                            </div>
                        </form>
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">{{__('Section Name')}}</th>
                                    <th scope="col">{{__('Promotion Status')}}</th>
                                    <th scope="col">{{__('Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($previousSessionSections)
                                    @foreach ($previousSessionSections as $previousSessionSection)
                                    <tr>
                                        <td>{{$previousSessionSection->section->section_name}}</td>
                                        <td>{{($currentSessionSectionsCounts > 0)?'Promoted': '{__('Not Promoted')}}'}}</td>
                                        <td>
                                            @if ($currentSessionSectionsCounts > 0)
                                            {{__('No action needed')}}
                                            @else
                                                <div class="btn-group" role="group">
                                                    <a href="{{route('promotions.create', ['previousSessionId' => $previousSessionId,'previous_section_id' => $previousSessionSection->section->id, 'previous_class_id' => $class_id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-sort-numeric-up-alt"></i> {{__('Promote')}}</a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection
