<section class="mt-5">
    <div class="container-fluid pl-5 pr-5 pt-3 pb-5">
        <div class="register_row">
            <div class="col-md-12 d-flex justify-content-center">
                <div style="position: sticky;top: 120px;">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>Add Address</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="<?= base_url() ?>Home/add_address_data" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" required class="form-control"  name="fname" placeholder="First name *">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" required class="form-control"  name="lname" placeholder="Last name *">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control"  type="email"  name="email" placeholder="Email Address ">
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input class="form-control" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" required type="text"  name="phonenumber" placeholder="Phone Number *">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input class="form-control" maxlength="6" minlength="6" required type="text" name="pincode" placeholder="Pincode *" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <div class="custom_select">
                                            <select class="form-control" name="state" required>
                                                <option value="">---- Select State ----</option>
                                                <? foreach ($state_data->result() as $state) { ?>
                                                    <option value="<?= $state->state_name ?>" ><?= $state->state_name ?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input class="form-control" required type="text" name="city" placeholder="City *">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required type="text"  name="address" placeholder="Address *">
                                </div>

                                <div class="row detailborder">

                                    <div class="col-sm-12 col-12 mt-2 d-flex justify-content-center">
                                        <button class="btn btn-fill-out btn-block col-sm-8 mb-3" id="loader" disabled style="display:none">
                                            <i class="fa fa-spinner fa-spin"></i>Loading
                                        </button>
                                        <button type="submit" class="btn btn-fill-out btn-block col-sm-8 mb-3 gt" id="places">Save</a>
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