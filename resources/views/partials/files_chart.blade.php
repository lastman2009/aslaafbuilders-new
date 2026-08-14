
<!--<div id="boxes" class="home-popup">-->
<!--<div id="dialog" class="window"> -->
<!--<div id="san">-->
    
<!--<a href="#" id="close-img" ><img src="/assets/images/close-icon.webp" width="25" style="float:right; margin-right: -25px; margin-top: -20px;"></a>-->
<!--<a href="https://www.rightdeed.com/property/sale/lahore/zaamin-city-lahore/10-marla-plot-for-sale-in-zaamin-city-lahore/17042" class="redirect-url">-->
<!--<img src="/images/zaamin-pop.webp"  alt="Banner of Plot Sale" width="100%">-->
<!--</a>-->
<!--</div>-->
<!--</div>-->
<!--<div  id="mask"></div>-->
<!--</div>-->
<div class="container-fluid" id="filesRates">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center file-rate">
							<h3>Files Rates</h3>
							<p>Note:Files Rates are Volatile and subject to change any time. For latest updates please call (042) 35742250</p>
						</div>
						<div class="col-md-12 file-rateselect">
							<form id="graph-form" class="form-inline" action="">
								{{ csrf_field() }}
						    <select class="selectpicker" name="city_id" id="city" data-size="10">
				    	 	 	
					    	 	@foreach($cities as $city)
	                                    <option value="{{ $city->id }}">{{$city->name}}</option>
	                              @endforeach
								</select>
							  
								<select name="town_id" id="town"  class="selectpicker" data-size="10" >
                                 </select>
								<select name="phase_id" id="phase" class="selectpicker" data-size="10" >
                               	 </select>
								<select class="selectpicker" id="area" name="area" data-size="10" >
				    	 	 	<option value="0" selected>Select Area</option>		
								@for($i=1; $i<11; $i++)
								  <option value="{{$i}}">{{ $i }}</option>
								 @endfor
								</select>
								<select class="selectpicker" id="type" name="type">
				    	 	 	<option value="0">Select Area Type</option>		
				    	 	 	<option value="marla">Marla</option>		
				    	 	 	<option value="kanal">Kanal</option>		
								</select>
							</form>

							
						</div>
						<div class="col-md-12">
							<div class="col-md-7 no-padding" >
								<div class="mCustomScrollbar">
									<table class="table text-center">
									    <thead class="file_table">
										    <tr>
										        <th>Title</th>
										        <th>Date</th>
										        <th>Area</th>
										        <th>Price</th>
										        <th>Contact</th>
										    </tr>
									    </thead>
									    <tbody id="file-chart">
									     </tbody>
									</table>
								</div> 
							</div>
							<div class="col-md-5 chart">
								<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
							</div>
						</div>
					</div>
				</div>
			</div>


@section('chart_script')
<script type="text/javascript">

// $(document).ready(function() { 
  var id = '#dialog';
  var maskHeight = $(document).height();
  var maskWidth = $(window).width();
  $('#mask').css({'width':maskWidth,'height':maskHeight}); 
  $('#mask').fadeIn(500); 
  $('#mask').fadeTo("slow",0.2); 
        var winH = $(window).height();
  var winW = $(window).width();
        $(id).css('top',  winH/2-$(id).height()/2);
  $(id).css('left', winW/2-$(id).width()/2);
     $(id).fadeIn(2000);  
     
     document.onkeydown = function(evt) {
    evt = evt || window.event;
    var isEscape = false;
    if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc");
    } else {
        isEscape = (evt.keyCode === 27);
    }
    if (isEscape) {
        $('#mask').hide();
  $('.window').hide();
    }
};
     
     $('#close-img').click(function (e) {
  e.preventDefault();
  $('#mask').hide();
  $('.window').hide();
     });  
     $('#mask').click(function () {
  $(this).hide();
  $('.window').hide();
 });  
 
// });


		$(document).ready(function(){
            loadTowns();
		});
		
		$('#city').change(function () {
		loadTowns();
		});
		$('#town').change(function () {
		loadPhases();
		});
		$('#city').change(function () {
		sendAjaxCall();
		});
        
        $('#phase').change(function () {
		sendAjaxCall();
		});
		
		$('#area').change(function () {
		sendAjaxCall();
		});
	    
		$('#type').change(function () {
		sendAjaxCall();
		});
	   function loadTowns(){
                id =$('#city option:selected').val()
                $.ajax({
                    url: '/LocationCity_file/'+id,
                    type:'POST',
                    datatype:'html',
                    data: id,
                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {
                        console.log({twon: json.includes("html")});
                        if(!json.includes("html")){
                        $('#town').html(json);
                        loadPhases();
                        }else{
                            window.location.href = "/";
                        }
                    }
                });
            }
            function loadPhases()
            {
                town_id =$('#town option:selected').val();
                $.ajax({
                    url: '/cityTown_file/'+town_id,
                    type: 'POST',
                    datatype:'html',
                    data:town_id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {
                        console.log({fileSy: json.includes("html")});
                        if(!json.includes("html")){
                        $('#phase').html(json);
                        $('.selectpicker').selectpicker('refresh');
                        sendAjaxCall();
                        }else{
                            window.location.href = "/";
                        }
                    }
                });
            }

            function sendAjaxCall(){
	   			var data = $('#graph-form').serialize();
	   				$.ajax({
                    url: '/graphdata',
                    type: 'POST',
                    datatype:'html',
                    data:data,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {
                        console.log({twon: json.includes("html")});
                        if(!json.includes("html")){
                    	$('#file-chart').html(json);
                        }
                    }
                });

            }
$(document).ready(function(){
       // Add smooth scrolling to all links
       $("#filesRatesLink").on('click', function(event) {
    
           // Make sure this.hash has a value before overriding default behavior
           if (this.hash !== "") {
               // Prevent default anchor click behavior
               event.preventDefault();
    
               // Store hash
               var hash = this.hash;
                 hash= $(hash).offset().top - 80;
               // Using jQuery's animate() method to add smooth page scroll
               // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
               $('html, body').animate({
                   scrollTop: hash
               }, 800, function(){
    
                   // Add hash (#) to URL when done scrolling (default click behavior)
                //   window.location.hash = hash;
               });
           } // End if
       });
   });

</script>

@endsection

