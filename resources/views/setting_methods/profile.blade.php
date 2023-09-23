<!--  -->
<div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-lg">

        <h4 class="font-xs text-white fw-600 ml-4 mb-0 mt-2">Profile Details</h4>
    </div>
    <div class="card-body p-lg-5 p-4 w-100 border-0 ">

        <div class="row justify-content-center">
            <div class="col-lg-4 text-center">

                @if(Auth::user()->profilePicture)
                <figure class="avatar ml-auto mr-auto mb-0 mt-2 w100"><img src="{{ asset('public/storage/' . str_replace('public/', '', Auth::user()->profilePicture->path)) }}" alt="image" class="shadow-sm rounded-lg w-100"></figure>
                <!--end::Preview existing avatar-->
                @else
                <figure class="avatar ml-auto mr-auto mb-0 mt-2 w100"><img src="images/t-1.jpg" alt="image" class="shadow-sm rounded-lg w-100"></figure>
                @endif
            </div>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="form">
            <!--begin::Card body-->
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="col-lg-12 mb-3">
                <div class="card mt-3 border-0">
                    <div class="card-body d-flex justify-content-between align-items-end p-0">
                        <div class="form-group mb-0 w-100">
                            <input type="file" name="profile_picture" id="file" class="input-file">
                            <label for="file" class="rounded-lg text-center bg-white btn-tertiary js-labelFile p-4 w-100 border-dashed">
                                <i class="ti-cloud-down large-icon mr-3 d-block"></i>
                                <span class="js-fileName">Drag and drop or click to replace profile picture</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label class="mont-font fw-600 font-xsss">First Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">

                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label class="mont-font fw-600 font-xsss">Phone Number</label>
                        <input type="tel" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label class="mont-font fw-600 font-xsss">City</label>
                        <input type="text" name="city" class="form-control" value="{{ Auth::user()->city }}">
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label class="mont-font fw-600 font-xsss">Country</label>
                        <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a country..." class="form-control">
                            <option value="{{ Auth::user()->country }}">{{ Auth::user()->country }}</option>
                            <option value="Afghanistan" data-kt-select2-country="../../assets/media/flags/afghanistan.svg">
                                Afghanistan </option>
                            <option value="Aland Islands" data-kt-select2-country="../../assets/media/flags/aland-islands.svg">
                                Aland Islands </option>
                            <option value="Albania" data-kt-select2-country="../../assets/media/flags/albania.svg">
                                Albania </option>
                            <option value="Algeria" data-kt-select2-country="../../assets/media/flags/algeria.svg">
                                Algeria </option>
                            <option value="American Samoa" data-kt-select2-country="../../assets/media/flags/american-samoa.svg">
                                American Samoa </option>
                            <option value="Andorra" data-kt-select2-country="../../assets/media/flags/andorra.svg">
                                Andorra </option>
                            <option value="Angola" data-kt-select2-country="../../assets/media/flags/angola.svg">
                                Angola </option>
                            <option value="Anguilla" data-kt-select2-country="../../assets/media/flags/anguilla.svg">
                                Anguilla </option>
                            <option value="Antigua and Barbuda" data-kt-select2-country="../../assets/media/flags/antigua-and-barbuda.svg">
                                Antigua and Barbuda </option>
                            <option value="Argentina" data-kt-select2-country="../../assets/media/flags/argentina.svg">
                                Argentina </option>
                            <option value="Armenia" data-kt-select2-country="../../assets/media/flags/armenia.svg">
                                Armenia </option>
                            <option value="Aruba" data-kt-select2-country="../../assets/media/flags/aruba.svg">
                                Aruba </option>
                            <option value="Australia" data-kt-select2-country="../../assets/media/flags/australia.svg">
                                Australia </option>
                            <option value="Austria" data-kt-select2-country="../../assets/media/flags/austria.svg">
                                Austria </option>
                            <option value="Azerbaijan" data-kt-select2-country="../../assets/media/flags/azerbaijan.svg">
                                Azerbaijan </option>
                            <option value="Bahamas" data-kt-select2-country="../../assets/media/flags/bahamas.svg">
                                Bahamas </option>
                            <option value="Bahrain" data-kt-select2-country="../../assets/media/flags/bahrain.svg">
                                Bahrain </option>
                            <option value="Bangladesh" data-kt-select2-country="../../assets/media/flags/bangladesh.svg">
                                Bangladesh </option>
                            <option value="Barbados" data-kt-select2-country="../../assets/media/flags/barbados.svg">
                                Barbados </option>
                            <option value="Belarus" data-kt-select2-country="../../assets/media/flags/belarus.svg">
                                Belarus </option>
                            <option value="Belgium" data-kt-select2-country="../../assets/media/flags/belgium.svg">
                                Belgium </option>
                            <option value="Belize" data-kt-select2-country="../../assets/media/flags/belize.svg">
                                Belize </option>
                            <option value="Benin" data-kt-select2-country="../../assets/media/flags/benin.svg">
                                Benin </option>
                            <option value="Bermuda" data-kt-select2-country="../../assets/media/flags/bermuda.svg">
                                Bermuda </option>
                            <option value="Bhutan" data-kt-select2-country="../../assets/media/flags/bhutan.svg">
                                Bhutan </option>
                            <option value=" Bolivia, Plurinational State of" data-kt-select2-country="../../assets/media/flags/bolivia.svg">
                                Bolivia, Plurinational State of </option>
                            <option value="Bonaire, Sint Eustatius and Saba" data-kt-select2-country="../../assets/media/flags/bonaire.svg">
                                Bonaire, Sint Eustatius and Saba </option>
                            <option value=" Bosnia and Herzegovina" data-kt-select2-country="../../assets/media/flags/bosnia-and-herzegovina.svg">
                                Bosnia and Herzegovina </option>
                            <option value="Botswana" data-kt-select2-country="../../assets/media/flags/botswana.svg">
                                Botswana </option>
                            <option value="Brazil" data-kt-select2-country="../../assets/media/flags/brazil.svg">
                                Brazil </option>
                            <option value="British Indian Ocean Territory" data-kt-select2-country="../../assets/media/flags/british-indian-ocean-territory.svg">
                                British Indian Ocean Territory </option>
                            <option value="Brunei Darussalam" data-kt-select2-country="../../assets/media/flags/brunei.svg">
                                Brunei Darussalam </option>
                            <option value=" Bulgaria " data-kt-select2-country="../../assets/media/flags/bulgaria.svg">
                                Bulgaria </option>
                            <option value="Burkina Faso" data-kt-select2-country="../../assets/media/flags/burkina-faso.svg">
                                Burkina Faso </option>
                            <option value=" Burundi" data-kt-select2-country="../../assets/media/flags/burundi.svg">
                                Burundi </option>
                            <option value="Cambodia" data-kt-select2-country="../../assets/media/flags/cambodia.svg">
                                Cambodia </option>
                            <option value="Cameroon" data-kt-select2-country="../../assets/media/flags/cameroon.svg">
                                Cameroon </option>
                            <option value="Canada" data-kt-select2-country="../../assets/media/flags/canada.svg">
                                Canada </option>
                            <option value="Cape Verde" data-kt-select2-country="../../assets/media/flags/cape-verde.svg">
                                Cape Verde </option>
                            <option value="Cayman Islands" data-kt-select2-country="{{ asset('media/flags/cayman-islands.svg')}}">
                                Cayman Islands </option>
                            <option value="Central African Republic" data-kt-select2-country="../../assets/media/flags/central-african-republic.svg">
                                Central African Republic </option>
                            <option value=" Chad" data-kt-select2-country="../../assets/media/flags/chad.svg">
                                Chad </option>
                            <option value="Chile" data-kt-select2-country="../../assets/media/flags/chile.svg">
                                Chile </option>
                            <option value="China" data-kt-select2-country="../../assets/media/flags/china.svg">
                                China </option>
                            <option value="Christmas Island" data-kt-select2-country="../../assets/media/flags/christmas-island.svg">
                                Christmas Island </option>
                            <option value="Cocos (Keeling) Islands" data-kt-select2-country="../../assets/media/flags/cocos-island.svg">
                                Cocos (Keeling) Islands </option>
                            <option value="Colombia" data-kt-select2-country="../../assets/media/flags/colombia.svg">
                                Colombia </option>
                            <option value="Comoros" data-kt-select2-country="../../assets/media/flags/comoros.svg">
                                Comoros </option>
                            <option value="Cook Islands" data-kt-select2-country="../../assets/media/flags/cook-islands.svg">
                                Cook Islands </option>
                            <option value="Costa Rica" data-kt-select2-country="../../assets/media/flags/costa-rica.svg">
                                Costa Rica </option>
                            <option value="Côte d'Ivoire" data-kt-select2-country="../../assets/media/flags/ivory-coast.svg">
                                Côte d'Ivoire </option>
                            <option value="Croatia" data-kt-select2-country="../../assets/media/flags/croatia.svg">
                                Croatia </option>
                            <option value="Cuba" data-kt-select2-country="../../assets/media/flags/cuba.svg">
                                Cuba </option>
                            <option value="Curaçao" data-kt-select2-country="../../assets/media/flags/curacao.svg">
                                Curaçao </option>
                            <option value="Czech Republic" data-kt-select2-country="../../assets/media/flags/czech-republic.svg">
                                Czech Republic </option>
                            <option value="Denmark" data-kt-select2-country="../../assets/media/flags/denmark.svg">
                                Denmark </option>
                            <option value="Djibouti" data-kt-select2-country="../../assets/media/flags/djibouti.svg">
                                Djibouti </option>
                            <option value="Dominica" data-kt-select2-country="../../assets/media/flags/dominica.svg">
                                Dominica </option>
                            <option value="Dominican Republic" data-kt-select2-country="../../assets/media/flags/dominican-republic.svg">
                                Dominican Republic </option>
                            <option value="Ecuador" data-kt-select2-country="../../assets/media/flags/ecuador.svg">
                                Ecuador </option>
                            <option value="Egypt" data-kt-select2-country="../../assets/media/flags/egypt.svg">
                                Egypt </option>
                            <option value="El Salvador" data-kt-select2-country="../../assets/media/flags/el-salvador.svg">
                                El Salvador </option>
                            <option value="Equatorial Guinea" data-kt-select2-country="../../assets/media/flags/equatorial-guinea.svg">
                                Equatorial Guinea </option>
                            <option value="Eritrea" data-kt-select2-country="../../assets/media/flags/eritrea.svg">
                                Eritrea </option>
                            <option value="Estonia" data-kt-select2-country="../../assets/media/flags/estonia.svg">
                                Estonia </option>
                            <option value="Ethiopia" data-kt-select2-country="../../assets/media/flags/ethiopia.svg">
                                Ethiopia </option>
                            <option value="Falkland Islands (Malvinas)" data-kt-select2-country="../../assets/media/flags/falkland-islands.svg">
                                Falkland Islands (Malvinas) </option>
                            <option value="Fiji" data-kt-select2-country="../../assets/media/flags/fiji.svg">
                                Fiji </option>
                            <option value="Finland" data-kt-select2-country="../../assets/media/flags/finland.svg">
                                Finland </option>
                            <option value="France" data-kt-select2-country="../../assets/media/flags/france.svg">
                                France </option>
                            <option value="French Polynesia" data-kt-select2-country="../../assets/media/flags/french-polynesia.svg">
                                French Polynesia </option>
                            <option value="Gabon" data-kt-select2-country="../../assets/media/flags/gabon.svg">
                                Gabon </option>
                            <option value="Gambia" data-kt-select2-country="../../assets/media/flags/gambia.svg">
                                Gambia </option>
                            <option value="Georgia" data-kt-select2-country="../../assets/media/flags/georgia.svg">
                                Georgia </option>
                            <option value="Germany" data-kt-select2-country="../../assets/media/flags/germany.svg">
                                Germany </option>
                            <option value="Ghana" data-kt-select2-country="../../assets/media/flags/ghana.svg">
                                Ghana </option>
                            <option value="Gibraltar" data-kt-select2-country="../../assets/media/flags/gibraltar.svg">
                                Gibraltar </option>
                            <option value="Greece" data-kt-select2-country="../../assets/media/flags/greece.svg">
                                Greece </option>
                            <option value="Greenland" data-kt-select2-country="../../assets/media/flags/greenland.svg">
                                Greenland </option>
                            <option value="Grenada" data-kt-select2-country="../../assets/media/flags/grenada.svg">
                                Grenada </option>
                            <option value="Guam" data-kt-select2-country="../../assets/media/flags/guam.svg">
                                Guam </option>
                            <option value="Guatemala" data-kt-select2-country="../../assets/media/flags/guatemala.svg">
                                Guatemala </option>
                            <option value="Guernsey" data-kt-select2-country="../../assets/media/flags/guernsey.svg">
                                Guernsey </option>
                            <option value="Guinea" data-kt-select2-country="../../assets/media/flags/guinea.svg">
                                Guinea </option>
                            <option value="Guinea-Bissau" data-kt-select2-country="../../assets/media/flags/guinea-bissau.svg">
                                Guinea-Bissau </option>
                            <option value="Haiti" data-kt-select2-country="../../assets/media/flags/haiti.svg">
                                Haiti </option>
                            <option value="Holy See (Vatican City State)" data-kt-select2-country="../../assets/media/flags/vatican-city.svg">
                                Holy See (Vatican City State) </option>
                            <option value="Honduras" data-kt-select2-country="../../assets/media/flags/honduras.svg">
                                Honduras </option>
                            <option value="Hong Kong" data-kt-select2-country="../../assets/media/flags/hong-kong.svg">
                                Hong Kong </option>
                            <option value="Hungary" data-kt-select2-country="../../assets/media/flags/hungary.svg">
                                Hungary </option>
                            <option value="Iceland" data-kt-select2-country="../../assets/media/flags/iceland.svg">
                                Iceland </option>
                            <option value="India" data-kt-select2-country="../../assets/media/flags/india.svg">
                                India </option>
                            <option value="Indonesia" data-kt-select2-country="../../assets/media/flags/indonesia.svg">
                                Indonesia </option>
                            <option value="Iran, Islamic Republic of" data-kt-select2-country="../../assets/media/flags/iran.svg">
                                Iran, Islamic Republic of </option>
                            <option value="Iraq" data-kt-select2-country="../../assets/media/flags/iraq.svg">
                                Iraq </option>
                            <option value="Ireland" data-kt-select2-country="../../assets/media/flags/ireland.svg">
                                Ireland </option>
                            <option value="Isle of Man" data-kt-select2-country="../../assets/media/flags/isle-of-man.svg">
                                Isle of Man </option>
                            <option value="Israel" data-kt-select2-country="../../assets/media/flags/israel.svg">
                                Israel </option>
                            <option value="Italy" data-kt-select2-country="../../assets/media/flags/italy.svg">
                                Italy </option>
                            <option value="Jamaica" data-kt-select2-country="../../assets/media/flags/jamaica.svg">
                                Jamaica </option>
                            <option value="Japan" data-kt-select2-country="../../assets/media/flags/japan.svg">
                                Japan </option>
                            <option value="Jersey" data-kt-select2-country="../../assets/media/flags/jersey.svg">
                                Jersey </option>
                            <option value="Jordan" data-kt-select2-country="../../assets/media/flags/jordan.svg">
                                Jordan </option>
                            <option value="Kazakhstan" data-kt-select2-country="../../assets/media/flags/kazakhstan.svg">
                                Kazakhstan </option>
                            <option value="Kenya" data-kt-select2-country="../../assets/media/flags/kenya.svg">
                                Kenya </option>
                            <option value="Kiribati" data-kt-select2-country="../../assets/media/flags/kiribati.svg">
                                Kiribati </option>
                            <option value="Korea, Democratic People's Republic of" data-kt-select2-country="../../assets/media/flags/north-korea.svg">
                                Korea, Democratic People's Republic of </option>
                            <option value="Kuwait" data-kt-select2-country="../../assets/media/flags/kuwait.svg">
                                Kuwait </option>
                            <option value="Kyrgyzstan" data-kt-select2-country="../../assets/media/flags/kyrgyzstan.svg">
                                Kyrgyzstan </option>
                            <option value="Lao People's Democratic Republic" data-kt-select2-country="../../assets/media/flags/laos.svg">
                                Lao People's Democratic Republic </option>
                            <option value="Latvia" data-kt-select2-country="../../assets/media/flags/latvia.svg">
                                Latvia </option>
                            <option value="Lebanon" data-kt-select2-country="../../assets/media/flags/lebanon.svg">
                                Lebanon </option>
                            <option value="Lesotho" data-kt-select2-country="../../assets/media/flags/lesotho.svg">
                                Lesotho </option>
                            <option value="Liberia" data-kt-select2-country="../../assets/media/flags/liberia.svg">
                                Liberia </option>
                            <option value="Libya" data-kt-select2-country="../../assets/media/flags/libya.svg">
                                Libya </option>
                            <option value="Liechtenstein" data-kt-select2-country="../../assets/media/flags/liechtenstein.svg">
                                Liechtenstein </option>
                            <option value="Lithuania" data-kt-select2-country="../../assets/media/flags/lithuania.svg">
                                Lithuania </option>
                            <option value="Luxembourg" data-kt-select2-country="../../assets/media/flags/luxembourg.svg">
                                Luxembourg </option>
                            <option value="Macao" data-kt-select2-country="../../assets/media/flags/macao.svg">
                                Macao </option>
                            <option value="Madagascar" data-kt-select2-country="../../assets/media/flags/madagascar.svg">
                                Madagascar </option>
                            <option value="Malawi" data-kt-select2-country="../../assets/media/flags/malawi.svg">
                                Malawi </option>
                            <option value="Malaysia" data-kt-select2-country="../../assets/media/flags/malaysia.svg">
                                Malaysia </option>
                            <option value="Maldives" data-kt-select2-country="../../assets/media/flags/maldives.svg">
                                Maldives </option>
                            <option value="Mali" data-kt-select2-country="../../assets/media/flags/mali.svg">
                                Mali </option>
                            <option value="Malta" data-kt-select2-country="../../assets/media/flags/malta.svg">
                                Malta </option>
                            <option value="Marshall Islands" data-kt-select2-country="../../assets/media/flags/marshall-island.svg">
                                Marshall Islands </option>
                            <option value="Martinique" data-kt-select2-country="../../assets/media/flags/martinique.svg">
                                Martinique </option>
                            <option value="Mauritania" data-kt-select2-country="../../assets/media/flags/mauritania.svg">
                                Mauritania </option>
                            <option value="Mauritius" data-kt-select2-country="../../assets/media/flags/mauritius.svg">
                                Mauritius </option>
                            <option value="Mexico" data-kt-select2-country="../../assets/media/flags/mexico.svg">
                                Mexico </option>
                            <option value="Micronesia, Federated States of" data-kt-select2-country="../../assets/media/flags/micronesia.svg">
                                Micronesia, Federated States of </option>
                            <option value="Moldova, Republic of" data-kt-select2-country="../../assets/media/flags/moldova.svg">
                                Moldova, Republic of </option>
                            <option value="Monaco" data-kt-select2-country="../../assets/media/flags/monaco.svg">
                                Monaco </option>
                            <option value="Mongolia" data-kt-select2-country="../../assets/media/flags/mongolia.svg">
                                Mongolia </option>
                            <option value="ME" data-kt-select2-country="../../assets/media/flags/montenegro.svg">
                                Montenegro </option>
                            <option value="Montserrat" data-kt-select2-country="../../assets/media/flags/montserrat.svg">
                                Montserrat </option>
                            <option value="Morocco" data-kt-select2-country="../../assets/media/flags/morocco.svg">
                                Morocco </option>
                            <option value="Mozambique" data-kt-select2-country="../../assets/media/flags/mozambique.svg">
                                Mozambique </option>
                            <option value="Myanmar" data-kt-select2-country="../../assets/media/flags/myanmar.svg">
                                Myanmar </option>
                            <option value="Namibia" data-kt-select2-country="../../assets/media/flags/namibia.svg">
                                Namibia </option>
                            <option value="Nauru" data-kt-select2-country="../../assets/media/flags/nauru.svg">
                                Nauru </option>
                            <option value="Nepal" data-kt-select2-country="../../assets/media/flags/nepal.svg">
                                Nepal </option>
                            <option value="Netherlands" data-kt-select2-country="../../assets/media/flags/netherlands.svg">
                                Netherlands </option>
                            <option value="New Zealand" data-kt-select2-country="../../assets/media/flags/new-zealand.svg">
                                New Zealand </option>
                            <option value="Nicaragua" data-kt-select2-country="../../assets/media/flags/nicaragua.svg">
                                Nicaragua </option>
                            <option value="Niger" data-kt-select2-country="../../assets/media/flags/niger.svg">
                                Niger </option>
                            <option value="Nigeria" data-kt-select2-country="../../assets/media/flags/nigeria.svg">
                                Nigeria </option>
                            <option value="Niue" data-kt-select2-country="../../assets/media/flags/niue.svg">
                                Niue </option>
                            <option value="Norfolk Island" data-kt-select2-country="../../assets/media/flags/norfolk-island.svg">
                                Norfolk Island </option>
                            <option value="Northern Mariana Islands" data-kt-select2-country="../../assets/media/flags/northern-mariana-islands.svg">
                                Northern Mariana Islands </option>
                            <option value="Norway" data-kt-select2-country="../../assets/media/flags/norway.svg">
                                Norway </option>
                            <option value="Oman" data-kt-select2-country="../../assets/media/flags/oman.svg">
                                Oman </option>
                            <option value="Pakistan" data-kt-select2-country="../../assets/media/flags/pakistan.svg">
                                Pakistan </option>
                            <option value="Palau" data-kt-select2-country="../../assets/media/flags/palau.svg">
                                Palau </option>
                            <option value="Palestinian Territory, Occupied" data-kt-select2-country="../../assets/media/flags/palestine.svg">
                                Palestinian Territory, Occupied </option>
                            <option value="Panama" data-kt-select2-country="../../assets/media/flags/panama.svg">
                                Panama </option>
                            <option value="Papua New Guinea" data-kt-select2-country="../../assets/media/flags/papua-new-guinea.svg">
                                Papua New Guinea </option>
                            <option value="Paraguay" data-kt-select2-country="../../assets/media/flags/paraguay.svg">
                                Paraguay </option>
                            <option value="Peru" data-kt-select2-country="../../assets/media/flags/peru.svg">
                                Peru </option>
                            <option value="Philippines" data-kt-select2-country="../../assets/media/flags/philippines.svg">
                                Philippines </option>
                            <option value="Poland" data-kt-select2-country="../../assets/media/flags/poland.svg">
                                Poland </option>
                            <option value="Portugal" data-kt-select2-country="../../assets/media/flags/portugal.svg">
                                Portugal </option>
                            <option value="Puerto Rico" data-kt-select2-country="../../assets/media/flags/puerto-rico.svg">
                                Puerto Rico </option>
                            <option value="Qatar" data-kt-select2-country="../../assets/media/flags/qatar.svg">
                                Qatar </option>
                            <option value="Romania" data-kt-select2-country="../../assets/media/flags/romania.svg">
                                Romania </option>
                            <option value="Russian Federation" data-kt-select2-country="../../assets/media/flags/russia.svg">
                                Russian Federation </option>
                            <option value="Rwanda" data-kt-select2-country="../../assets/media/flags/rwanda.svg">
                                Rwanda </option>
                            <option value="Saint Barthélemy" data-kt-select2-country="../../assets/media/flags/st-barts.svg">
                                Saint Barthélemy </option>
                            <option value="Saint Kitts and Nevis" data-kt-select2-country="../../assets/media/flags/saint-kitts-and-nevis.svg">
                                Saint Kitts and Nevis </option>
                            <option value="Saint Lucia" data-kt-select2-country="../../assets/media/flags/st-lucia.svg">
                                Saint Lucia </option>
                            <option value="Saint Martin (French part)" data-kt-select2-country="../../assets/media/flags/sint-maarten.svg">
                                Saint Martin (French part) </option>
                            <option value="Saint Vincent and the Grenadines" data-kt-select2-country="../../assets/media/flags/st-vincent-and-the-grenadines.svg">
                                Saint Vincent and the Grenadines </option>
                            <option value="Samoa" data-kt-select2-country="../../assets/media/flags/samoa.svg">
                                Samoa </option>
                            <option value="San Marino" data-kt-select2-country="../../assets/media/flags/san-marino.svg">
                                San Marino </option>
                            <option value="Sao Tome and Principe" data-kt-select2-country="../../assets/media/flags/sao-tome-and-prince.svg">
                                Sao Tome and Principe </option>
                            <option value="Saudi Arabia" data-kt-select2-country="../../assets/media/flags/saudi-arabia.svg">
                                Saudi Arabia </option>
                            <option value="Senegal" data-kt-select2-country="../../assets/media/flags/senegal.svg">
                                Senegal </option>
                            <option value="Serbia" data-kt-select2-country="../../assets/media/flags/serbia.svg">
                                Serbia </option>
                            <option value="Seychelles" data-kt-select2-country="../../assets/media/flags/seychelles.svg">
                                Seychelles </option>
                            <option value="Sierra Leone" data-kt-select2-country="../../assets/media/flags/sierra-leone.svg">
                                Sierra Leone </option>
                            <option value="Singapore" data-kt-select2-country="../../assets/media/flags/singapore.svg">
                                Singapore </option>
                            <option value="Sint Maarten (Dutch part)" data-kt-select2-country="../../assets/media/flags/sint-maarten.svg">
                                Sint Maarten (Dutch part) </option>
                            <option value="Slovakia" data-kt-select2-country="../../assets/media/flags/slovakia.svg">
                                Slovakia </option>
                            <option value="Slovenia" data-kt-select2-country="../../assets/media/flags/slovenia.svg">
                                Slovenia </option>
                            <option value="Solomon Islands" data-kt-select2-country="../../assets/media/flags/solomon-islands.svg">
                                Solomon Islands </option>
                            <option value="Somalia" data-kt-select2-country="../../assets/media/flags/somalia.svg">
                                Somalia </option>
                            <option value="South Africa" data-kt-select2-country="../../assets/media/flags/south-africa.svg">
                                South Africa </option>
                            <option value="South Korea" data-kt-select2-country="../../assets/media/flags/south-korea.svg">
                                South Korea </option>
                            <option value="South Sudan" data-kt-select2-country="../../assets/media/flags/south-sudan.svg">
                                South Sudan </option>
                            <option value="Spain" data-kt-select2-country="../../assets/media/flags/spain.svg">
                                Spain </option>
                            <option value="Sri Lanka" data-kt-select2-country="../../assets/media/flags/sri-lanka.svg">
                                Sri Lanka </option>
                            <option value="Sudan" data-kt-select2-country="../../assets/media/flags/sudan.svg">
                                Sudan </option>
                            <option value="Suriname" data-kt-select2-country="../../assets/media/flags/suriname.svg">
                                Suriname </option>
                            <option value="Swaziland" data-kt-select2-country="../../assets/media/flags/swaziland.svg">
                                Swaziland </option>
                            <option value="Sweden" data-kt-select2-country="../../assets/media/flags/sweden.svg">
                                Sweden </option>
                            <option value="Switzerland" data-kt-select2-country="../../assets/media/flags/switzerland.svg">
                                Switzerland </option>
                            <option value="Syrian Arab Republic" data-kt-select2-country="../../assets/media/flags/syria.svg">
                                Syrian Arab Republic </option>
                            <option value="Taiwan, Province of China" data-kt-select2-country="../../assets/media/flags/taiwan.svg">
                                Taiwan, Province of China </option>
                            <option value="Tajikistan" data-kt-select2-country="../../assets/media/flags/tajikistan.svg">
                                Tajikistan </option>
                            <option value="Tanzania, United Republic of" data-kt-select2-country="../../assets/media/flags/tanzania.svg">
                                Tanzania, United Republic of </option>
                            <option value="Thailand" data-kt-select2-country="../../assets/media/flags/thailand.svg">
                                Thailand </option>
                            <option value="Togo" data-kt-select2-country="../../assets/media/flags/togo.svg">
                                Togo </option>
                            <option value="Tokelau" data-kt-select2-country="../../assets/media/flags/tokelau.svg">
                                Tokelau </option>
                            <option value="Tonga" data-kt-select2-country="../../assets/media/flags/tonga.svg">
                                Tonga </option>
                            <option value="Trinidad and Tobago" data-kt-select2-country="../../assets/media/flags/trinidad-and-tobago.svg">
                                Trinidad and Tobago </option>
                            <option value="Tunisia" data-kt-select2-country="../../assets/media/flags/tunisia.svg">
                                Tunisia </option>
                            <option value="Turkey" data-kt-select2-country="../../assets/media/flags/turkey.svg">
                                Turkey </option>
                            <option value="Turkmenistan" data-kt-select2-country="../../assets/media/flags/turkmenistan.svg">
                                Turkmenistan </option>
                            <option value="Turks and Caicos Islands" data-kt-select2-country="../../assets/media/flags/turks-and-caicos.svg">
                                Turks and Caicos Islands </option>
                            <option value="Tuvalu" data-kt-select2-country="../../assets/media/flags/tuvalu.svg">
                                Tuvalu </option>
                            <option value="Uganda" data-kt-select2-country="../../assets/media/flags/uganda.svg">
                                Uganda </option>
                            <option value="Ukraine" data-kt-select2-country="../../assets/media/flags/ukraine.svg">
                                Ukraine </option>
                            <option value="United Arab Emirates" data-kt-select2-country="../../assets/media/flags/united-arab-emirates.svg">
                                United Arab Emirates </option>
                            <option value="United Kingdom" data-kt-select2-country="../../assets/media/flags/united-kingdom.svg">
                                United Kingdom </option>
                            <option value="United States" data-kt-select2-country="../../assets/media/flags/united-states.svg">
                                United States </option>
                            <option value="Uruguay" data-kt-select2-country="../../assets/media/flags/uruguay.svg">
                                Uruguay </option>
                            <option value="Uzbekistan" data-kt-select2-country="../../assets/media/flags/uzbekistan.svg">
                                Uzbekistan </option>
                            <option value="Vanuatu" data-kt-select2-country="../../assets/media/flags/vanuatu.svg">
                                Vanuatu </option>
                            <option value="Venezuela, Bolivarian Republic of" data-kt-select2-country="../../assets/media/flags/venezuela.svg">
                                Venezuela, Bolivarian Republic of </option>
                            <option value="Vietnam" data-kt-select2-country="../../assets/media/flags/vietnam.svg">
                                Vietnam </option>
                            <option value="Virgin Islands" data-kt-select2-country="../../assets/media/flags/virgin-islands.svg">
                                Virgin Islands </option>
                            <option value="Yemen" data-kt-select2-country="../../assets/media/flags/yemen.svg">
                                Yemen </option>
                            <option value="Zambia" data-kt-select2-country="../../assets/media/flags/zambia.svg">
                                Zambia </option>
                            <option value="Zimbabwe" data-kt-select2-country="../../assets/media/flags/zimbabwe.svg">
                                Zimbabwe </option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label class="mont-font fw-600 font-xsss">Account Name</label>
                        <input type="text" name="account_name" class="form-control" value="{{ Auth::user()->account_name }}">
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label class="mont-font fw-600 font-xsss">Account Number</label>
                        <input type="text" name="account_number" class="form-control" value="{{ Auth::user()->account_number }}">
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="form-group">
                        <label class="mont-font fw-600 font-xsss">Bank Number</label>
                        <input type="text" name="bank_name" class="form-control" value="{{ Auth::user()->bank_name }}">
                    </div>
                </div>


                <!-- <div class="col-lg-12 mb-3">
                                        <label class="mont-font fw-600 font-xsss">Description</label>
                                        <textarea class="form-control mb-0 p-3 h100 bg-greylight lh-16" rows="5" placeholder="Write your message..." spellcheck="false"></textarea>
                                    </div> -->

                <div class="col-lg-12">
                    <button type="submit" name="submit" style="border:none" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-lg d-inline-block">Save Changes</button>
                    <button type="reset" class="btn btn-light btn-active-light-primary text-center  font-xsss fw-600 p-3 w175 rounded-lg d-inline-block">Discard</button>

                </div>
            </div>

        </form>
    </div>
</div>
