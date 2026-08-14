<div class="modal fade agent-modal" id="agentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center"><strong>Register yourself as  </strong>RightDeed Property Agent</h4>
                </div>
                <div class="modal-body">
                    <form  class="form-horizontal" method="POST" action="/agenct_signup" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                           
                            <div class="col-sm-6">
                                 <label><span class="primary-color"><sup>*</sup></span> Name:</label>
                                 <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required placeholder="Name" required>
    
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                             
                            <div class="col-sm-6">
                                <label><span class="primary-color"><sup>*</sup></span> Email / Phone No:</label>
                                 <input id="username" type="text" class="form-control" name="username" placeholder="Email / Phone" required>
                            </div>
                        </div> 
                        
                        
                        <div class="form-group">
                            
                            <div class="col-sm-6">
                                <label ><span class="primary-color"><sup>*</sup></span> Company Name:</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Company Name" required>
                            </div>
                             <div class="col-sm-6">
                                 <label ><span class="primary-color"><sup>*</sup></span>Company Telephone:</label>
                                <input type="text" name="company_telephone" class="form-control"  placeholder="Telephone" required> 
                            </div>
                        </div> 
                        
                        
                         <div class="form-group">
                           
                            <div class="col-sm-6">
                                 <label><span class="primary-color"><sup>*</sup></span> Company Location:</label>
                                <input type="text" name="company_location" class="form-control"  placeholder="Company Location" required>  
                            </div>
                             <div class="col-sm-6">
                                 <label ><span class="primary-color"><sup>*</sup></span> Password</label>
                                <input type="password" name="password" class="form-control"  id="password-field2" placeholder="Password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong> 
                                        </span>
                                    @endif
                                <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                   <label ><span class="primary-color"><sup>*</sup></span> Select City:</label>
                                <select class="selectpicker agency-signupdrop col-sm-12 no-padding" name="city_id" id="city" data-style="form-control btn-font btn-default btn-outline" title="--Select City--" >
                                  

																		 
																		<option value="1">Lahore
																		</option>  
																		<option value="2">Karachi
																		</option>  
																		<option value="3">Islamabad
																		</option>  
																		<option value="4">Rawalpindi
																		</option>  
																		<option value="5">Abbottabad
																		</option>  
																		<option value="6">Astore
																		</option>  
																		<option value="7">Attock
																		</option>  
																		<option value="8">Awaran
																		</option>  
																		<option value="9">Badin
																		</option>  
																		<option value="10">Bagh
																		</option>  
																		<option value="11">Bahawalnagar
																		</option>  
																		<option value="12">Bahawalpur
																		</option>  
																		<option value="13">Bannu
																		</option>  
																		<option value="14">Bhakkar
																		</option>  
																		<option value="15">Bhimber
																		</option>  
																		<option value="16">Burewala
																		</option>  
																		<option value="17">Chaghi
																		</option>  
																		<option value="18">Chakwal
																		</option>  
																		<option value="19">Chiniot
																		</option>  
																		<option value="20">Chitral
																		</option>  
																		<option value="21">Chunian
																		</option>  
																		<option value="22">Dadu
																		</option>  
																		<option value="23">Daska
																		</option>  
																		<option value="24">Dera Ghazi Khan
																		</option>  
																		<option value="25">Dera Ismail Khan
																		</option>  
																		<option value="26">Duniya Pur
																		</option>  
																		<option value="27">FATA
																		</option>  
																		<option value="28">Faisalabad
																		</option>  
																		<option value="29">Fateh Jang
																		</option>  
																		<option value="30">Galyat
																		</option>  
																		<option value="31">Ghotki
																		</option>  
																		<option value="32">Gilgit
																		</option>  
																		<option value="33">Gujar Khan
																		</option>  
																		<option value="34">Gujranwala
																		</option>  
																		<option value="35">Gujrat
																		</option>  
																		<option value="36">Gwadar
																		</option>  
																		<option value="37">Hafizabad
																		</option>  
																		<option value="38">Haripur
																		</option>  
																		<option value="39">Haroonabad
																		</option>  
																		<option value="40">Hasan Abdal
																		</option>  
																		<option value="41">Hunza
																		</option>  
																		<option value="42">Hyderabad
																		</option>  
																		<option value="44">Jacobabad
																		</option>  
																		<option value="45">Jauharabad
																		</option>  
																		<option value="46">Jhang
																		</option>  
																		<option value="47">Jhelum
																		</option>  
																		<option value="48">Kala Shah Kaku
																		</option>  
																		<option value="49">Kalat
																		</option>  
																		<option value="51">Kasur
																		</option>  
																		<option value="52">Khairpur
																		</option>  
																		<option value="53">Khanewal
																		</option>  
																		<option value="54">Kharian
																		</option>  
																		<option value="55">Khushab
																		</option>  
																		<option value="56">Khuzdar
																		</option>  
																		<option value="57">Kohat
																		</option>  
																		<option value="58">Kotli
																		</option>  
																		<option value="60">Larkana
																		</option>  
																		<option value="61">Lasbela
																		</option>  
																		<option value="62">Layyah
																		</option>  
																		<option value="63">Loralai
																		</option>  
																		<option value="64">Makran
																		</option>  
																		<option value="65">Malakand
																		</option>  
																		<option value="66">Mandi Bahauddin
																		</option>  
																		<option value="67">Mansehra
																		</option>  
																		<option value="68">Mardan
																		</option>  
																		<option value="69">Matiari
																		</option>  
																		<option value="70">Mianwali
																		</option>  
																		<option value="71">Mingora
																		</option>  
																		<option value="72">Mirpur
																		</option>  
																		<option value="73">Mirpur Khas
																		</option>  
																		<option value="74">Multan
																		</option>  
																		<option value="75">Murree
																		</option>  
																		<option value="76">Muzaffarabad
																		</option>  
																		<option value="77">Muzaffargarh
																		</option>  
																		<option value="78">Nankana Sahib 
																		</option>  
																		<option value="79">Naran
																		</option>  
																		<option value="80">Narowal
																		</option>  
																		<option value="81">Nasirabad
																		</option>  
																		<option value="82">Naushahro Feroze
																		</option>  
																		<option value="83">Nawabshah
																		</option>  
																		<option value="84">Neelum
																		</option>  
																		<option value="85">Nowshera
																		</option>  
																		<option value="86">Okara
																		</option>  
																		<option value="87">Others Azad Kashmir
																		</option>  
																		<option value="88">Others
																		</option>  
																		<option value="89">Others Balochistan
																		</option>  
																		<option value="90">Others Gilgit Baltistan
																		</option>  
																		<option value="91">Others Khyber Pakhtunkhwa
																		</option>  
																		<option value="92">Others Punjab
																		</option>  
																		<option value="93">Others Sindh
																		</option>  
																		<option value="94">Pakpattan
																		</option>  
																		<option value="95">Peshawar
																		</option>  
																		<option value="96">Quetta
																		</option>  
																		<option value="97">Rahim Yar Khan
																		</option>  
																		<option value="98">Rawalakot
																		</option>  
																		<option value="100">Rohri
																		</option>  
																		<option value="101">Sahiwal
																		</option>  
																		<option value="102">Sanghar
																		</option>  
																		<option value="103">Sargodha
																		</option>  
																		<option value="104">Sehwan
																		</option>  
																		<option value="105">Sheikhupura
																		</option>  
																		<option value="106">Shikarpur
																		</option>  
																		<option value="107">Sialkot
																		</option>  
																		<option value="108">Sibi
																		</option>  
																		<option value="109">Skardu
																		</option>  
																		<option value="110">Sudhnoti
																		</option>  
																		<option value="111">Sukkur
																		</option>  
																		<option value="112">Swabi
																		</option>  
																		<option value="113">Swat
																		</option>  
																		<option value="114">Taxila
																		</option>  
																		<option value="115">Thatta
																		</option>  
																		<option value="116">Toba Tek Singh
																		</option>  
																		<option value="117">Vehari
																		</option>  
																		<option value="118">Wah
																		</option>  
																		<option value="119">Wazirabad
																		</option>  
																		<option value="120">Waziristan
																		</option>  
																		<option value="121">Zhob
																		</option> 
                                  
                                  
                                  {{--@foreach($cities as $city)
                                      <option value="{{ $city->id }}">{{$city->name}}</option>
                                  @endforeach--}}

                          </select> 
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="agent-pic" style="margin:0 auto;display: table;">
                            <div class="col-lg-12 col-sm-12 edit-profile-img padding-left">
                            <div class="">
                              <div class="">
                                <div class="panel-body">
                                  <div class="col-lg-12 col-sm-12 text-center profile_image">
                                    <figure class="edit-profile-image">
                                        <i class="zmdi zmdi-check editpic-icon"></i>
                                         <img id="myImg1" class="img-profile-agent img-circle" src="/images/agent_pic.png" alt="Profile Image" width="120" height="120" style="width:120px" > 
                                    </figure>
                                    <div class="text-center agency-signuppic">
                                      <input type="file" name="logo" id="file-1" class="inputfile inputfile-1 hidden"  />
                                      <label class="fileupload-profile" for="file-1">Choose Pic</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                       
                       <div class="form-group">
                            <div class="col-sm-8">
                                <p>By clicking below, you agree to <a href="">Terms & Conditions</a></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="col-md-6 btn button_theme_color">Register Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

