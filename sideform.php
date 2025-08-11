
<div class="container">
  <div class="side-form-container">
    <h2 class="side-form-header">Contact Us</h2>
    <form method="post" action="smailer.php">
      <div class="mb-3">
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
      </div>
      <div class="mb-3">
        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
      </div>
      <div class="mb-3">
        <select class="form-select" name="message" id="message" required>
          <option value="" disabled selected>Select Service</option>
          <option value="seo">SEO</option>
          <option value="sem">SMM</option>
          <option value="sem">SEM</option>
          <option value="Web Development">Web Development</option>
          <option value="Content Writing">Content Writing</option>
          <option value="Email Marketing">Email Marketing</option>
        </select>
      </div>
      <!-- <div class="mb-3">
        <input type="text" class="form-control" id="subject" placeholder="Subject" required>
      </div> -->
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Send Message</button>
      </div>
    </form>
  </div>
</div>

<br>


<!-- 
 <div class="bi-sidebar-widget headline ul-li-block">
								<div class="service-widget">
									<h3 class="widget-title">Main Services</h3>
									<div class="widget-area">
										<ul>
										<li><a href="seo.php"  >Search Engine Optimization</a></li>
                                        <li><a href="smm.php"  >Social Media Marketing</a></li>
                                        <li><a href="sem.php"  >Search Engine Marketing</a></li>
                                        <li><a href="web-development.php"  >Web Development</a></li>
                                        <li><a href="content-writing.php"  >Content Writing</a></li>
										<li><a href="email-marketing.php"  >Email Marketing</a></li>
										</ul>
									</div>
								</div>
							</div> 
							-->
							<!-- <div class="bi-sidebar-widget headline ul-li-block">
							<div class="service-widget">

							<div class=" border-form" id="forms">
					<div class="bi-single-sidebar">
                        <div class="banner-form">
                            <h3 class="text-center form-heading">Get Appointment</h3>
                            <form id="form" action="mailer.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required="">
                                </div>                             
                                <div class="form-group">
                                    <input type="tel" name="mobile" class="form-control" placeholder="Mobile Number" pattern="[6789][0-9]{9}" required="" oninvalid="this.setCustomValidity('Place your 10 digit mobile number Ex:9876543210')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group email-control">
                                <select name="service"  class="" placeholder="Service" required="">
                                <option value="">Choose A Service*</option>
                                <option value="website development">website development</option> 
                                <option value="website development">website development</option>
                                </select>
                                </div>                
                                 <input type="text" name="message" class="form-control" placeholder="Description" >
                                <button type="submit">Submit</button>
                            </form>
                            <p class="text-center pt-1 mb-0">Our executive will call you in 3-5 Minutes</p>
                        </div>
                    </div>


					</div>
                    </div> -->