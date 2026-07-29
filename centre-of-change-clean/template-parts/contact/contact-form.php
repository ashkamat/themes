	<!-- ///////contact form start///// -->
		<section class="contact-section" aria-labelledby="contact-heading">
			
			<div class="innterContactform">

				<div class="contact-section__media">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/family_rainbow_pic.webp"
						alt="A family smiling together with rainbow face paint">
				</div>

				<div class="contact-section__form">
					<h2 id="contact-heading">Get in Touch</h2>

					<form action="#" method="post">
						<div class="form-field">
							<label for="contact-name">Name</label>
							<input type="text" id="contact-name" name="name" required>
						</div>

						<div class="form-field">
							<label for="contact-email">Email</label>
							<input type="email" id="contact-email" name="email" required>
						</div>

						<div class="form-field">
							<label for="contact-message">Message</label>
							<textarea id="contact-message" name="message" rows="6" required></textarea>
						</div>

						<button type="submit" class="button">Send</button>
					</form>
				</div>

			</div>

		</section>
		<!-- /////////contactform end  -->