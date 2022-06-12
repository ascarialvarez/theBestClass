@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> {{__('Add student')}}
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Add student')}}</li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <p class="text-primary">
                        <small><i class="bi bi-exclamation-diamond-fill me-2"></i>{{__('Remember to create a related Class and Section before adding the student.')}}</small>
                    </p>
                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.student.create')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">{{__('Name')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="{{__('Name')}}" required value="{{old('first_name')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputLastName" class="form-label">{{__('Last Name')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="{{__('Last Name')}}" required value="{{old('last_name')}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">{{__('Email')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" required value="{{old('email')}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">{{__('Password')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="password" class="form-control" id="inputPassword4" name="password" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="formFile" class="form-label">{{__('Photo')}}</label>
                                    <input class="form-control" type="file" id="formFile" onchange="previewFile()">
                                    <div id="previewPhoto"></div>
                                    <input type="hidden" id="photoHiddenInput" name="photo" value="">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputBirthday" class="form-label">{{__('Birthday')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="date" class="form-control" id="inputBirthday" name="birthday" placeholder="{{__('Birthday')}}" required value="{{old('birthday')}}">
                                </div>
                                <div class="col-3-md">
                                    <label for="inputAddress" class="form-label">{{__('Address')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Avenida... número" required value="{{old('address')}}">
                                </div>
                                <div class="col-3-md">
                                    <label for="inputAddress2" class="form-label">{{__('Address Line 2')}}</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Apartmento, portal, o piso" value="{{old('address2')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputCity" class="form-label">{{__('City')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputCity" name="city" placeholder="Madrid..." required value="{{old('city')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputZip" class="form-label">{{__('Zip')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" required value="{{old('zip')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputState" class="form-label">{{__('Gender')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputState" class="form-select" name="gender" required>
                                        <option value="Male" {{old('gender') == 'male' ? 'selected' : ''}}>{{__('Male')}}</option>
                                        <option value="Female" {{old('gender') == 'female' ? 'selected' : ''}}>{{__('Female')}}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputNationality" class="form-label">{{__('Nationality')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputNationality" name="nationality" placeholder="ej: Española, Alemana, ..." required value="{{old('nationality')}}">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputBloodType" class="form-label">{{__('Blood Type')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputBloodType" class="form-select" name="blood_type" required>
                                        <option {{old('blood_type') == 'A+' ? 'selected' : ''}}>A+</option>
                                        <option {{old('blood_type') == 'A-' ? 'selected' : ''}}>A-</option>
                                        <option {{old('blood_type') == 'B+' ? 'selected' : ''}}>B+</option>
                                        <option {{old('blood_type') == 'B-' ? 'selected' : ''}}>B-</option>
                                        <option {{old('blood_type') == 'O+' ? 'selected' : ''}}>O+</option>
                                        <option {{old('blood_type') == 'O-' ? 'selected' : ''}}>O-</option>
                                        <option {{old('blood_type') == 'AB+' ? 'selected' : ''}}>AB+</option>
                                        <option {{old('blood_type') == 'AB-' ? 'selected' : ''}}>AB-</option>
                                        <option {{old('blood_type') == 'other' ? 'selected' : ''}}>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputReligion" class="form-label">{{__('Religion')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select id="inputReligion" class="form-select" name="religion" required>
                                        <option {{old('religion') == 'Islam' ? 'selected' : ''}}>Islam</option>
                                        <option {{old('religion') == 'Hinduism' ? 'selected' : ''}}>Hinduismo</option>
                                        <option {{old('religion') == 'Christianity' ? 'selected' : ''}}>Cristianismo</option>
                                        <option {{old('religion') == 'Buddhism' ? 'selected' : ''}}>Budismo</option>
                                        <option {{old('religion') == 'Judaism' ? 'selected' : ''}}>Judío</option>
                                        <option {{old('religion') == 'Others' ? 'selected' : ''}}>Otra</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputPhone" class="form-label">{{__('Telephone')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+34 ......" required value="{{old('phone')}}">
                                </div>
                                <div class="col-5-md">
                                    <label for="inputIdCardNumber" class="form-label">Dni<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputIdCardNumber" name="id_card_number" placeholder="e.g. 2021-03-01-02-01 (Year Semester Class Section Roll)" required value="{{old('id_card_number')}}">
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>{{__('Parents Information')}}</h6>
                                <div class="col-md-3">
                                    <label for="inputFatherName" class="form-label">{{__('Fathers name')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherName" name="father_name" placeholder="{{__('Fathers name')}}" required value="{{old('father_name')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputFatherPhone" class="form-label">{{__('Fathers phone')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputFatherPhone" name="father_phone" placeholder="+34 ......" required value="{{old('father_phone')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputMotherName" class="form-label">{{__('Mothers name')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherName" name="mother_name" placeholder="{{__('Mothers name')}}" required value="{{old('mother_name')}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputMotherPhone" class="form-label">{{__('Mothers phone')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputMotherPhone" name="mother_phone" placeholder="+34 ......" required value="{{old('mother_name')}}">
                                </div>
                                <div class="col-4-md">
                                    <label for="inputParentAddress" class="form-label">{{__('Address')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <input type="text" class="form-control" id="inputParentAddress" name="parent_address" placeholder="Avenida.." required value="{{old('parent_address')}}">
                                </div>
                            </div>
                            <div class="row mt-4 g-3">
                                <h6>{{__('Academic Information')}}</h6>
                                <div class="col-md-6">
                                    <label for="inputAssignToClass" class="form-label">{{__('Assign to class:')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select onchange="getSections(this);" class="form-select" id="inputAssignToClass" name="class_id" required>
                                        @isset($school_classes)
                                            <option selected disabled>{{__('Please select a class')}}</option>
                                            @foreach ($school_classes as $school_class)
                                                <option value="{{$school_class->id}}" >{{$school_class->class_name}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAssignToSection" class="form-label">{{__('Assign to section:')}}<sup><i class="bi bi-asterisk text-primary"></i></sup></label>
                                    <select class="form-select" id="inputAssignToSection" name="section_id" required>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputBoardRegistrationNumber" class="form-label">{{__('Board registration number:')}}</label>
                                    <input type="text" class="form-control" id="inputBoardRegistrationNumber" name="board_reg_no" placeholder="Registration No." value="{{old('board_reg_no')}}">
                                </div>
                                <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                            </div>
                            <div class="row mt-4">
                                <div class="col-12-md">
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-plus"></i>{{__('Add student')}}:</button>
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
<script>
    function getSections(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "{{route('get.sections.courses.by.classId')}}?class_id=" + class_id 

        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {
            var sectionSelect = document.getElementById('inputAssignToSection');
            sectionSelect.options.length = 0;
            data.sections.unshift({'id': 0,'section_name': 'Please select a section'})
            data.sections.forEach(function(section, key) {
                sectionSelect[key] = new Option(section.section_name, section.id);
            });
        })
        .catch(function(error) {
            console.log(error);
        });
    }
</script>
@include('components.photos.photo-input')
@endsection
