<?php 
	print '
	<h1>Contact Form</h1>
	<div id="contact">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5562.564742282879!2d15.976295000000002!3d45.805603!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x522b1d058f50f68c!2sKing%20Tomislav!5e0!3m2!1sen!2shr!4v1623013090810!5m2!1sen!2shr" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		<form action="/send-contact.php" id="contact_form" name="contact_form" method="POST">
			<label for="fname">First Name *</label>
			<input type="text" id="fname" name="firstname" placeholder="Your name.." required>
			
			<label for="lname">Last Name *</label>
			<input type="text" id="lname" name="lastname" placeholder="Your last natme.." required>
				
			<label for="email">Your E-mail *</label>
			<input type="email" id="email" name="email" placeholder="Your e-mail.." required>

			<label for="country">Country</label>
			<select id="country" name="country">
				<option value="">Please select</option>
				<option value="BE">Belgium</option>
				<option value="HR" selected>Croatia</option>
				<option value="LU">Luxembourg</option>
				<option value="HU">Hungary</option>
			</select>

			<label for="subject">Subject</label>
			<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

			<input type="submit" value="Submit">
		</form>
	</div>';
?>