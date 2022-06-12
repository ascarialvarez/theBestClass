@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> {{__('Edit Teacher')}}
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">{{__('Teacher List')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Edit Teacher')}}</li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.teacher.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                            <div class="col-3">
                                <label for="inputFirstName" class="form-label">{{__('Name')}} <sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="{{__('Name')}}" required value="{{$teacher->first_name}}">
                            </div>
                            <div class="col-3">
                                <label for="inputLastName" class="form-label">{{__('Last Name')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="{{__('Last Name')}}" required value="{{$teacher->last_name}}">
                            </div>
                            <div class="col-3">
                                <label for="inputEmail" class="form-label">{{__('Email')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required value="{{$teacher->email}}">
                            </div>
                            <div class="col-4">
                                <label for="inputAddress" class="form-label">{{__('Address')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Avenida María.." required value="{{$teacher->address}}">
                            </div>
                            <div class="col-3">
                                <label for="inputAddress2" class="form-label">{{__('Address 2')}}</label>
                                <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Apartmento, portal, o piso" value="{{$teacher->address2}}">
                            </div>
                            <div class="col-2">
                                <label for="inputCity" class="form-label">{{__('City')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputCity" name="city" placeholder="Madrid..." required value="{{$teacher->city}}">
                            </div>
                            <div class="col-2">
                                <label for="inputZip" class="form-label">{{__('Zip')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputZip" name="zip" required value="{{$teacher->zip}}">
                            </div>
                            <div class="col-3">
                                <label for="inputPhone" class="form-label">{{__('Phone')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+34 ......" required value="{{$teacher->phone}}">
                            </div>
                            <div class="col-2">
                                <label for="inputState" class="form-label">{{__('Gender')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <select id="inputState" class="form-select" name="gender" required>
                                    <option value="Male" {{($teacher->gender == 'Male')?'selected':null}}>{{__('Male')}}</option>
                                    <option value="Female" {{($teacher->gender == 'Female')?'selected':null}}>{{__('Female')}}</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="inputNationality" class="form-label">{{__('Nationality')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="ej: Española, alemana, ..." required value="{{$teacher->nationality}}">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-check"></i> {{__('Update')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>

@include('components.photos.photo-input')
@endsection
