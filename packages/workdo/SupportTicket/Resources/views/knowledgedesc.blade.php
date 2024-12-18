@extends('supportticket::layouts.master')
@section('page-title')
{{ __('Search Your Ticket') }}
@endsection
@section('content')

<div class="auth-wrapper auth-v1">
    <div class="bg-auth-side bg-primary"></div>
    <div class="auth-content">

        <nav class="navbar navbar-expand-md navbar-dark default dark_background_color">
            <div class="container-fluid pe-2">
                <a class="navbar-brand" href="#">
                    <img src="{{ !empty(company_setting('logo_light',$workspace->created_by)) ? get_file(company_setting('logo_light',$workspace->created_by)) : get_file(!empty(admin_setting('logo_light')) ? admin_setting('logo_light') : 'uploads/logo/logo_light.png') }}{{ '?' . time() }}" class="navbar-brand-img auth-navbar-brand" style="max-width: 110px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('knowledge',$workspace->slug)}}"><i class="ti ti-arrow-circle-left"></i>{{ __('Back') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row align-items-center justify-content-center text-start">
            <div class="col-xl-12 text-center">
                <div class="mx-3 mx-md-5">
                   
                </div>
                <div class="card">
                    <div class="card-body w-100">
                        <div class="">
                            <h4 class="text-primary mb-3">{{ $descriptions->title }}</h4>
                        </div>
                        <div class="text-start">
                            @if($descriptions->count())
                                <p class="mb-0">{!! $descriptions->description !!}</p>
                            @else
                                <h6 class="card-title mb-0 text-center">{{ __('No Knowledges found.') }}</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <p class="text-muted">{{env('FOOTER_TEXT')}}</p>
                    </div>
                    <div class="col-6 text-end">


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
@push('scripts')
    <script>
        // for Choose file
        $(document).on('change', 'input[type=file]', function () {
            var names = '';
            var files = $('input[type=file]')[0].files;

            for (var i = 0; i < files.length; i++) {
                names += files[i].name + '<br>';
            }
            $('.' + $(this).attr('data-filename')).html(names);
        });
    </script>
@endpush
