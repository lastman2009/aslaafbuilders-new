@php
$title = "Inventory Search";
@endphp
@include("includes_admin.title")
@include( 'includes_admin.sidebar')

<!-- Row -->
<div class="page-wrapper">
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-12 mt-40 inventory-search">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class txt-dark">Inventory Search.</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form action="/searchPropertyData" method="get">
                                {{ csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3 padding-left">
                                            <div class="form-group">
                                                <input type="text" name="id" class="form-control inventory-area"
                                                       placeholder="Property ID">
                                            </div>
                                        </div>
                                        <div class="col-md-3 padding-left">
                                            <div class="form-group">
                                                <select class="selectpicker" name="search_purpose"
                                                        data-style="form-control btn-default btn-outline">
                                                    <option value="">Select Purpose</option>
                                                    <option value="1">Sale</option>
                                                    <option value="2">Rent</option>
                                                    <option value="3">Wanted</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 padding-left">
                                            <div class="form-group">
                                                <select class="selectpicker" name="property_type"
                                                        data-style="form-control btn-default btn-outline">
                                                    <option value="">Select Type</option>
                                                    @foreach($propertyTypes as $propertyType)
                                                    <optgroup label="{{$propertyType->name}}">
                                                        @foreach($data[$propertyType->id] as $datas)
                                                        <option value="{{$datas->id}}">{{$datas->name}}</option>
                                                        @endforeach
                                                        <hr>
                                                    </optgroup>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 padding-left">
                                            <div class="form-group">
                                                <input type="number" name="area" class="form-control inventory-area"
                                                       placeholder="Type Area">
                                            </div>
                                        </div>
                                        <div class="col-md-6 padding-left">
                                            <div class="form-group">
                                                <select class="selectpicker" name="area_type"
                                                        data-style="form-control btn-default btn-outline">
                                                    <option value="">Select Area Unit</option>
                                                    <option value="Square Feet">Square Feet</option>
                                                    <option value="Square Yards">Square Yards</option>
                                                    <option value="Square Meters">Square Meters</option>
                                                    <option value="Marla">Marla</option>
                                                    <option value="Kanal">Kanal</option>
                                                    <option value="Acre">Acre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 padding-left">
                                            <div class="form-group">
                                                <input type="number" name="min_price"
                                                       class="form-control inventory-area" placeholder="Rs. Min Price">
                                            </div>
                                        </div>
                                        <div class="col-md-3 padding-left">
                                            <div class="form-group">
                                                <input type="number" name="max_price"
                                                       class="form-control inventory-area" placeholder="Rs. Max Price">
                                            </div>
                                        </div>

                                        <div class="col-md-6 padding-left">
                                            <select class="selectpicker" name="city_id"
                                                    data-style="form-control btn-default btn-outline">
                                                <option value="">Select City</option>
                                                @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{$city->name}}
                                                </option>

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 padding-left">
                                            <button type="submit" name="inventory_search_page" value="on"
                                                    class="btn btn-submit-webinfo btn-client btn-anim"><i
                                                        class="fa fa-search"></i><span class="btn-text">Search</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 inventory-search">
                <div class="panel panel-default card-view inventory-add-class-padding">
                    <h6 class="panel-title inventory-add-class client-list-heading txt-dark">Inventory Search
                        Result.</h6>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_property" class="table display  pb-30">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Listed Date</th>
                                            <th>Location</th>
                                            <th>Area</th>
                                            <th>Controls</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($properties))
                                        @foreach($properties as $property)

                                        <tr>
                                            <td><?php if (strlen(strip_tags($property->title)) > 30) echo substr(strip_tags(strip_tags($property->title)), 0, 10) . '...'; else echo strip_tags(($property->title)); ?></td>
                                            <td>{{$property->price}}</td>
                                            <td>{{date('M jS, Y',strtotime($property->created_at))}}</td>
                                            <td>{{$property->address}}</td>
                                            <td>{{$property->area}} {{$property->area_type}}</td>

                                            <td>
                                                <a href="/property/{{App\Property::getPurpose($property->purpose)}}/{{App\Property::getCityName($property->city_id)}}/{{App\Property::getTownName($property->town_id)}}/{{App\Property::getTitleSlug($property->title)}}/{{$property->id}}"
                                                   class="pr-20" title="View" data-toggle="tooltip"><i class="fa fa-eye"
                                                                                                       aria-hidden="true"></i></a>

                                                <a href="/dashboard/property/quickedit/{{App\Property::getId($property->id)}}"
                                                   class="  " data-toggle="tooltip" data-original-title="Quick Edit">
                                                    <i class="fa fa-pencil-square-o text-inverse "></i>
                                                </a>

                                                <a href="javascript:void(0)" class="mr-5 trash"
                                                   data-id="{{$property->id}}" data-toggle="tooltip"
                                                   data-original-title="Delete">
                                                    <i class="fa fa-trash-o text-inverse m-r-10"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                        {{$properties->appends(request()->query())->links()}}
                                        @endif
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- /Row -->

        @include( 'includes_admin.footer' )

        <script>
          $(document).ready(function () {
            $('#datable_property').DataTable({
              "bPaginate": false
            });
          });
        </script>

        <script>
          $(document).ready(function () {

            $(function () {
              $('.toggle-icon').click(function () {
                $(this).find('i').toggleClass('fa-unlock fa-lock');
              });
            });

            $('.toggle-icon').click(function () {
              var id = $(this).attr('id');


              if ($('.status-user-' + id).text() == 'Published') {
                $('.status-user-' + id).text('Un-Published').removeClass('active-text').addClass('blocked-text');

              } else {

                $('.status-user-' + id).text('Published').removeClass('blocked-text').addClass('active-text');

              }
              url = 'propertyBlockorActive/' + id;

              if (confirm('Are you sure you want to change Status?')) {

                $.ajax({
                  datatype: 'json',
                  url: url,
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data: id,
                  type: 'post',
                  success: function (e) {
                  }
                });
              }

            });

            $('.trash').click(function () {
              var current = $(this);
              var id = $(this).data('id');
              var url = 'trashProperty/' + id;

              if (confirm('Are you sure you want to trash this?')) {
                $.ajax({
                  datatype: 'json',
                  url: url,
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data: id,
                  type: 'post',
                  success: function (e) {
// console.log(e.success);
                    current.parent().parent().remove();

                  }
                });
              }
            });
          });
        </script>