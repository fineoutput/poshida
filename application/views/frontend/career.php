<!-- Contact contant start -->
<div class="contant">
    <div id="banner-part" class="banner inner-banner">
        <div class="container">
            <div class="bread-crumb-main">
                <h1 class="banner-title">Career</h1>
                <div class="breadcrumb">
                    <ul class="inline">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li>Career</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-part pt-100" style="padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="add-ma pb-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3560.687782231552!2d75.8283773!3d26.8180683!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396dc9034cbdf60b%3A0x706185398ba5ee81!2sPoshida%20-%20Clothing%20Brand!5e0!3m2!1sen!2sin!4v1698230809773!5m2!1sen!2sin" height="585" style="border:0;width:100%;" allowfullscreen></iframe>



                    </div>

                    <div class="pb-100">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="contact-box mb-sm-20">
                                    <ul>
                                        <li>
                                            <div class="contact-thumb">
                                                <img src="<?= base_url() ?>assets/frontend/img/address-icon.svg" alt=" ">
                                            </div>
                                            <div class="contact-box-detail">
                                                <h4 class="contact-title">Visit Office</h4>
                                                <p>Plot No. 81, near Mahima Panache, Nandpuri B, Sheopur, Jagatpura, Jaipur, Rajasthan 302025</p>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="contact-thumb">
                                                <img src="<?= base_url() ?>assets/frontend/img/mail-icon.svg" alt=" ">
                                            </div>
                                            <div class="contact-box-detail">
                                                <h4 class="contact-title">Email</h4>
                                                <p>hr@poshida.in</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="contact-thumb">
                                                <img src="<?= base_url() ?>assets/frontend/img/phone-icon.svg" alt=" ">
                                            </div>
                                            <div class="contact-box-detail" style="cursor: pointer;">
                                                <h4 class="contact-title">Call Us</h4>
                                                <div class="d-flex">
                                                    <p>
                                                        <a href="tel:+91-6377898988">+91-6377898988 , </a>
                                                    </p>
                                                    <p>
                                                        <a href="tel:+0141-2988751"> 0141-2988751</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="heading-part mb-30">
                                    <h3>Join Our Team Now !</h3>
                                </div>
                                <div class="form-detail">
                                    <form method="POST" action="<?= base_url() ?>Home/carrier_form_submit" enctype="multipart/form-data" class="main-form">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input required placeholder="Enter Name *" name="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input required placeholder="Enter Email *" name="email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input required placeholder="Enter Number *" name="phone" type="text" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10">

                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group ">
                                                    <label class="mr-4">Upload your CV:</label>
                                                    <input type="file" required name="cv" style="border: 0px;     padding: 0px;">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn-color">Send Request</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact contant end -->
<script src="<?= base_url() ?>assets/frontend/js/jquery-3.4.1.min.js"></script>
<script>
	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>