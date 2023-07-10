<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

</head>

<body style="background: linear-gradient(to right, #36d1dc, #5b86e5);">
    <div class="container py-5">
        @error('old_password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mx-5 my-5">
                    <div class="card">
                        <div class="card-header"> Update Password </div>
                        <div class="card-body">
                            <form action="{{ route('password.update',auth()->user()->id) }}" id="change_password" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group py-2 gap-3">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" class="form-control" id="old_password" name="old_password" />
                                    @if($errors->any('old_password'))
                                    <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group py-2">
                                    <label for="New_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" />
                                    @if($errors->any('new_password'))
                                    <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group py-2 pb-5">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" />
                                    @if($errors->any('confirm_password'))
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                                <button class="btn btn-primary center" type="submit">Update Password</button>
                                <a href="{{ route('setting.index') }}" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#change_password').validate({
            ignore: '.ignore',
            errorClass: 'Invalid',
            validClass: 'success',
            rules: {
                old_password: {
                    required: true,
                    minLength: 8,
                    maxLength: 255
                },
                new_password: {
                    required: true,
                    minLength: 8,
                    maxLength: 255
                },
                confirm_password: {
                    required: true,
                    equalTo: '#new_password'
                }

            },
            messages: {
                old_password: {
                    required: "Enter Your Old Password"
                },
                new_password: {
                    required: "Enter Your New Password"
                },
                confirm_password: {
                    required: "Confirm Your Password"
                }
            },
            submitHandler: function(form) {
                $.LoadingOverlay("show");
                form.submit();
            }
        })
    </script>

</body>
<!-- Template Main JS File -->
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.validate.min.js') }}"></script>

</html>