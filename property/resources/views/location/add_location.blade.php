@php
$title = "Add Location";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')


<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-40">
                <div class="panel panel-default card-view add-location-pannel">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="col-md-8 col-md-offset-2 basic-srch">
                                <div class="srch-content">
                                    <form action="/addlocation" method="post">
                                        {{ csrf_field()}}
                                        <div class="form-select">
                                            <h4>City</h4>
                                            <select name="city" id="city" class="form-control form-select">
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                            <h4>Towns</h4>
                                            <div id="town-check" class="form-group"> <a href="#" id="showtownbtn" hidden>click to dispaly town input</a>
                                                <select name="oldTown" id="town"  class="townclass form-control" disabled="disabled">
                                                    @foreach($towns as $town)
                                                        <option value="{{ $town->id }}">{{$town->name}}</option>
                                                    @endforeach
                                                </select>

                                                <!-- <button class="btn btn-primary editTown">Edit</button> -->
                                                <!-- <a href="#" class="editTown">Town Edit</a> -->

                                            </div>
                                            <a href="#" id="hidetownbtn">click to select town</a>
                                            <input type="text" name="town" id="towninput" placeholder="Town" required   class="form-control" >
                                            <h4>Phase</h4>
                                            <div id="phase-check" class="form-group" > <a href="#" id="showphasebtn" hidden>click to enter phase</a>
                                                <select name="oldphase" id="phase"   disabled="disabled"  class="form-control phaseInput" >

                                                    @foreach($phases as $phase)
                                                        <option value="{{ $phase->id }}">{{$phase->name}}</option>
                                                    @endforeach
                                                </select>
                                                <!-- <a href="#" class="editphase">Phase Edit</a> -->
                                            </div>
                                            <a href="#" id="hidephasebtn" hidden>click to select phase</a>
                                            <input type="text"  class="form-control"  name="phase" id="phaseinput" placeholder="phase" required="" >
                                            <div id="block-check" class="form-group">
                                                <select name="oldblock" id="block"   disabled="disabled"  class="form-control">

                                                    @foreach($blocks as $block)
                                                        <option value="{{ $block->id }}">{{$block->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Blocks <small class="text-muted">(You can enter multiple blocks)</small></label>
                                                <input type="text" value="" data-role="tagsinput" name="block" class="form-control" placeholder="Block"/>
                                            </div>

                                            <button type="submit" class="btn btn-success btn-style" >Submit </button>

                                        </div>
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

                url ="/updateTown/"+id;
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