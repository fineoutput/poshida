<!-- ============================================= START SECTION BREADCRUMB  ========================================-->
<div class="banner-21">
    <div id="banner-part  " class="banner inner-banner inner-banner mb-3">
        <div class="container">
            <div class="bread-crumb-main">
                <h1 class="banner-title">Register as reseller</h1>
                <div class="breadcrumb">
                    <ul class="inline">
                        <li><a href="<?= base_url() ?>">Home</a>
                        </li>
                        <li>Reseller Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================================= END SECTION BREADCRUMB ======================================= -->
    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-md-12">
                    <div class="login_wrap">
                        <!-- <form action="javascript:void(0)" id="reseller_resgisteration_form" method="POST" enctype="multipart/form-data"> -->
                        <form action="<?= base_url() ?>User/reseller_email_register" method="POST" enctype="multipart/form-data">
                            <div class="padding_eight_all bg-white">
                                <!-- <div class="heading_s1">
                                    <h3>Register as reseller</h3>
                                </div> -->
                                <div class="row" id="reseller_row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" required class="form-control" id="rename" name="fname" placeholder="Name *">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="verify" id="reverify" value="0" />
                                            <input type="email" required class="form-control" id="reemail" name="Email" placeholder="Email *">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="regstnumber" name="gstnumber" placeholder="GST Number">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="state" id="restate" required>
                                                <option value="">----- Select State ------</option>
                                                <? foreach ($state_data->result() as $state) { ?>
                                                    <option value="<?= $state->state_name ?>"><?= $state->state_name ?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="reshopname" name="shopname" required="" placeholder="Shop Name *">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" required class="form-control rounded-0" placeholder="Enter Password">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" required id="rephonenumber" name="phonenumber" placeholder="Phone Number *">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" required type="text" id="recity" name="city" placeholder="City*">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" required type="text" id="readdress" name="address" placeholder="Address *">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row hidden-OTP-field">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="reConfirmPhone" name="phone" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="reOTP" name="otp" placeholder="Enter OTP">
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-fill-out btn-block text-uppercase mt-2 rounded-0 btn-color " value="register">Register</button>
                                </div>
                                <!-- <div class="form-group text-center">
                                    <button type="submit" class="btn btn-fill-out btn-block text-uppercase mt-2 rounded-0 btn-color " id="reSendbtn" value="register">Send OTP</button>
                                </div> -->
                                <div class="different_login text-center">
                                    <span> or</span>
                                </div>
                                <div class="form-note text-center">Already have an account? <a href="#" data-toggle="modal" data-target="#LoginModel" data-dismiss="modal" style="color:#c68fa6;">Log in</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>