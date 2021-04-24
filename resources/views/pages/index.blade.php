@extends('pages.app')
@section('style')
@endsection
@section('title', 'Home')
@section('content')
        {{--  <hr/>
        <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 bgm" id="slide">
                <div class="cad">
                    <h1 style="color: rgb(160, 3, 3); text-shadow: 2px 2px 5px white;" class="text-center bold tour">Karele OOdua Lafefe</h1>
                    <p class="source"> Get on board and let's explore <br>the beauty of the source</p>
                </div>
            </div>
            <!-- login form-->
            @if($errors->any())
               @foreach($errors as $error)
                {{ $error }}
               @endforeach
            @endif
            <div class=" col-12 col-md-3 col-sm-6 offset-sm-2 col-lg-3 form-field">
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong style="color: red;">{{ "Something went wrong!!! Kindly check the form submitted" }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @foreach ($errors->all() as $error)
                  {{$error }} <br/>
                  @endforeach
                @endif
                <div id="accordion">
                    <!-- sign up form -->
                    <div id="signup" class="collapse" data-parent="#accordion">
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                       <!-- First name -->
                        <label for="email">Full Name:</label><br>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!--// First name -->
                        <!-- Last Name -->
                        <input  type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!--// Last name -->
                        <!-- DOB -->
                        <label for="email">Date of birth:</label>
                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <!--// DOB -->
                        <!-- Email -->
                        <label for="email">Email address:</label>
                        <input id="email" type="email" class="form-control @error('register_email') is-invalid @enderror" name="register_email" value="{{ old('register_email') }}" required autocomplete="register_email">

                        @error('register_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!-- //Email -->
                           <!-- Country --->
                        <label for="country"> Residential Country</label>
                         <select id="country" name="country" class="form-control">
                       <option value="Afghanistan">Afghanistan</option>
                        <option value="Åland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Helena">Saint Helena</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                     </select>
                     @error('country')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                 <!-- // Country ->
                     <br/>
                     <!--Password -->
                        <label for="pwd">Password:</label><br>
                        <input id="password" type="password" class="form-control @error('register_password') is-invalid @enderror" name="register_password" required autocomplete="new-password">

                        @error('register_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!--- //Password-->
                        <!--- confirm Password-->
                        <label for="pwd">Confirm Password:</label><br>
                        <input id="password-confirm" type="password" class="form-control" name="register_password_confirmation" required autocomplete="new-password">

                        <!--- // confirm Password-->
                        <br>
                        <p>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="T&C" {{ old('T&C') ? 'checked' : '' }}>
                                    I agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                        </p>
                              @if ($errors->has('tc'))
                              <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @endif

                        <button type="submit" class="btn btn-danger">Sign up</button>
                        </form>
                        <p> Do you have account with us? <a href="#login" data-toggle="collapse">login </a></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
<br><br><br>  --}}
  <!-- banner section -->
    <section class="w3l-main-slider" id="home">
        <div class="banner-content">
            <div id="demo-1"
                data-zs-src='["{{asset('pages/image/banner4.jpg')}}", "{{ asset('pages/image/banner2.jpg') }}"," {{ asset('pages/image/banner1.jpg') }}", "{{ asset('pages/image/banner3.jpg') }}", "{{ asset('pages/image/banner4.jpg') }}"]'
                data-zs-overlay="dots">
                <div class="demo-inner-content">
                    <div class="container">
                        <div class="banner-infhny">
                            <!-- fireworks effect -->
                            <div class="pyro">
                                <div class="before"></div>
                                <div class="after"></div>
                            </div>
                            <!-- first text effect -->
                            <section>
                                <div id="Text8">
                                    <h1>
                                        <span>I</span>
                                        <span>t</span>
                                        <span>'</span>
                                        <span>s</span>
                                        <span> </span>
                                        <span>T</span>
                                        <span>i</span>
                                        <span>m</span>
                                        <span>e</span>
                                        <span> </span>
                                        <span>T</span>
                                        <span>o</span>
                                        <span> </span>
                                        <span>C</span>
                                        <span>e</span>
                                        <span>l</span>
                                        <span>e</span>
                                        <span>b</span>
                                        <span>r</span>
                                        <span>a</span>
                                        <span>t</span>
                                        <span>e</span>
                                    </h1>
                                   
                                </div>
                                
                            </section>
                            <br/>
                            <br/>
                            <!-- new year effect -->
                        
                                     <h1 style="margin-top:50px;letter-spacing:3px;color:white"> <span style="color:#fb6049;">Our </span> Heritage</h1>
                            <div class="pyro pyro-2 position-relative">
                                <div class="before"></div>
                                <div class="after"></div>
                            </div>
                            
                            <!-- fireworks effect -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner section -->
    <!-- blog section -->
    <div class="blog-section py-5">
        <div class="container py-md-5 py-4">
              <div class="waviy text-center mb-md-5 mb-4">
                <span style="--i:1">O</span>
                <span style="--i:2">u</span>
                <span style="--i:3">r</span>
               <span style="--i:4"></span>
                <span style="--i:5">U</span>
                <span style="--i:6">p</span>
                <span style="--i:7">c</span>
                <span style="--i:8">o</span>
                <span style="--i:1">m</span>
                <span style="--i:2">m</span>
                 <span style="--i:2">i</span>
                  <span style="--i:2">n</span>
                   <span style="--i:2">g</span>
                <span style="--i:3"></span>
                <span style="--i:4">E</span>
                <span style="--i:5">v</span>
                <span style="--i:6">e</span>
                <span style="--i:7">n</span>
                <span style="--i:8">t</span>
                <span style="--i:9">s</span>
            </div>
         <div class="row">
                <div class="col-lg-4 col-md-6 item">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#single">
                                <img class="card-img-bottom d-block radius-image-full" src="pages/assets/images/blog1.jpg"
                                    alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body blog-details">
                            <span class="label-blue">Parties</span>
                            <a href="#single" class="blog-desc">Sunt in culpa qui officia dese runt mollit anim
                            </a>
                            <div class="author align-items-center mt-3 mb-1">
                                <img src="pages/assets/images/testi1.jpg" alt="" class="img-fluid rounded-circle" />
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#single">Isabella ava</a> </a>
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"> Jan 28 2021 </span>. <span
                                            class="meta-value ml-2"><span class="fa fa-clock-o"></span> 1 min</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-sm-5 mt-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#single">
                                <img class="card-img-bottom d-block radius-image-full" src="pages/assets/images/blog3.jpg"
                                    alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body blog-details">
                            <span class="label-blue">Celebrations</span>
                            <a href="#single" class="blog-desc">Eaque ipsa quae ab illo remos dez inve ntore
                            </a>
                            <div class="author align-items-center mt-3 mb-1">
                                <img src="pages/assets/images/testi2.jpg" alt="" class="img-fluid rounded-circle" />
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#single">Charlotte mia</a> </a>
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"> Jan 13, 2021 </span>. <span
                                            class="meta-value ml-2"><span class="fa fa-clock-o"></span> 1 min</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#single">
                                <img class="card-img-bottom d-block radius-image-full" src="pages/assets/images/blog2.jpg"
                                    alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body blog-details">
                            <span class="label-blue">New Year</span>
                            <a href="#single" class="blog-desc">Quasi archi tecto bea dicta sunt expl icab
                            </a>
                            <div class="author align-items-center mt-3 mb-1">
                                <img src="pages/assets/images/testi3.jpg" alt="" class="img-fluid rounded-circle" />
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#single">Charlotte mia</a> </a>
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value">Jan 06 2021 </span>. <span
                                            class="meta-value ml-2"><span class="fa fa-clock-o"></span> 1 min</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               </div>
    </div>
    <!-- //blog section -->
@endsection
@section('script')
@endsection
