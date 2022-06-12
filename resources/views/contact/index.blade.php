
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> {{__('Send email')}}
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Send email')}}</li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <div class="mb-4">
                        <form class="row g-3" action="{{route('contact.store')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">{{__('Name')}}<sup><i class="bi bi-asterisk text-primary"></i>
                                </sup></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{__('Name')}}">
                                </div>
                                @error('name')
                                    <p><strong>{{$message}}</strong></p>
                                @enderror
                                <div class="col-md-3">
                                    <label for="inputEmail" class="form-label">{{__('Email')}}:<sup><i class="bi bi-asterisk text-primary"></i>
                                </sup></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="{{__('Email')}}">
                                </div>
                                @error('email')
                                    <p><strong>{{$message}}</strong></p>
                                @enderror
                                <div class="col-md-7">
                                    <label for="inputMessage" class="form-label">{{__('Message')}}:<sup><i class="bi bi-asterisk text-primary">
                                    </i></sup></label>
                                    <textarea class="form-control" id="mensaje" name="mensaje" placeholder="{{__('Message')}}"></textarea>
                                </div>
                                @error('mensaje')
                                    <p><strong>{{$message}}</strong></p>
                                @enderror
                            </div>
                           
                            
                            <div class="row mt-4">
                                <div class="col-12-md">
                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-plus"></i> {{__('Send')}}:
                                </button>
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
