<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('approved_by_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('design_description')->nullable();
            $table->integer('bed')->nullable();
            $table->integer('bath')->nullable();
            $table->integer('area')->nullable();
            $table->string('area_type')->nullable();
            $table->integer('purpose')->nullable();
            ///////// new entry ///////
            $table->string('wanted_purpose')->nullable();
            $table->text('video')->nullable();
            $table->string('youtube_link')->nullable();
            $table->integer('central_heating')->nullable();
            $table->integer('facility_disabled')->nullable();
            $table->string('other_facilities')->nullable();
            $table->string('property_no')->nullable();
            $table->date('expire_date')->nullable();
            ///////////// new close ....//////
            $table->integer('property_type_id');
            $table->integer('status')->default(0);
            $table->string('construction_status')->nullable();
            $table->integer('construction_year')->nullable();
            $table->string('featured_image')->nullable();
            $table->text('gallery')->nullable();
            $table->string('price')->nullable();
            $table->string('ownership_status')->nullable();
            $table->string('occupancy_status')->nullable();
            $table->integer('total_floor')->nullable();
            $table->string('parking_space')->nullable();
            $table->boolean('double_glazed_window')->nullable();
            $table->boolean('central_ac')->nullable();
            $table->string('flooring')->nullable();
            $table->string('electricity_backup')->nullable();
            $table->string('waste_disposal')->nullable();
            $table->boolean('furnished')->nullable();
            $table->boolean('internet')->nullable();
            $table->boolean('cabel_tv')->nullable();
            $table->boolean('intercom')->nullable();
            $table->string('near_bank')->nullable();
            $table->string('near_school')->nullable();
            $table->string('near_hospital')->nullable();
            $table->string('near_shopping_mall')->nullable();
            $table->string('near_restaurant')->nullable();
            $table->string('distance_airport')->nullable();
            $table->string('distance_railway')->nullable();
            $table->boolean('near_water_filter')->nullable();
            $table->boolean('near_public_transport')->nullable();
            $table->boolean('servant_quarter')->nullable();
            $table->boolean('drawing_room')->nullable();
            $table->integer('no_of_kitchens')->nullable();
            $table->boolean('study_room')->nullable();
            $table->boolean('prayer_room')->nullable();
            $table->boolean('powder_room')->nullable();
            $table->boolean('gym')->nullable();
            $table->integer('no_of_store_room')->nullable();
            $table->boolean('lounge')->nullable();
            $table->boolean('laundry_room')->nullable();
            $table->boolean('swimming_pool')->nullable();
            $table->boolean('sauna')->nullable();
            $table->boolean('jacuzzi')->nullable();
            $table->boolean('community_club')->nullable();
            $table->boolean('ground')->nullable();
            $table->boolean('maintenance')->nullable();
            $table->boolean('security')->nullable();
            $table->boolean('elevator')->nullable();
            $table->boolean('conference_room')->nullable();
            $table->boolean('visitor_parking')->nullable();
            $table->boolean('dinning_room')->nullable();

            $table->boolean('lawn')->nullable();
            $table->integer('view_count')->nullable();
            $table->integer('property_view_count')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('block_id');
            $table->string('myself')->nullable();
            $table->integer('phase_id');
            $table->integer('town_id');
            $table->integer('city_id');
            $table->integer('min_area_residential')->nullable();
            $table->string('min_area_type_residential')->nullable();
            $table->integer('max_area_residential')->nullable();
            $table->string('max_area_type_residential')->nullable();
            $table->integer('min_area_commercial')->nullable();
            $table->integer('min_area_type_commercial')->nullable();
            $table->integer('max_area_commercial')->nullable();
            $table->integer('max_area_type_commercial')->nullable();
            $table->boolean('beautiful_modern_planning')->nullable();
            $table->boolean('24_hours_ectricity_backup')->nullable();
            $table->boolean('wide_carpeted_roads')->nullable();
            $table->boolean('underground_sewerage_system')->nullable();
            $table->boolean('underground_electricity_supply')->nullable();
            $table->boolean('fitness_center')->nullable();
            $table->boolean('restaurant')->nullable();
            $table->boolean('dancing_fountain')->nullable();
            $table->boolean('parks')->nullable();
            $table->boolean('play_grounds')->nullable();
            $table->boolean('zoo')->nullable();
            $table->boolean('commercial_center')->nullable();
            $table->boolean('community_center')->nullable();
            $table->boolean('cc_tv_surveillance')->nullable();
            $table->boolean('gated_community')->nullable();
            $table->boolean('high_class_finishing')->nullable();
            $table->boolean('independent_drive_way')->nullable();
            $table->boolean('security_service')->nullable();
            $table->boolean('underground_plumbing')->nullable();
            $table->boolean('underground_water_supply')->nullable();
            $table->boolean('solid_wood_finishes')->nullable();
            $table->boolean('imported_kitchens')->nullable();
            $table->boolean('boundary_wall')->nullable();
            $table->boolean('wide_roads_with_green_belts')->nullable();
            $table->boolean('mosques')->nullable();
            $table->boolean('gas')->nullable();
            $table->boolean('housekeeping_laundry_facility')->nullable();
            $table->boolean('room_service')->nullable();
            $table->boolean('tv_cable_network')->nullable();
            $table->boolean('hot_cold_water_supply')->nullable();
            $table->boolean('cafe')->nullable();
            $table->boolean('roof_top_barbeque')->nullable();
            $table->boolean('valet_car_parking')->nullable();
            $table->boolean('car_rental_service')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
