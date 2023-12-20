<div class="banner-21">
    <div id="banner-part  " class="banner inner-banner inner-banner mb-3">
        <div class="container">
            <div class="bread-crumb-main">
                <!-- <h1 class="banner-title">Privacy Policy</h1> -->
                <div class="breadcrumb">
                    <ul class="inline">
                        <li><a href="<?= base_url() ?>">Home</a>
                        </li>
                        <li>Reset Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__login-area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Reset Password <br> </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="account-login-inner">
                        <form action="<?= base_url() ?>User/update_password/<?= $auth ?>" enctype="multipart/form-data" method="POST">
                            <label for="" class="form-label">Enter Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" id="pswd1" aria-label="Enter password"  name="reset_password" required>
                            <span id="message1" style="color:red"> </span>
                    </div>
                    <div class="btn-wrapper">
                        <button class="btn btn-fill-out btn-block text-uppercase mt-2 rounded-0 btn-color " style="padding: 14px 18px;" type="submit">Submit</button>
                    </div>
                    </form>
                    <div class="by-agree text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>