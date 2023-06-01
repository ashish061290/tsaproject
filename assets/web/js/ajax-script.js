const form = document.querySelector("form.form-contact"),
	  statusTxt = form.querySelector("form.form-contact .out-message");
	  $("#EnquiryForm").submit(function(e) {
		e.preventDefault();
		statusTxt.style.color = "#F57009";
		statusTxt.style.display = "inline-block";
		statusTxt.innerText = "Sending your message...";
		//form.classList.add("disabled");
		var formData = $(this).serialize();
		var recaptchaResponse = grecaptcha.getResponse();
		formData += '&g-recaptcha-response=' + recaptchaResponse;
        $.ajax({
        type: "POST",
        url: 'message.php',
        data: formData, // serializes the form's elements.
        success: function(data){
		  if(data==1){
			alert('111');
			$("#message").html('<div class="alert alert-success">Form Submitted Success..</div>');
		  } if(data==2){
			$("#message").html('<div class="alert alert-danger">Form Submitted Failed Post Message Not Found..</div>');
		  } if(data==3){
			$("#message").html('<div class="alert alert-danger">Invalid Captcha Code Failed..</div>');
		  }
		  statusTxt.innerText='';
		  document.getElementById("EnquiryForm").reset();
        }
    });
});
$("#ContactForm").submit(function(e) {
	e.preventDefault();
	statusTxt.style.color = "#F57009";
	statusTxt.style.display = "inline-block";
	statusTxt.innerText = "Sending your message...";
	//form.classList.add("disabled");
	var form = $(this);
	$.ajax({
	type: "POST",
	url: 'contact-ajax.php',
	data: form.serialize(), // serializes the form's elements.
	success: function(data)
	{
	 //form.classList.remove("disabled");
	  alert(data); // show response from the php script.
	  document.getElementById("EnquiryForm").reset();
	}
});
});