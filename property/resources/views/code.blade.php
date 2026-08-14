<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8" />
<title>Technological Inc</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<meta content="" name="author" />
</head>
<body>
	<div class="container" >

	<form action="/addlocation" method="post" class="col-md-6">
	<div>
		
			<h1>City</h1>
			<select name="city" id="city"  class="form-control"> 
				@foreach($cities as $city)
				<option value="{{ $city->id }}">{{$city->name}}</option>
				@endforeach
			</select><br>
			
				<div id="town-check" class="form-group">
					<h1>Towns</h1> <br>
					<a href="#" id="showtownbtn" hidden>click to dispaly town input</a>
					<select name="oldTown" id="town" class="townclass form-control" disabled="disabled">
						@foreach($towns as $town)
						<option value="{{ $town->id }}">{{$town->name}}</option>
						@endforeach
					</select>	<br>
						
		<!-- <button class="btn btn-primary editTown">Edit</button> -->
		<a href="#" class="editTown">Town Edit</a>

						
				</div>
					<a href="#" id="hidetownbtn">click to select town</a>
			
			
					
				
					<input type="text" name="town" id="towninput" placeholder="Town" required   class="form-control" >
					<br>
			
				
				<br>

				<div id="phase-check" class="form-group" >
					<h1>Phase</h1>	<br>
					<a href="#" id="showphasebtn" hidden>click to enter phase</a><br>
					<select name="oldphase" id="phase" disabled="disabled"  class="form-control">
						@foreach($phases as $phase)
						<option value="{{ $phase->id }}">{{$phase->name}}</option>

						@endforeach
						<a href="editphase/{{$phase->id}}"><button class="btn btn-primary">Edit</button></a>
					</select>
						<a href="#" class="editphase">Phase Edit</a>
					<br>


				</div>
					<a href="#" id="hidephasebtn" hidden>click to select phase</a><br>

							
					<input type="text"  class="form-control"  name="phase" id="phaseinput" placeholder="phase"  ><br>
				








				<div id="block-check" class="form-group">
					
					<select name="oldblock" id="block" disabled="disabled"  class="form-control">

						@foreach($blocks as $block)
						<option value="{{ $block->id }}">{{$block->name}}</option>
						@endforeach
					</select>
					<br>

				</div>
									
					
					<input type="text"  class="form-control"  name="block" placeholder="block" >
	<button type="submit" class="btn btn-success" >Submit </button>
		{{ csrf_field()}}
	</div>
	</form>
	<div class="row">
		<div class="col-sx-6">
		<form id="formUpdateTown">
			
		<input type="text" id="editTownField" name="name"  hidden>
		<button class="btn btn-primary updateTown" style="display: none;" >Town Update</button>
			
		</form>
		</div>

		<div class="col-sx-6">
	<form >
		
		<input type="text" id="editPhaseField" name="name"  hidden>
		<a href="/sss"><button class="btn btn-primary updatePhase" style="display: none;" >Phase Update</button></a>
	</form>
			
		</div>
		
	</div>
</div>
</body>
<footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#town-check").hide();
			$("#phase-check").hide();
			$("#block-check").hide();

			$('#hidetownbtn').click(function(event)
			{
				$('#hidetownbtn').hide();
				$('#showtownbtn').show();
				$('#towninput').hide();
	   			$('#towninput').prop("disabled", true);
				$("#town-check").show();
				event.preventDefault();
	   			$('#town').prop("disabled", false);
	   			$('#hidephasebtn').show();
			});
			$('#showtownbtn').click(function(event)
			{
				$('#hidetownbtn').show();
				$('#showtownbtn').hide();
				$('#towninput').show();
	   			$('#towninput').prop("disabled", false);
				$("#town-check").hide();
				event.preventDefault();
	   			$('#town').prop("disabled", true);
	   			$('#hidephasebtn').hide();
			});
			$('#hidephasebtn').click(function(event)
			{
				$('#hidephasebtn').hide();
				$('#showphasebtn').show();
				$('#phaseinput').hide();
	   			$('#phaseinput').prop("disabled", true);
				$("#phase-check").show();
				event.preventDefault();
	   			$('#phase').prop("disabled", false);
			});
			$('#showphasebtn').click(function(event)
			{
				$('#hidephasebtn').show();
				$('#showphasebtn').hide();
				$('#phaseinput').show();
	   			$('#phaseinput').prop("disabled", false);
				$("#phase-check").hide();
				event.preventDefault();
	   			$('#phase').prop("disabled", true);
			});

			function loadBlocks(){
				phase_id =$('#phase option:selected').val();
				// alert(phase_id);
				$.ajax({
					url: 'townPhase/'+phase_id,
					type: 'POST',
					datatype:'html',
					data:phase_id,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function (json) {
						$('#block').html(json); 
					}
				});
			}
			function loadPhases(){
				town_id =$('#town option:selected').val();
				$.ajax({
					url: 'cityTown/'+town_id,
					type: 'POST',
					datatype:'html',
					data:town_id,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function (json) {
						$('#phase').html(json); 
						loadBlocks();
					}
				});
			}
			function loadTowns(){
				id =$('#city option:selected').val()
				$.ajax({
					url: 'LocationCity/'+id,
					type:'POST',
					datatype:'html',
					data: id,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					success: function (json) {
						$('#town').html(json);
						loadPhases();
					}
				});
			}
			$('#city').change(function () { 
				loadTowns();
			});
			$('#town').change(function () {
				loadPhases();
			});
			$('#phase').change(function () {
				loadBlocks();
			});	
				$('.editTown').click(function(){

				var data =$( "#town option:selected" ).val();
				var string =$( "#town option:selected" ).text();
				$('#editTownField').show();
				$(".updateTown").removeAttr("style");
				$("#editTownField").val(string);
				$("#editTownField").attr("data-id" ,data);
				$(".editTown").removeAttr("style").hide();

				});

				$('.editphase').click(function(){

				var data =$( "#phase option:selected" ).val();
				var string =$( "#phase option:selected" ).text();
				$('#editPhaseField').show();
				$(".updatePhase").removeAttr("style");
				$("#editPhaseField").val(string);
				$("#editPhaseField").attr("data-id" ,data);
				$(".editPhase").removeAttr("style").hide();

				});

				

		 });
	</script>
	<script>
	$(document).ready(function()
	{	
		$('.updateTown').click(function(e)
		{
			e.preventDefault();
			id=$('#editTownField').data('id');
			data =$("#formUpdateTown").serialize();
		
			url ="updateTown/"+id;
			$.ajax({
				url:url,
				data:data,
				type:'post',
				datatype:'json',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				success: function () {
						 location.reload();
					}		
				});
					
		});


		$('.updatePhase').click(function()
		{
			id=$('#editPhaseField').data('id');
			
			alert(id);
		});


	});
	</script>
</footer>
</html>