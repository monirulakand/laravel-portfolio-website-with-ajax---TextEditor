@extends('Layout.app')
@section('title','Contact')
@section('content')

    <div class="container-fluid jumbotron mt-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6  text-center">
                <h1 class="page-top-title mt-3">- যোগাযোগ করুন -</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.2614628474707!2d90.35591111452472!3d23.773701984577965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0a2db4ab937%3A0x859d0196ae53ac2!2s5%20Adabor%20Main%20Rd%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1600626924980!5m2!1sen!2sbd" width="530" height="360" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="col-md-6">
                <h3 class="service-card-title">ঠিকানা</h3>
                <hr>
                <p class="footer-text"><i class="fas fa-map-marker-alt"></i> আদাবর ৫, মোহাম্মদপুর, ঢাকা <i class="fas ml-3 fa-phone"></i> ০১৭৯২৭০৬৩০৪  <i class="fas ml-3 fa-envelope"></i>Engr.monirul@yahoo.com</p>

                <h5 class="service-card-title">যোগাযোগ করুন </h5>
                <div class="form-group ">
                    <input id="contactNameId" type="text" class="form-control w-100" placeholder="আপনার নাম">
                </div>
                <div class="form-group">
                    <input id="contactMobileId" type="text" class="form-control  w-100" placeholder="মোবাইল নং ">
                </div>
                <div class="form-group">
                    <input id="contactEmailId" type="text" class="form-control  w-100" placeholder="ইমেইল ">
                </div>
                <div class="form-group">
                    <input id="contactMsgId" type="text" class="form-control  w-100" placeholder="মেসেজ ">
                </div>
                <button id="contactSendBtnId" class="btn btn-block normal-btn w-100">পাঠিয়ে দিন </button>
            </div>
        </div>
    </div>

@endsection
