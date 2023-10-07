<!-- Checkout start -->
<div class="contant">
    <div id="banner-part" class="banner inner-banner">
        <div class="container">
            <div class="bread-crumb-main">
                <h1 class="banner-title">Add Address</h1>
                <div class="breadcrumb">
                    <ul class="inline">
                        <li><a href="<?= base_url() ?>">Home</a>
                        </li>
                        <li>Add Address</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <section class="mt-5">
            <div class="container-fluid p-0">
                <div class="row register_row">
                    <div class="col-md-6 ">
                        <form action="<?= base_url() ?>Order/change_address" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="heading-part " style="align-items: center;">
                                        <h3 class="mb-4">Select Address</h3>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <? if (!empty($address_data)) {
                                        foreach ($address_data as $address) {
                                    ?>
                                            <div class="bottom-11 p-3 over">
                                                <div class=" row add_sel">
                                                    <div class="col-1 col-md-1 p-0  " style="text-align: end;">
                                                        <input type="radio" name="address_id" value="<?= $address->id ?>" <? if ($address->is_default == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?> required="" data-gtm-form-interact-field-id="0">
                                                    </div>
                                                    <div class="col-10 col-md-11 ">
                                                        <p class="bottom-m"><b style="color: rgb(29, 29, 29);">First Name: </b> <a><?= $address->f_name ?></a></p>
                                                        <p class="bottom-m"><b style="color: rgb(29, 29, 29);">Last Name: </b> <a><?= $address->l_name ?></a></p>
                                                        <p class="bottom-m"><b style="color: rgb(29, 29, 29);"> Email Address: </b> <a><?= $address->email ?></a></p>
                                                        <p class="bottom-m"><b style="color: rgb(29, 29, 29);">Phone Number: </b> <a><?= $address->phone ?></a></p>
                                                        <p class="bottom-m"><b style="color: rgb(29, 29, 29);">State: </b><a> <?= $address->state ?></a></p>
                                                        <p class="bottom-m"><b style="color: rgb(29, 29, 29);">city: </b><a><?= $address->city ?></a></p>
                                                        <p class="bottom-m"><b style="color: rgb(29, 29, 29);">Address: </b><a><?= $address->address ?></a></p>
                                                        <p class="bottom-m"><b style="color: rgb(29, 29, 29);">Pincode: </b><a><?= $address->pincode ?></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <? }
                                    } else { ?>
                                        <div class="w-100 text-center mt-5 mb-5">
                                            <h5 class="text-center" style="color:#FF324D">Please add address for checkout</h5>
                                        </div>
                                    <? } ?>


                                    <div class="col-md-6  mt-3 mb-2 sxcds" style="margin-left: 37px;">
                                        <button type="submit" class="btn-color" style="padding: 10px 30px; border-radius: 5px ;"> Continue</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 col-md-12 col-12 ">
                        <div style="position: sticky;top: 120px;">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="heading-part  " style="align-items: center;">
                                        <h3 class="mb-4">Add New Address</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <form method="POST" action="<?= base_url() ?>Order/add_address_data" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <input type="text" required="" class="form-control" id="fname" onkeyup="saveValue(this);" name="fname" placeholder="First name *">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <input type="text" required="" class="form-control" id="lname" onkeyup="saveValue(this);" name="lname" placeholder="Last name *">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" required="" type="email" id="email" onkeyup="saveValue(this);" name="email" placeholder="Email Address *">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <input class="form-control" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" required="" type="text" id="phonenumber" onkeyup="saveValue(this);" name="phonenumber" placeholder="Phone Number *">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <input class="form-control" maxlength="6" minlength="6" required="" type="text" id="pincode" name="pincode" placeholder="Pincode *">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <div class="custom_select">
                                                    <select class="form-control first_null not_chosen" id="state" name="state" required="">
                                                        <option value="">---- Select State ----</option>
                                                <? foreach ($state_data->result() as $state) { ?>
                                                    <option value="<?= $state->state_name ?>"><?= $state->state_name ?></option>
                                                <? } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <input class="form-control" id="city" onkeyup="saveValue(this);" required="" type="text" name="city" placeholder="City *">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" required="" type="text" id="address" onkeyup="saveValue(this);" name="address" placeholder="Address *">
                                        </div>

                                        <div class="row detailborder">

                                            <div class="col-sm-8 col-12 mt-2">

                                                <button  type="submit" class="btn-color " style="padding: 10px 20px; border-radius: 6px;"> Add Address
                                                </button>
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
    </div>

</div>
<!-- Checkout end -->