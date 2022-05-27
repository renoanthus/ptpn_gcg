<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
    </script>

    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    <link href="{{ asset('assets') }}/login-aset/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="{{-- asset('assets') --}}login-aset/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="{{ asset('assets') }}/login-aset/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="{{ asset('assets') }}/login-aset/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo') }}/favicon.ico" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/logo') }}/favicon.ico" type="image/x-icon">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope&family=Playfair+Display:ital@1&family=Poppins&family=DM+Sans&family=Mulish&family=DM+Serif&family=Open+Sans&family=Roboto&display=swap"
        rel="stylesheet">

    <!-- Page Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}sass/login.css" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body>

    <section id="masuk" class="h-100">
        <div class="container-fluid px-0 h-100 position-relative">
            <div class="row h-100 mx-0">
                <div class="col-lg-6 px-0 align-self-center d-flex justify-content-center">
                    <div class="logo text-center">
                        <figure class="mb-0 mb-lg-4 mx-auto">
                            <img src="{{ asset('assets') }}/images/logo/logo ptpn 13.png" class="h-100 w-100">
                        </figure>
                        {{-- <h3 class="mulish-regular color-828282">Koperasi Perkebunan</h3> --}}
                        <h1 class="poppins-normal color-828282">PT. Perkebunan Nusantara XIII</h1>
                    </div>
                </div>
                <div class="col-lg-6 d-flex pl-lg-0">
                    <div class="inner p-4 align-self-lg-center d-flex justify-content-center w-100">
                        <div class="w-100 w-lg-75">
                            <p class="poppins-normal color-828282 font-16">Selamat Datang</p>
                            <h1 class="poppins-normal color-828282 mb-4">Login dengan Akun Anda</h1>
                            <form id="formMasuk" action="" method="POST">
                                @csrf
                                @if (\Session::has('error'))
                                <div class="alert alert-danger mb-0">
                                    <p class="align-center mb-0">{!! \Session::get('error') !!}</p>
                                </div>
                                @endif
                                <div class="mb-4 mt-2">
                                    <label for="email"
                                        class="form-label roboto-regular font-16 color-4A5568">Email</label>
                                    <div class="validation-wrapper position-relative">
                                        <input type="email"
                                            class="form-control pr-5 @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="Masukkan Email Anda">
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password"
                                        class="form-label roboto-regular font-16 color-4A5568">Password</label>
                                    <div class="validation-wrapper position-relative">
                                        <input type="password" class="form-control pr-5" id="password" name="password"
                                            placeholder="Masukkan Password Anda">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button
                                            class="btn btn-block btn-masuk roboto-regular font-16 text-white">Login</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('login.google') }}"
                                            class="btn btn-block btn-info font-16 text-white"><i
                                                class="fab fa-google"></i> Google</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center credit mb-0 manrope-normal color-BDBDBD font-14 my-5 my-lg-0 w-100">© 2021 PT.
                Perkebunan Nusantara XIII. All rights reserved</p>
        </div>
    </section>

    <!--begin::Global Theme Bundle -->
    <script src="{{ asset('assets') }}/login-aset/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/login-aset/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts -->
    <script src="{{ asset('assets') }}/login-aset/snippets/custom/pages/user/login.js" type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('/') }}assets/plugin/jquery-validation/dist/jquery.validate.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.btn-masuk', function() {
                console.log('a');
                location.href = '/redirect'
            });
            $( "#formMasuk" ).validate( {
                rules: {
                    email: "required",
                    password: "required",
                    email: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    email: {
                        required: "Mohon masukkan Email Anda",
                        minlength: "Email minimal 3 huruf",
                        email: "Mohon masukkan format Email yang valid. mis. abcd@abcd.com"
                    },
                    password: {
                        required: "Mohon masukkan Password Anda",
                        minlength: "Password minimal 5 huruf/angka"
                    }
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block text-danger" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents( ".validation-wrapper" ).addClass( "has-feedback" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }

                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if ( !element.next( "span" )[ 0 ] ) {
                        $( "<span class='validate-icon fa font-24 fa-times position-absolute'></span>" ).insertAfter( element );
                    }
                },
                success: function ( label, element ) {
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if ( !$( element ).next( "span" )[ 0 ] ) {
                        $( "<span class='validate-icon fa font-24 fa-check position-absolute'></span>" ).insertAfter( $( element ) );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".validation-wrapper" ).addClass( "text-danger" ).removeClass( "text-success" );
                    $( element ).next( "span" ).addClass( "fa-times" ).removeClass( "fa-check" );
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".validation-wrapper" ).addClass( "text-success" ).removeClass( "text-danger" );
                    $( element ).next( "span" ).addClass( "fa-check" ).removeClass( "fa-times" );
                }
            } );
        });
    </script>

    <!--end::Page Scripts -->
</body>

<!-- end::Body -->

</html>