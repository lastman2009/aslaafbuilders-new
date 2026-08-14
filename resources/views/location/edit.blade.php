@include('includes_admin.header')
@include('includes_admin.sidebar')

<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 mt-40">
				<div class="panel panel-default card-view edit-location add-location-pannel">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="col-md-8 basic-srch col-xs-offset-2">
								<div class="srch-content">
									<form action="/editlocation" method="post">
										<div class="form-select">

											<h4>City</h4>
											<select name="city" id="city"  class="form-control">
												@foreach($cities as $city)
													<option value="{{ $city->id }}">{{$city->name}}</option>
												@endforeach
											</select><br>
											<div id="town-check" class="form-group">
												<h4>Towns</h4>

												<select name="oldTown" id="town" class="townclass form-control">

												</select>
												<a href="javascript:void(0)" class="editTown">Town Edit</a>

												<input type="text" id="editTownField" class="form-control edit-field" style="display: none" hidden>
												<!-- <button class="btn btn-primary updateTown" style="display: none;" >Town Update</button> -->

											</div>
											<div id="phase-check" class="form-group" >
												<h4>Phase</h4>
												<select name="oldphase" id="phase"  class="form-control">
												</select>
												<a href="javascript:void(0)" class="editphase">Phase Edit</a>

												<input type="text" id="editPhaseField" class="form-control edit-field" style="display: none" hidden>
												<!-- <a href="/sss"><button class="btn btn-primary updatePhase" style="display: none;" >Phase Update</button></a> -->

											</div>
											<div id="block-check" class="form-group">
												<h4>Block</h4>
												<select name="oldblock" id="block"  class="form-control">
												</select>
												<a href="javascript:void(0)" class="editblock">block edit</a>
												<input type="text" id="editblockField" class="form-control edit-field" style="display: none" hidden>
												<!-- <a href="/sss"><button class="btn btn-primary updateblock" style="display: none;" >block Update</button></a> -->
											</div>



											{{ csrf_field()}}
										</div>
										<button type="submit" class="btn btn-success btn-style">UPDATE</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>




	@include('includes_admin.footer')

	<script>
        $(document).ready(function(){
            loadTowns();

            function loadBlocks(){
                phase_id =$('#phase option:selected').val();
                // alert(phase_id);
                $.ajax({
                    url: '/townPhase/'+phase_id,
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
                    url: '/cityTown/'+town_id,
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
                    url: '/LocationCity/'+id,
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
                var name ="edittown";
                $('#editTownField').slideDown();
                $(".updateTown").removeAttr("style");
                $("#editTownField").val(string);
                $("#editTownField").attr("data-id" ,data);
                $(".editTown").removeAttr("style").hide();
                $('#editTownField').attr('name',name);
                $('#editTownField').attr('required','required');




            });

            $('.editphase').click(function(){

                var data =$( "#phase option:selected" ).val();
                var string =$( "#phase option:selected" ).text();
                var name ="editphase";

                $('#editPhaseField').slideDown();
                $(".updatePhase").removeAttr("style");
                $("#editPhaseField").val(string);
                $("#editPhaseField").attr("data-id" ,data);
                $(".editPhase").removeAttr("style").hide();
                $('.editphase').hide();
                $('#editPhaseField').attr('name',name);
                $('#editPhaseField').attr('required','required');
            });
            $('.editblock').click(function(){

                var data =$( "#block option:selected" ).val();
                var string =$( "#block option:selected" ).text();
                var name ="editblock";
                $('#editblockField').slideDown();
                $(".updateblock").removeAttr("style");
                $("#editblockField").val(string);
                $("#editblockField").attr("data-id" ,data);
                $(".editblock").removeAttr("style").hide();
                $('#editblockField').attr('name',name);
                $('#editblockField').attr('required','required');



            });

            // town =$('#town').val();
            // phase =$('#phase').val();
            // block =$('#block').val();

            // if(town == null){
            // 	$('.editTown').hide();
            // }
            // if(phase == null){
            // 	$('.editphase').hide();

            // }
            // if(block == null){
            // 	$('.editblock').hide();

            // }


        });
	</script>
	<!-- 	<script>
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
        </script> -->

