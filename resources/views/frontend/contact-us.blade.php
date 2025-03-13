<div id="slider">
    <div id="first-slider">
        <div id="carousel-example-generic" class="carousel slide carousel-fade">
            <div class="carousel-inner" role="listbox">
                <!-- Item 1 -->
                <div class="item active slide1">
                    <img src="{{asset('images/banner/contact.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<section id="aboutus" class="about_us_area  rs-contact row">
    <div class="container">
        <div class="row about_row" style="padding-top:0;">
            <div class="tittle wow fadeInUpBig" style="text-align: left; visibility: visible;">
                <h1 class="welc-text">
                    Contact Us</h1><br>
            </div>
            <div class=" ">
                <div class="contact-bg">
                    <div class="col-md-5 margin">
                        <div class="contact-address">
                            <h4>Mississauga: Head Office</h4>
                            <div class="address-item">
                                <div class="address-icon">
                                    <i class="fa fa-map-marker"></i></div>
                                <div class="address-text">
                                    <strong>Address </strong><br>
                                    2233 Argentia Road, East Tower, Suite 302 Mississauga, ON L5N 2X7
                                </div>
                            </div>
                            <div class="address-item">
                                <div class="address-icon">
                                    <i class="fa fa-phone"></i></div>
                                <div class="address-text">
                                    <strong>Phone:</strong> <br>
                                    (905) 586 0440
                                </div>
                            </div>
                            <div class="address-item">
                                <div class="address-icon">
                                    <i class="fa fa-envelope-open-o"></i></div>
                                <div class="address-text">
                                    <strong>E-mail:</strong> <br>
                                    info@just2canada.ca
                                </div>
                            </div>
                            <br>
                            <br>


                            <h4>Just To Canada – India Office</h4>
                            <div class="address-item">

                                <div class="address-icon">
                                    <i class="fa fa-map-marker"></i>                                    </div>
                                <div class="address-text">
                                    <strong>Address </strong><br>

                                    Level 10, Plot No. 18-20,

                                    HT House

                                    Kasturba Gandhi Marg<br>
                                    New Delhi-110001, India                           </div>
                            </div>




                            <div class="address-item">
                                <div class="address-icon">
                                    <i class="fa fa-phone"></i>                                    </div>
                                <div class="address-text">
                                    <strong>Phone:</strong> <br>
                                    +91 11 68137776                           </div>
                            </div>


                            <div class="address-item">
                                <div class="address-icon">
                                    <i class="fa fa-phone"></i>                                    </div>
                                <div class="address-text">
                                    <strong>Cell / Text / Whatsapp – Mr. Manas Sareen, Regional Manager</strong> <br>
                                    India Operations: +91-70114-94977                         </div>
                            </div>

                            <div class="address-item">
                                <div class="address-icon">
                                    <i class="fa fa-envelope-open-o"></i>                                    </div>
                                <div class="address-text">
                                    <strong>E-mail:</strong> <br>
                                    Manas@just2canada.ca                           </div>
                            </div>


                            <br>
                            <br>


                            <h4>British Columbia (Burnaby Office)</h4>
                            <div class="address-item">
                                <div class="address-icon">
                                    <i class="fa fa-map-marker"></i></div>
                                <div class="address-text">
                                    <strong> Address </strong><br>
                                    501 – 3292 Production Way
                                    Burnaby, <br>BC V5A 4R4, Canada
                                </div>
                            </div>
                            <div class="address-item">
                                <div class="address-icon">
                                    <i class="fa fa-phone"></i></div>
                                <div class="address-text">
                                    <strong>Toll Free:</strong> <br>
                                    1-866-210-9842
                                </div>
                            </div>
                            <div class="address-item">
                                <div class="address-icon">
                                    <i class="fa fa-envelope-open-o"></i></div>
                                <div class="address-text">
                                    <strong>E-mail:</strong> <br>
                                    info@just2canada.ca
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="margin col-md-7">
                        <div class="tittle wow fadeInLeft" style="visibility: visible;">
                            <h2>Let’s Start a Conversation Today!</h2>
                        </div>
                        <div class="contact-form">
                            <div id="form-messages"></div>
                            <form class="text-left   row-20 ng-pristine ng-valid" action="/contact-us.php" method="post"
                                  enctype="multipart/form-data" name="contactus" id="contactus" accept-charset="UTF-8">
                                <input type="hidden" name="submitted" id="submitted" value="1">

                                <!-- <input type='hidden' name='' value=''/>

                                <input type='hidden'  class='spmhidip' name='' /> -->

                                <div><span class="error"></span></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field">
                                            <i class="fa fa-address-book-o"></i>
                                            <input type="text" placeholder="Name" id="txtName" name="name" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field">
                                            <i class="fa fa-envelope-o"></i>
                                            <input type="email" placeholder="E-Mail" id="txtEmail" name="email"
                                                   required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field">
                                            <i class="fa fa-phone"></i>
                                            <input type="text" placeholder="Phone Number" id="txtPhone_number"
                                                   name="phone" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field">
                                            <i class="fa fa-gear"></i>
                                            <select placeholder="Service Type" id="ddrService_Type" name="Service Type"
                                                    required="">
                                                <option value="">Service Type</option>
                                                <option value="Working Visas">Working Visas</option>
                                                <option value="Study Visas"> Study Visas</option>
                                                <option value="Business Visas"> Business Visas</option>
                                                <option value="Tourist Visas">Tourist Visas</option>
                                                <option value="Enquiry / Message from an Existing client">Enquiry /
                                                    Message from an Existing client
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-field">
                                    <textarea placeholder="Your Message Here" rows="4" id="txtMessage" name="message"
                                              style="margin-bottom:0;" required=""></textarea>
                                </div>
                                <div class="form-button">
                                    <div class="g-recaptcha" data-sitekey="6LfdOBAdAAAAAJDLvl34HfmepwpwzrE-0wh09EFg">
                                        <div style="width: 304px; height: 78px;">
                                            <div>
                                                <iframe title="reCAPTCHA"
                                                        src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfdOBAdAAAAAJDLvl34HfmepwpwzrE-0wh09EFg&amp;co=aHR0cHM6Ly9qdXN0MmNhbmFkYS5jYTo0NDM.&amp;hl=en&amp;v=g9jXH0OtfQet-V0Aewq23c7K&amp;size=normal&amp;cb=4pmphascz8rk"
                                                        role="presentation" name="a-1tv4dwul9z1t" scrolling="no"
                                                        sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                                                        width="304" height="78" frameborder="0"></iframe>
                                            </div>
                                            <textarea id="g-recaptcha-response" name="g-recaptcha-response"
                                                      class="g-recaptcha-response"
                                                      style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                        </div>
                                        <iframe style="display: none;"></iframe>
                                    </div>
                                    <button type="submit" class="btn button_all shine-btn" value="Submit">SUBMIT NOW
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="clear"></p>
                    <br>
                    <br>
                    <div class="col-md-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.4245226292624!2d-79.74782408450405!3d43.597701779123234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b6a874d57715d%3A0x428a9f993149b4c1!2sEast%20Tower%2C%202233%20Argentia%20Rd%20%23302%2C%20Mississauga%2C%20ON%20L5N%206A6%2C%20Canada!5e0!3m2!1sen!2sin!4v1644574758462!5m2!1sen!2sin"
                            style="border:0;" allowfullscreen="" loading="lazy" width="100%" height="450"></iframe>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <br>
                        <br>
                        <div class="tittle wow fadeInLeft" style="visibility: visible;">
                            <h2>Got immigration or visa problems?</h2>
                        </div>
                        <p>Office hours: 9:00 AM – 5.00 PM (Mon-Fri) except for national holidays. We are always ready
                            to help our clients in need. Contact us now!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
