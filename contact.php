<?php include('partials-front/menu.php'); ?>

<section class="contact-us">
        <div class="container">
            <h2 class="sub-text">CONTACT US</h2>
            <p class="text-center">
             If you wish to contact us via email please fill the following form and we will get in touch with you at the earliest.
            </p>
            <div class="contact-content">
            <div class="contact-details">
                    <div class="contact-info">
                        <div class="icon">
                            <img src="images/icons/address-icon.png" class="contact-img">
                        </div>
                        <div class="info">
                            <h3>Address</h3>
                            <p>Signature Cuisines, Main Street, Colombo 05</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="icon">
                            <img src="images/icons/phone-icon.png" class="contact-img">
                        </div>
                        <div class="info">
                            <h3>Phone</h3>
                            <p>(011) 456-7890</p>
                            <p>(011) 456-7899</p>
                        </div>
                    </div>
                    <div class="contact-info">
                        <div class="icon">
                            <img src="images/icons/email-icon.png" class="contact-img">
                        </div>
                        <div class="info">
                            <h3>Email</h3>
                            <p>signaturecuisines@gmail.com</p>
                        </div>
                    </div>
                    
                </div>
                <div class="contact-form">
                    <form action="process-contact.php" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
            <div id="map">
              <!-- Replace the following iframe code with your Google Map embed code -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1dYOUR_LATITUDE!2dYOUR_LONGITUDE!3dYOUR_ZOOM_LEVEL!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3AYOUR_PLACE_NAME!2sYOUR_PLACE_NAME!5e0!3m2!1sen!2sus!4vYOUR_GOOGLE_MAP_API_KEY" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            
        </div>
    </section>

<?php include('partials-front/footer.php'); ?>