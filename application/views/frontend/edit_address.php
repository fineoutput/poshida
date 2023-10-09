<section class="mt-5">
    <div class="contant">
        <div id="banner-part" class="banner inner-banner">
            <div class="container">
                <div class="bread-crumb-main">
                    <h1 class="banner-title">Edit Address</h1>
                    <div class="breadcrumb">
                        <ul class="inline">
                            <li><a href="<?= base_url() ?>">Home</a>
                            </li>
                            <li>Edit Address</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pl-5 pr-5 pt-3 pb-5">
            <div class="register_row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div style="position: sticky;top: 120px;">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>Edit Address</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="<?= base_url() ?>Home/edit_address_data" enctype="multipart/form-data">
                                    <input type="hidden" name="t" value="<?= $t ?>">
                                    <input type="hidden" name="address_id" value="<?= $address_data->id ?>">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <input type="text" required class="form-control" value="<?= $address_data->f_name ?>" name="fname" placeholder="First name *">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="text" required class="form-control" value="<?= $address_data->l_name ?>" name="lname" placeholder="Last name *">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" value="<?= $address_data->email ?>" name="email" placeholder="Email Address ">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <input class="form-control" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" required type="text" value="<?= $address_data->phone ?>" name="phonenumber" placeholder="Phone Number *">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input class="form-control" maxlength="6" minlength="6" required type="text" name="pincode" placeholder="Pincode *" value="<?= $address_data->pincode ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <div class="custom_select">
                                                <select class="form-control" name="state" required>
                                                    <option value="">---- Select State ----</option>
                                                    <? foreach ($state_data->result() as $state) { ?>
                                                        <option value="<?= $state->state_name ?>" <? if ($state->state_name == $address_data->state) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?= $state->state_name ?></option>
                                                    <? } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input class="form-control" value="<?= $address_data->city ?>" required type="text" name="city" placeholder="City *">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required type="text" value="<?= $address_data->address ?>" name="address" placeholder="Address *">
                                    </div>

                                    <div class="row detailborder">

                                        <div class="col-sm-12 col-12 mt-2 d-flex justify-content-center">
                                            <button class="btn btn-fill-out btn-block col-sm-8 mb-3" id="loader" disabled style="display:none">
                                                <i class="fa fa-spinner fa-spin"></i>Loading
                                            </button>
                                            <button type="submit"  class="btn-color " id="places">Update</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>