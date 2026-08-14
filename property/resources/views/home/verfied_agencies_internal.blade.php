<?php
   /**
    * Created by IntelliJ IDEA.
    * User: Naqash Ali Jutt
    * Date: 9/18/2018
    * Time: 4:44 PM
    */
   ?>
            <ul class="no-padding agencies list-inline" id="agencies">
               @foreach($featured_agencies as $agencies)
               <li>
                  <a href="/{{$agencies->url}}">
                     <img  class="agencies-images" src="/images/logo/{{$agencies->logo}}" alt="{{$agencies->id}}" />
                  </a>  
               </li>
               @endforeach
            </ul>
  