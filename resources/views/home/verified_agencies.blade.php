<?php
/**
 * Created by IntelliJ IDEA.
 * User: TECHNOLOGICAL COPR
 * Date: 9/18/2018
 * Time: 4:44 PM
 */
?>
<section class="verified-agencies-section">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="feature-heading">
                    <figure class="pull-left home-icon">
                        <img src="assets/images/agencies.png">
                    </figure>
                    <h2>VERIFIED <span>AGENCIES</span></h2>
                    <p>Find top agencies in your cities with verified data.</p>
                </div>
            </div>
            <div class="col-md-2 text-right">
                <ul class="list-inline">
                    {{--<li><a class="previous" href="{{ $featured_agencies->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right"></i></a></li>--}}
                    {{--<li><a class="next" href="{{ $featured_agencies->previousPageUrl() }}" rel="next"><i class="fa fa-angle-left"></i></a></li>--}}
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline">
                    @foreach($featured_agencies as $agencies)
                        <li>
                            <figure>
                                <img class="img-responsive" src="/images/logo/{{$agencies->logo}}" alt="{{$agencies->agency_name}}">
                            </figure>
                            <div class="hidden-panel">
                                <h3>{{$agencies->agency_name}}</h3>
                                <p>
                                    <span><i class="fa fa-phone"></i> {{$agencies->contact_number}}</span>
                                    <span><i class="fa fa-location-arrow"></i> {{$agencies->address}}</span>
                                </p>
                                <a href="{{$agencies->url}}" target="_blank">Web View</a>
                            </div>
                        </li>
                    @endforeach

                    {{--<li><a class="next"  rel="next">&laquo;</a></li>--}}
                    {{--<li><a class="previous"  rel="next">&raquo;</a></li>--}}

                </ul>
            </div>
        </div>
    </div>

</section>