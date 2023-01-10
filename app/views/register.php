<div class="container">
    <div class="form_register">
        <p class="email_error"></p>
        <p class="clon_error"></p>
        <div class="input-group mb-3">
            <span class="input-group-text">Email</span>
            <input type="text" class="form-control email">
        </div>

        <p class="name_error"></p>

        <div class="input-group mb-3">
            <span class="input-group-text">Name</span>
            <input type="text" class="form-control name">
        </div>
        <p class="login_error"></p>

        <div class="input-group mb-3">
            <span class="input-group-text">Login</span>
            <input type="text" class="form-control login">
        </div>
        <p class="password_error"></p>

        <div class="input-group mb-3">
            <span class="input-group-text">Password</span>
            <input type="text" class="form-control password">
        </div>

        <p class="confirm_password_error"></p>

        <div class="input-group mb-3">
            <span class="input-group-text">Confirm password</span>
            <input type="text" class="form-control confirm_password">
        </div>


        <button class="btn btn-outline-secondary register" type="button">Register</button>

    </div>
</div>


<script>

    $('.register').on('click', function () {

        $.post({
            url: 'add_user',
            data: {
                email: $('.email').val(),
                name: $('.name').val(),
                login: $('.login').val(),
                password: $('.password').val(),
                confirm_password: $('.confirm_password').val(),
            }
        }).done(function (data) {
            let responce = JSON.parse(data);

            if (responce.error != null) {

                if (responce.error.email != null) {
                    $('.email').css({'border': 'solid 1px red'});
                    $('.email_error').html(responce.error.email);
                } else {
                    $('.email').css({'border': 'solid 1px #ced4da'});
                    $('.email_error').html('');
                }
                if (responce.error.name != null) {
                    $('.name').css({'border': 'solid 1px red'});
                    $('.name_error').html(responce.error.name);
                } else {
                    $('.name').css({'border': 'solid 1px #ced4da'});
                    $('.name_error').html('');
                }
                if (responce.error.login != null) {
                    $('.login').css({'border': 'solid 1px red'});
                    $('.login_error').html(responce.error.login);
                }
                else {
                    $('.login').css({'border': 'solid 1px #ced4da'});
                    $('.login_error').html('');
                }
                if (responce.error.password != null) {
                    $('.password').css({'border': 'solid 1px red'});
                    $('.password_error').html(responce.error.password);
                }
                else {
                    $('.password').css({'border': 'solid 1px #ced4da'});
                    $('.password_error').html('');
                }
                if (responce.error.confirm_password != null) {
                    $('.confirm_password').css({'border': 'solid 1px red'});
                    $('.confirm_password_error').html(responce.error.confirm_password);
                }
                else {
                    $('.confirm_password').css({'border': 'solid 1px #ced4da'});
                    $('.confirm_password_error').html('');
                }
                if (responce.error.clon != null) {
                    $('.clon_error').css({'border': 'solid 1px red'});
                    $('.clon_error').html(responce.error.clon);
                }
                else {
                    $('.clon_error').css({'border': 'solid 1px #ced4da'});
                    $('.clon_error').html('');
                }
            } else {
                window.location.href = '/';
            }


        });

    });


</script>


<style>
    .form_register {
        width: 600px;
        margin: 100px auto;
        position: relative;
    }

    .btn-outline-secondary {
        position: absolute;
        right: 20px;
        bottom: -50px;
    }
</style>