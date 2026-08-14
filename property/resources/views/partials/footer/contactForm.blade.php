<h3>FEEDBACK</h3>
<form  id="home_contact_form">
	 {{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control" placeholder="E-mail" id="email_contactus" name="email" required>
	</div>
	<div class="form-group">
		<textarea class="form-control" placeholder="Message for us" rows="5" id="comment" name="comment" required></textarea>
	</div>
	<button type="button" class="col-md-3 btn button_theme_color" id="home_contact">Submit</button> 
</form>	

@section('home_contactForm_script')
<script>

	$('#home_contact').click(function(){
		email = $('#email_contactus').val();	
		comment = $('#comment').val();
		if(email != "" && comment != "" && validateEmail(email))
		{
			 $.ajax({
		        url: '/home_contact_form',
		        type: 'post',
				data: $('#footer_contact_form').serialize(),
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		        success: function (result){
				
				}
			});
		}
		
		});

	function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
</script>

 
@endsection