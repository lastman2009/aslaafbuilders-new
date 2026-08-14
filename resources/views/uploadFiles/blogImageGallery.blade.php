@php
$title = "Blog Images Gallery";
@endphp

@include("includes_admin.title")
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@include( 'includes_admin.sidebar')
<style type="text/css">
    .label{
        display: inline;
        padding: 1.2em 1.6em 1.3em;
        font-size: 80%;
        font-weight: 800;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 1.25em;
        background: #00c0ef !important;
    }
    .panel{
    	background-color: #000 !important; 
    }
    .table-striped>tbody>tr:nth-of-type(odd){
    	    background-color: #282828 !important;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">


        <div class="row">
            <!-- Basic Table -->
            <div class="col-sm-12">
                <div class="panel panel-default card-view user-list-section">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <h2>Blog Image Gallery</h2>
                            <div class="table-wrap">
                                <div class="panel panel-default card-view user-list-portion">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                               <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Image</th>
                                                            <th>Image Url</th>
                                                            <th>Copy Url</th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                   
                                                       @foreach($images as $image)
                                                       <?php
                                                       	$ImageUpload = $image->image;
                          								$images_new = explode(';', $ImageUpload );

                                                       	
                                                       ?>
                                                       @foreach($images_new as $img)
                                                        <tr>
                                                            
                                                            <td><img src="/images/uploaded_images/{{$img}}" alt="Rightdeed" width="150" ></td>
                                                            <td>
                                                            	<input type="text" class="form-control copy-input" readonly value="{{asset('/images/uploaded_images')}}/{{$img}}"/>
                                                            	
                                                            </td>
                                                            	
                                                            <td><input type="button"  class="btn btn-success btn-copy" value="Copy"></td>	
                                                        </tr>
                                                        @endforeach
                                                        
                                                                                               
                                                        @endforeach                                            
                                                    </tbody>
                                                </table>
                                               

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Basic Table -->
        </div>
    </div>

<!-- /Row -->
@include('includes_admin.footer')

<script type="text/javascript" href="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">
	$('.btn-copy').on('click', function(){
  element = $(this).closest('td').prev('td')[0];
  var selection = window.getSelection();        
  var range = document.createRange();
  range.selectNodeContents(element);
  selection.removeAllRanges();
  selection.addRange(range);
  //Losely basd on http://stackoverflow.com/a/40734974/7668911
    try {
       var successful = document.execCommand('copy');
      if(successful) {
        $('.res').html("Coppied");
      }
       else
       { $('.res').html("Unable to copy!");} 
   } catch (err) {
      $('.res').html(err);
   }
});
</script>