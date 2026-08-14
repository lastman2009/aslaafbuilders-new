<div class="fixed-sidebar-left expand-bar">
	<ul class="nav navbar-nav side-nav nicescroll-bar">
		<li>
			<a href="/dashboard">
				<div class="icon-width pull-left">
					<span class="side-bar-icon"><i class="zmdi zmdi-view-dashboard"></i></span>
					<span class="side-bar-icon right-nav-text">Dashboard</span>
				</div>
				<div class="clearfix"></div>
			</a>
		</li>

		@if(Auth::user()->roleId() == 1)
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#user">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-accounts-alt">
                            <!-- <span class="aside-badge">5</span> -->
				
					</i>
					</span>
					<span class="side-bar-icon right-nav-text">Users</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="user" class="collapse collapse-level-1">
				<li>
					<a href="/dashboard/admin/users">Users List</a>
				</li>
			</ul>
		</li>
		
				<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#valueProperty">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-accounts-alt">
                            <!-- <span class="aside-badge">5</span> -->
				
					</i>
					</span>
					<span class="side-bar-icon right-nav-text">Value Property</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="valueProperty" class="collapse collapse-level-1">
				<li>
					<a href="/valueProperties">Value Property List</a>
				</li>
			</ul>
		</li>
	
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		
		
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#blogImageGallery">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-accounts-alt">
                            <!-- <span class="aside-badge">5</span> -->
				
					</i>
					</span>
					<span class="side-bar-icon right-nav-text">Blog Gallery</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="blogImageGallery" class="collapse collapse-level-1">
				<li>
					<a href="/uploadImagesView">Upload Blog Images</a>
				</li>
				<li>
					<a href="/blogImageGallery">Blog Gallery</a>
				</li>
			</ul>
		</li>
		@endif
		@if(Auth::user()->roleId() == 2)
		@if(Auth::user()->checkUserWebsite())
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#my_Website">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-compass"></i>
                    </span>
					<span class="side-bar-icon right-nav-text">My Website</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="my_Website" class="collapse collapse-level-1 two-col-list">
				<li>
					<a href="/dashboard/agency/website/{{App\AgencyWebsite::getId(Auth::id())}}">Website Settings</a>
					<a href="/dashboard/agency/staff/{{App\AgencyWebsite::getWebsiteId()}}">staff</a>
					<a href="/dashboard/agency/office/{{App\AgencyWebsite::getWebsiteId()}}">offices</a>
					<a href="/dashboard/themes">Preview Themes</a>	
					@if(Auth::user()->websitestaffandoffice() && App\User::checkAgent(Auth::id()))
					<a href="/{{App\AgencyWebsite::getWebsite(Auth::id())}}">View Website</a>
					@endif
				</li>
			</ul>
		</li>
		@endif
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-accounts-list">
                            {{--<span class="aside-badge">5</span>--}}
					</i>
					</span>
					<span class="side-bar-icon right-nav-text">Clients</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="ecom_dr" class="collapse collapse-level-1">
				<li>
					<a href="/client/create">Add Client</a>
				</li>
				<li>
					<a href="/client">Client List</a>
				</li>
				<li>
					<a href="/clientTrash">Trash List</a>
				</li>
			</ul>
		</li>
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		
		@if(App\User::checkVendor(Auth::id())  || App\User::checkArchitecture(Auth::id()))

		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#portfolio">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-folder-person"></i>
					</span>
					<span class="side-bar-icon right-nav-text">Portfolio</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="portfolio" class="collapse collapse-level-1">
					{{--@if(App\User::checkArchitecture(Auth::id()))
					
				<li>
					<a href="/dashboard/portfolio">Add Portfolio</a>
				</li>
					@endif--}}
					@if(App\User::checkVendor(Auth::id()))
					
				<li>
					<a href="/dashboard/product">Add Product</a>
				</li>
					@endif
							
				<li>
					<a href="/dashboard/portfolio">Add Portfolio</a>
				</li>
			</ul>
		</li>
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		@endif
		@endif
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-home"></i>
                    </span>
				
					<span class="side-bar-icon right-nav-text">Property Management</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="app_dr" class="collapse collapse-level-1">

				<li>
					<a href="/dashboard/property/add">Add Detail Property</a>
				</li>
				<li>
					<a href="/dashboard/property"> My Active / In-Active</a>
				</li>
				<li>
					<a href="/dashboard/saved/property">My Saved Properties</a>
				</li>
				<li>
					<a href="/dashboard/property/pending"> My pending</a>
				</li>
	

			@if(Auth::user()->roleId() == 1)
				<li>
					<a href="/dashboard/admin/property/pending">All pending</a>
				</li>
				<li>
					<a href="/dashboard/admin/property/active">All Active</a>
				</li>
				<li>
					<a href="/dashboard/admin/property/trash">All Trash</a>
				</li>
			@endif
			</ul>
		</li>

		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#savedPropertylists">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-shopping-basket"></i>
                    </span>
				
					<span class="side-bar-icon right-nav-text">Project Management</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="savedPropertylists" class="collapse collapse-level-1 two-col-list">
				<li>
					<a href="/dashboard/project/add">Add Project</a>
				</li>
				<li>
					<a href="/dashboard/project/pending">My Pending</a>
				</li>
				<li>
					<a href="/dashboard/project">Active / De-Active</a>
				</li>
				@if(Auth::user()->roleId() == 1)
				<li>
					<a href="/dashboard/admin/project/pending">All Pending</a>
				</li>
				<li>
					<a href="/dashboard/admin/project/active">All Active</a>
				</li>
				<li>
					<a href="/dashboard/admin/project/trash">All Trash</a>

				</li>
				@endif

			</ul>
		</li>


		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>

		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#searches">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-search"></i>
                    </span>
				
					<span class="side-bar-icon right-nav-text">Searches</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="searches" class="collapse collapse-level-1 two-col-list">
				<li>
					<a href="/dashboard/architecture/search">Architecture Search</a>
				</li>
				<li>
					<a href="/dashboard/vendor/search">Vendor Search</a>
				</li>
				<li>
					<a href="/dashboard/user/search/history">My Search History</a>
				</li>
				<li>
					<a href="/dashboard/inventory/search">Project & Property Search</a>
				</li>
				@if(Auth::user()->roleId() == 1)
				
				<li>
					<a href="/dashboard/admin/search/user/property">Agent Search</a> 
				</li> 
				<li>
					<a href="/dashboard/search/history">All Search History </a>
				</li> 
				@endif
			</ul>
		</li>
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		@if(Auth::user()->roleId() == 1)
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#website_activation">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-folder-person"></i>
					</span>
					<span class="side-bar-icon right-nav-text">Agencies Web</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="website_activation" class="collapse collapse-level-1">
				<li>
					<a href="/dashboard/admin/websiteRequestList">Request</a>
					<a href="/dashboard/admin/websiteActivationList">Active List</a>
					<a href="/dashboard/admin/websitedeActivationList">De-Active List</a>
					<a href="/dashboard/admin/website">Live Website Listing</a>

				</li>
			</ul>
		</li>
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		@endif
		@if(Auth::user()->roleId() == 1)
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#transfer_calculator">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-money"></i>
					</span>
					<span class="side-bar-icon right-nav-text">Transfer Calculator</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="transfer_calculator" class="collapse collapse-level-1">
				<li>
					<a href="/dashboard/admin/tax-rules">Tax Rules</a>
					<a href="/dashboard/admin/societies">Societies</a>
				</li>
			</ul>
		</li>
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		@endif
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#featuredadd">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-videocam-off"></i>
                    </span>
				
					<span class="side-bar-icon right-nav-text">Advertisement</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="featuredadd" class="collapse collapse-level-1 two-col-list">
				<li>
					@if(Auth::user()->roleId() == 2)
					<a href="/dashboard/user/active/advertising">Properties For Advertise</a>
					<a href="/dashboard/user/featured/approved">My Featured Properties</a>
					<a href="/dashboard/user/static/ads/approve">My Ads Managment</a>
					<a href="/dashboard/user/static/advertise">Add Static Or PopUp Ad</a>
					@endif
					@if(Auth::user()->roleId() == 1)
					<a href="/dashboard/admin/static/ads/approve">all Ads Managment</a>
					<a href="/dashboard/admin/featured/approved">All featured Properties</a>
					<a href="/dashboard/user/static/advertise">Add Static Or PopUp Ad</a>
					<a href="/dashboard/admin/create/package">Create Packages</a>
					<a href="/dashboard/admin/packages">Packages Listing</a>
					<a href="/dashboard/admin/package/trash">Packages Trash</a>
					@endif
				
				</li>
			</ul>
		</li>
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		<!--@if(Auth::user()->role_id ==2)	-->
		<!--@if(Auth::user()->checkUserWebsite())-->
		<!--<li>-->
		<!--	<a href="javascript:void(0);" data-toggle="collapse" data-target="#my_Website">-->
		<!--		<div class="icon-width pull-left">-->
		<!--			<span class="side-bar-icon">-->
  <!--                      <i class="zmdi zmdi-compass"></i>-->
  <!--                  </span>-->
		<!--			<span class="side-bar-icon right-nav-text">My Website</span>-->
		<!--		</div>-->
		<!--		<div class="pull-right carot-class">-->
		<!--			<i class="zmdi zmdi-caret-down"></i>-->
		<!--		</div>-->
		<!--		<div class="clearfix"></div>-->
		<!--	</a>-->
		<!--	<ul id="my_Website" class="collapse collapse-level-1 two-col-list">-->
		<!--		<li>-->
		<!--			<a href="/dashboard/agency/website/{{App\AgencyWebsite::getId(Auth::id())}}">Website Settings</a>-->
		<!--			<a href="/dashboard/agency/staff/{{App\AgencyWebsite::getWebsiteId()}}">staff</a>-->
		<!--			<a href="/dashboard/agency/office/{{App\AgencyWebsite::getWebsiteId()}}">offices</a>-->
		<!--			<a href="/dashboard/themes">Select Theme</a>	-->
		<!--			@if(Auth::user()->websitestaffandoffice() && App\User::checkAgent(Auth::id()))-->
		<!--			<a href="/{{App\AgencyWebsite::getWebsite(Auth::id())}}">View Website</a>-->
		<!--			@endif-->
		<!--		</li>-->
		<!--	</ul>-->
		<!--</li>-->
		<!--<li class="side-bar-icon text-center">-->
		<!--	<i class="zmdi zmdi-more dots-style"></i>-->
		<!--</li>-->
		<!--@endif-->
		<!--@endif-->
		@if(Auth::user()->roleId() == 1)
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#website_theme">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi  zmdi-photo-size-select-large"></i>
                    </span>
				
					<span class="side-bar-icon right-nav-text">Website Themes</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="website_theme" class="collapse collapse-level-1 two-col-list">
				<li>
					<a href="/dashboard/admin/createprofileTheme">Theme Upload</a>		
				</li>
				<li>
					<a href="/dashboard/themes">view Themes</a>		
				</li>
			</ul>
		</li>
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
	
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#blog">
				<div class="icon-width pull-left">
					<span class="side-bar-icon">
                        <i class="zmdi zmdi-blogger"></i>
                    </span>
				
					<span class="side-bar-icon right-nav-text">Blogs & tags</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="blog" class="collapse collapse-level-1 two-col-list">
				<li>
					<a href="/blogs/create">Add Blogs</a>
				</li>
				<li>
					<a href="/blogs">Blog List</a>
				</li>
				
				<li>
					<a href="/blogTrash">Trashed Blogs</a>
				</li>
				<li>
					<a href="/category/create">Add Category</a>
				</li>
				<li>
					<a href="/category">Category List</a>
				</li>
				<li>
					<a href="/categoryTrash">Trashed Category</a>
				</li>

				<li>
					<a href="/tag/create">Add Tags</a>
				</li>
				<li>
					<a href="/tag">Tags List</a>
				</li>
				<li>
					<a href="/tagTrash">Trashed Tags</a>
				</li>			
			</ul>
		</li>


		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		<li class="active">
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#location">
				<div class="icon-width pull-left">
				<span class="side-bar-icon">
					<i class="zmdi zmdi-file"></i>
				</span>

					<span class="side-bar-icon right-nav-text">Location</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="location" class="collapse collapse-level-1 two-col-list">
				<li>
					<a href="/dashboard/admin/location/add">Add Location</a>
					<a href="/dashboard/admin/location/edit">Edit Location</a>
	
				</li>
			</ul>
		</li>

		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		<li class="active">
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#map">
				<div class="icon-width pull-left">
				<span class="side-bar-icon">
					<i class="zmdi zmdi-file"></i>
				</span>

				<span class="side-bar-icon right-nav-text">Map Uploader</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="map" class="collapse collapse-level-1 two-col-list">
				<li>
					<a href="/upload_image_tiles">Upload Map</a>
					<a href="/show_uploaded_image">Display Maps</a>
					<a href="/dashboard/mapToPhase">Assign Map</a>
	
				</li>
			</ul>
		</li>
		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		<li class="active">
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#meta">
				<div class="icon-width pull-left">
				<span class="side-bar-icon">
					<i class="zmdi zmdi-file"></i>
				</span>

				<span class="side-bar-icon right-nav-text">Meta Tag</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="meta" class="collapse collapse-level-1 two-col-list">
				<li>
					<a href="/dashboard/meta">Add Meta</a>
	
				</li>
			</ul>
		</li>

			<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		<li class="active">
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#pages">
				<div class="icon-width pull-left">
				<span class="side-bar-icon">
					<i class="zmdi zmdi-file"></i>
				</span>

					<span class="side-bar-icon right-nav-text">About Us</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="pages" class="collapse collapse-level-1 two-col-list">
				<li>
					<a href="/dashboard/about-us-content">About Us</a>
					<a href="/dashboard/faqs/create">Add FAQ</a>
					<a href="/dashboard/faqs">FAQ List</a>
					<a href="/dashboard/faqs/trash">FAQ Trash List</a>
					<a href="/dashboard/career-center/edit">Career Center</a>
					<a href="/dashboard/privatePolicy/edit">Privacy Policy</a>
	
				</li>
			</ul>
		</li>

		<li class="side-bar-icon text-center">
			<i class="zmdi zmdi-more dots-style"></i>
		</li>
		<li class="active">
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#files">
				<div class="icon-width pull-left">
				<span class="side-bar-icon">
					<i class="zmdi zmdi-file"></i>
				</span>

					<span class="side-bar-icon right-nav-text">File</span>
				</div>
				<div class="pull-right carot-class">
					<i class="zmdi zmdi-caret-down"></i>
				</div>
				<div class="clearfix"></div>
			</a>
			<ul id="files" class="collapse collapse-level-1 two-col-list">
				<li>
					<a href="/dashboard/files">Add Files</a>
				</li>
			</ul>
		</li>
		@endif
	</ul>
</div>
