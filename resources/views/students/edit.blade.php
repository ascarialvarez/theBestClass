@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> {{__('Edit Student')}}
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">{{__('Student List')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Edit Student')}}</li>
                        </ol>
                    </nav>

                    @include('session-messages')
                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.student.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <div class="row g-3">
                                <div class="col-3">
                                    <label for="inputFirstName" class="form-label">{{__('Name')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="{{__('Name')}}" required value="{{$student->first_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputLastName" class="form-label">{{__('Last Name')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="{{__('Last Name')}}" required value="{{$student->last_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">{{__('Email')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" required value="{{$student->email}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputBirthday" class="form-label">{{__('Birthday')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="date" class="form-control" id="inputBirthday" name="birthday" placeholder="{{__('Birthday')}}" required value="{{$student->birthday}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress" class="form-label">{{__('Address')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Avenida María.." required value="{{$student->address}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputAddress2" class="form-label">{{__('Address 2')}}</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Apartmento, portal, o piso..." value="{{$student->address2}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputCity" class="form-label">{{__('City')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Madrid..." required value="{{$student->city}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputZip" class="form-label">{{__('Zip')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" required value="{{$student->zip}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputState" class="form-label">{{__('Gender')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputState" class="form-select" name="gender" required>
                                        <option value="Male" {{($student->gender == 'Male')?'selected':null}}>{{__('Male')}}</option>
                                        <option value="Female" {{($student->gender == 'Female')?'selected':null}}>{{__('Female')}}</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputNationality" class="form-label">{{__('Nationality')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="ej: Española, Alemana, ..." required value="{{$student->nationality}}">
                                </div>
                                <div class="col-2">
                                    <label for="inputBloodType" class="form-label">{{__('BloodType')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputBloodType" class="form-select" name="blood_type" required>
                                        <option value="A+" {{($student->blood_type == 'A+')?'selected':null}}>A+</option>
                                        <option value="A-" {{($student->blood_type == 'A-')?'selected':null}}>A-</option>
                                        <option value="B+" {{($student->blood_type == 'B+')?'selected':null}}>B+</option>
                                        <option value="B-" {{($student->blood_type == 'B-')?'selected':null}}>B-</option>
                                        <option value="O+" {{($student->blood_type == 'O+')?'selected':null}}>O+</option>
                                        <option value="O-" {{($student->blood_type == 'O-')?'selected':null}}>O-</option>
                                        <option value="AB+" {{($student->blood_type == 'AB+')?'selected':null}}>AB+</option>
                                        <option value="AB-" {{($student->blood_type == 'AB-')?'selected':null}}>AB-</option>
                                        <option value="Other" {{($student->blood_type == 'Other')?'selected':null}}>Other</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="inputReligion" class="form-label">{{__('Religion')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputReligion" class="form-select" name="religion" required>
                                        <option {{($student->religion == 'Islam')?'selected':null}}>Islam</option>
                                        <option {{($student->religion == 'Hinduism')?'selected':null}}>Hinduism</option>
                                        <option {{($student->religion == 'Christianity')?'selected':null}}>Christianity</option>
                                        <option {{($student->religion == 'Buddhism')?'selected':null}}>Buddhism</option>
                                        <option {{($student->religion == 'Judaism')?'selected':null}}>Judaism</option>
                                        <option {{($student->religion == 'Other')?'selected':null}}>Other</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputPhone" class="form-label">{{__('Phone')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+880 01......" required value="{{$student->phone}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputIdCardNumber" class="form-label">{{__('Id Card Number')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputIdCardNumber" name="id_card_number" placeholder="e.g. 2021-03-01-02-01 (Year Semester Class Section Roll)" required value="{{$promotion_info->id_card_number}}">
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>Parents' Information</h6>
                                <div class="col-3">
                                    <label for="inputFatherName" class="form-label">{{__('Fathers Name')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherName" name="father_name" placeholder="Father Name" required value="{{$parent_info->father_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputFatherPhone" class="form-label">{{__('Fathers Phone')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherPhone" name="father_phone" placeholder="+34 ......" required value="{{$parent_info->father_phone}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputMotherName" class="form-label">{{__('Mothers Name')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherName" name="mother_name" placeholder="Mother Name" required value="{{$parent_info->mother_name}}">
                                </div>
                                <div class="col-3">
                                    <label for="inputMotherPhone" class="form-label">{{__('Mothers Phone')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherPhone" name="mother_phone" placeholder="+34 ......" required value="{{$parent_info->mother_phone}}">
                                </div>
                                <div class="col-4">
                                    <label for="inputParentAddress" class="form-label">{{__('Address')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputParentAddress" name="parent_address" placeholder="Avenida..." required value="{{$parent_info->parent_address}}">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-check"></i> {{__('Update')}}</button>
                                </div>
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
