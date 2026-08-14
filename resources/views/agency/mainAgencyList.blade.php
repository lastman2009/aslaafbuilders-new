@php
$title = "Agencies";
@endphp
@include("includes.title")

<style type="text/css">
.cf:before,
.cf:after {
    content: "";
    display: table;
}

.cf:after {
    clear: both;
}

.cf {
    zoom: 1;
}

/*-------------------------------------*/

.form-wrapper {
    width: 100%;
    padding: 15px;
    background: #444;
    background: transparent;
    display: flex;
}

.form-wrapper input {
    width: 90%;
    height: 40px;
    padding: 10px 15px;
    float: left;
    font: bold 15px "lucida sans", "trebuchet MS", "Tahoma";
    border: 1px solid #ccc;
    background: #eee;
    -moz-border-radius: 3px 0 0 3px;
    -webkit-border-radius: 3px 0 0 3px;
    border-radius: 3px 0 0 3px;
}
.form-wrapper input:focus{
    outline: none;
}
.form-wrapper input::-webkit-input-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}

.form-wrapper input:-moz-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}

.form-wrapper input:-ms-input-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}

.form-wrapper button {
    overflow: visible;
    position: relative;
    float: right;
    border: 0;
    padding: 0;
    cursor: pointer;
    height: 40px;
    width: 110px;
    font: bold 15px/40px "lucida sans", "trebuchet MS", "Tahoma";
    color: #fff;
    text-transform: uppercase;
    margin-right: 1px;
    background: #fc7303;
    -moz-border-radius: 0 3px 3px 0;
    -webkit-border-radius: 0 3px 3px 0;
    border-radius: 0 3px 3px 0;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
}

.form-wrapper button:hover {
    background: #fc7303;
}

.form-wrapper button:before {
    content: "";
    position: absolute;
    border-width: 8px 8px 8px 0;
    border-style: solid solid solid none;
    border-color: transparent #fc7303 transparent;
    top: 12px;
    left: -6px;
}
@media only screen and (max-width: 1199px){
    .form-wrapper input {
        width: 87.8%;
    }
}
@media only screen and (max-width: 991px){
    .form-wrapper input {
        width: 83.8%;
    }
}
@media only screen and (max-width: 767px){
    .form-wrapper input {
        width: 84%;
    }
}
@media only screen and (max-width: 753px){
    .form-wrapper input {
        width: 83.8%;
    }
}
@media only screen and (max-width: 753px){
    .form-wrapper input {
        width: 83.7%;
    }
}
@media only screen and (max-width: 400px){
    .padding-left{
        display: contents;
    }
}


span.chatter_avatar_circle {
    width: 162px;
    height: 156px;
    line-height: 145px;
    text-align: center;
    background: #263238;
    display: inline-block;
    border-radius: 0px;
    color: #fff;
    font-size: 70px;
}
</style>
<!-- banner-wraper starts -->
<div class="banner-wraper">

    <!-- slider ends -->


    <div class="banner-cover">
        <div class="container">
            <div class="row">
                <div class="banner-contents banner-contact col-md-12">
                    <div class="col-md-12 features">
                        <div class="feature-heading">
                            <h2><img src="assets/images/home-icon-contact.png">Agency <span>Listing</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- slider ends -->
<!-- Main Starts -->

<main class="main-section">

    <section class="agency-listing-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="/blog-search" class="form-wrapper cf">
                        <input type="text" name="name" placeholder="Search here...">
                        <button type="submit">Search</button>
                    </form>
                    <div class="col-md-9 col-sm-9 col-xs-12 padding-right padding-left">
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                @foreach($website_themes as $website_theme)


                                <div class="col-md-6 col-sm-12 col-xs-12 agency-list-section">
                                    <div class="row">
                                        <div class="col-md-12 padding-right">
                                            <div class="col-md-6 col-sm-6 col-xs-6 padding-left">
                                                <div class="img-container">
                                                    @if($website_theme->verified ==1 )
                                                    <a class="close-ribbon" data-toggle="tooltip" title="verified"><img src="../../assets/images/verified.png" alt="" /></a>
                                                    @endif
                                                    <div class="img-block">
<!-- <span class="chatter_avatar_circle"
style="background-color:#<?= substr(md5((string) $website_theme->agency_name), 0, 6) ?>">
{{ strtoupper(substr($website_theme->agency_name, 0, 1)) }}
</span> -->


@if(strpos($website_theme->logo ,'anything-logo') !== false)
<a href="/{{$website_theme->url}}"><span class="chatter_avatar_circle"
    style="background-color:#<?= substr(md5((string) $website_theme->agency_name), 0, 6) ?>">
    {{ strtoupper(substr($website_theme->agency_name, 0, 1)) }}
</span></a>
@else

<a href="/{{$website_theme->url}}"><img class="img-responsive" src="/images/logo/{{$website_theme->logo}}"></a>
@endif
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 padding-left">
    <div class="agency-list-detail">
        <a href="/{{$website_theme->url}}"><h2>{{$website_theme->agency_name}}</h2></a>
    </ul>
    <?php $string = (strlen($website_theme->address) > 75) ? substr($website_theme->address,0,75).'...' : $website_theme->address; ?>
    <li><i class="fa fa-map-marker"></i>{{$string}} </li>
</ul>
<div class="btn-agency-detail">
    <ul>
        <li><a href="javascript:void(0);" data-toggle="popover" title="Phone Number" data-content="@if(!empty($website_theme->contact_number))
            {{$website_theme->contact_number}}
            @else
            No Contact Given
            @endif" data-placement="top">Phone</a></li>
            <li><a class="agency-detail-view" href="/{{$website_theme->url}}">View</a></li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
</div>

@endforeach

</div>
</div>
{{ $website_themes->links() }}
</div>
<div class="col-md-3 col-sm-3 hidden-xs">
    <div class="recent-blogs text-center">
        <a href="/blog">
            <img src="/assets/images/sidebar_ad_1.jpg">
        </a>
    </div>
    <div class="recent-blogs text-center">
        <a href="/forums">
            <img src="/assets/images/sidebar_ad_2.jpg">
        </a>
    </div>
</div>
</div>
</div>
</div>
</section>


</main>
<!-- wraper ends -->
@include('includes.footer')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>