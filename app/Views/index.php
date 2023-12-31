<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $page_title ?></title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container col-sm-12 col-lg-8 mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-8 col-xxl-4">
                <form id="clearform">
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success" style="display:none">
                        <strong>User Inserted Successfully!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="deleted" style="display:none">
                        <strong>User Deleted Successfully!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="wrong" style="display:none">
                        <strong>Oops! Something Wrong</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="form-floating mt-4">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" required />
                        <label for="validationCustom01" class="form-label">Name</label>
                    </div>
                    <span style="color:red;display:none" id="error_name">
                        Kindly fill your name
                    </span>

                    <div class="form-floating mt-4">
                        <input type="number" class="form-control" id="phone" placeholder="Phone" name="phone" maxlength="10" onkeypress="return /[0-9]/i.test(event.key)" required />
                        <label for="validationCustom02" class="form-label">Phone</label>
                    </div>
                    <span style="color:red;display:none" id="error_phone">
                        Phone Number must be 10 digit
                    </span>

                    <div class="form-floating mt-4">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required />
                        <label for="validationCustom03" class="form-label">Email</label>
                    </div>
                    <span style="color:red;display:none" id="error_email">
                        Kindly enter your email id
                    </span>

                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Address" id="address" name="address" required></textarea>
                        <label for="validationCustom04" class="form-label">Address</label>
                    </div>
                    <span style="color:red;display:none" id="error_address">
                        Kindly enter your address
                    </span>

                    <div class="form-floating mt-4">
                        <select class="form-select" name="state" id="state" onChange="changestate(this.value);" required>
                            <option selected disabled hidden value="">Choose State</option>
                            <option>Andaman and Nicobar Islands</option>
                            <option>Andhra Pradesh</option>
                            <option>Arunachal Pradesh</option>
                            <option>Assam</option>
                            <option>Bihar</option>
                            <option>Chandigarh</option>
                            <option>Chhattisgarh</option>
                            <option>Dadra and Nagar Haveli</option>
                            <option>Daman and Diu</option>
                            <option>Delhi</option>
                            <option>Goa</option>
                            <option>Gujarat</option>
                            <option>Haryana</option>
                            <option>Himachal Pradesh</option>
                            <option>Jammu and Kashmir</option>
                            <option>Jharkhand</option>
                            <option>Karnataka</option>
                            <option>Kerala</option>
                            <option>Ladakh</option>
                            <option>Lakshadweep</option>
                            <option>Madhya Pradesh</option>
                            <option>Maharashtra</option>
                            <option>Manipur</option>
                            <option>Meghalaya</option>
                            <option>Mizoram</option>
                            <option>Nagaland</option>
                            <option>Odisha</option>
                            <option>Puducherry</option>
                            <option>Punjab</option>
                            <option>Rajasthan</option>
                            <option>Sikkim</option>
                            <option>Tamil Nadu</option>
                            <option>Telangana</option>
                            <option>Tripura</option>
                            <option>Uttar Pradesh</option>
                            <option>Uttarakhand</option>
                            <option>West Bengal</option>
                        </select>
                        <label for="validationCustom05" class="form-label">State</label>
                    </div>
                    <span style="color:red;display:none" id="error_state">
                        Kindly select your state
                    </span>

                    <div class="form-floating mt-4">
                        <select class="form-select city" name="city" id="city" required>
                            <option selected disabled hidden>Choose City</option>
                        </select>
                        <label class="form-label" for="validationCustom06">City</label>
                    </div>
                    <span style="color:red;display:none" id="error_city">
                        Kindly select your city
                    </span>

                    <div class="mt-4">
                        <button type="button" id="myForm" class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">State</th>
                        <th scope="col">City</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody id="user_details">
                    <?php foreach ($users as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['phone'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['address'] ?></td>
                            <td><?= $value['state'] ?></td>
                            <td><?= $value['city'] ?></td>
                            <td><a href="<?= site_url('edit/') . $value['id'] ?>" class="btn btn-primary"><i class="bi bi-wrench"></i></a></td>
                            <td><button uid="<?= $value['id'] ?>" class="btn deleting btn-danger"><i class="bi bi-trash3"></i></button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script>
        var citybystate = {
            'Andaman and Nicobar Islands': ['Port Blair'],
            'Andhra Pradesh': ['Adoni',
                'Amaravati',
                'Anantapur',
                'Chandragiri',
                'Chittoor',
                'Dowlaiswaram',
                'Eluru',
                'Guntur',
                'Kadapa',
                'Kakinada',
                'Kurnool',
                'Machilipatnam',
                'Nagarjunakoṇḍa',
                'Rajahmundry',
                'Dharamavaram',
                'Srikakulam',
                'Tirupati',
                'Vijayawada',
                'Visakhapatnam',
                'Vizianagaram',
                'Rajamehendravaram',
                'Tenali',
                'Nandyal',
                'Ongole',
                'Guntakal',
                'Madanapalle',
                'Yemmiganur',
                'Itanagar',
                'Nellore',
                'Proddatur',
                'Dhuburi',
                'Gudivada',
                'Narasaraopet',
                ' Tadipatri',
                'Hindupur',
                'Chilakaluripet',
                'Tadepalligudem',
                'Mangalagiri',
                'Bhimavaram'
            ],
            'Arunachal Pradesh': ['Itanagar',
                ' Anjaw',
                ' Changlang',
                ' Kra Daadi, Siang',
                ' Kurung Kumey',
                ' Longding',
                ' Lower Siang',
                ' Namsai',
                ' Pakke-Kessang',
                ' Papum Pare',
                ' Upper Siang',
                'Kamle',
                'Lepa-Rada ',
                'Lower Dibang Valley',
                'Shi-Yomi',
                'Tawang'
            ],
            'Assam': ['Baksa',
                'Barpeta',
                'Bongaigaon',
                'Cachar',
                'Chirang',
                'Darrang',
                'Dhemaji',
                'Dhupuri',
                'Dibrugarh',
                'Dispur',
                'Goalpara',
                'Golaghat',
                'Guwahati',
                'Halilakandi',
                'Jorhat',
                'Kamrup',
                'Kamrup Metro',
                'Karbi Anglong',
                'Karimganj',
                'Kokrajhar',
                'Morigaon',
                'Nagaon',
                'Nalbari',
                'Silchar',
                'Sivasagar',
                'Sonitpur',
                'Tezpur',
                'Tinsukia',
                'Udalguri'
            ],
            'Bihar': ['Arrah',
                'Barauni',
                'Begusarai',
                'Bettiah',
                'Bhagalpur',
                'Bihar Sharif',
                'Bodh Gaya',
                'Buxar',
                'Chhapra',
                'Darbhanga',
                'Dehri',
                'Dhanapur',
                'Dinapur Nizamat',
                'Gaya',
                'Hajipur',
                'Jamalpur',
                'Jehanabad',
                'Katihar',
                'Madhubani',
                'Motihari',
                'Munger',
                'Muzaffarpur',
                'Patna',
                'Purnia',
                'Pusa',
                'Saharsa',
                'Samastipur',
                'Sasaram',
                'Sitamarhi',
                'Siwan'
            ],
            'Chandigarh': ['Chandigarh'],
            'Chhattisgarh': ['Ambikapur',
                'Bhilai',
                'Bilaspur',
                'Dhamtari',
                'Durg',
                'Jagdalpur',
                'Raipur',
                'Rajnandgaon'
            ],
            'Dadra and Nagar Haveli': ['Silvassa'],
            'Daman and Diu': ['Daman',
                'Diu'
            ],
            'Delhi': [
                'Delhi',
                'Firozabad',
                'Mehrauli',
                'New Delhi',
                'Shahjehabanad',
                'Shergarh',
                'Siri',
                'Tughlakabad'
            ],
            'Goa': ['Bicholim',
                'Canacona',
                'Cuncolim',
                'Curchorem',
                'Madgaon',
                'Mapusa',
                'Margao',
                'Mormugao',
                'Panaji',
                'Pernem',
                'Ponda',
                'Quepem',
                'Sanguem',
                'Sanquelim',
                'Valpoi'
            ],
            'Lakshadweep': ['Lakshadweep'],
            'Gujarat': ['Ahmadabad',
                'Amreli',
                'Bharuch',
                'Bhavnagar',
                'Bhuj',
                'Dwarka',
                'Gandhinagar',
                'Godhra',
                'Jamnagar',
                'Junagadh',
                'Kandla',
                'Khambhat',
                'Kheda',
                'Mahesana',
                'Morbi',
                'Nadiad',
                'Navsari',
                'Okha',
                'Palanpur',
                'Patan',
                'Porbandar',
                'Rajkot',
                'Surat',
                'Surendranagar',
                'Valsad',
                'Veraval'
            ],
            'Haryana': ['Ambala',
                'Bhiwani',
                'Chandigarh',
                'Faridabad',
                'Firozpur Jhirka',
                'Gurugram',
                'Hansi',
                'Hisar',
                'Jind',
                'Kaithal',
                'Karnal',
                'Kurukshetra',
                'Panipat',
                'Pehowa',
                'Rewari',
                'Rohtak',
                'Sirsa',
                'Sonipat'
            ],
            'Himachal Pradesh': ['Chamba',
                'Dalhousie',
                'Dharmshala',
                'Hamirpur',
                'Kangra',
                'Kinnaur',
                'Kullu',
                'Lahaul &Spiti',
                'Mandi',
                'Nahan',
                'Shimla',
                'Sirmanur',
                'Solan',
                'Una'
            ],
            'Jammu and Kashmir': ['Anantnag',
                'Baramula',
                'Doda',
                'Gulmarg',
                'Jammu',
                'Kathua',
                'Punch',
                'Rajouri',
                'Samba',
                'Srinagar',
                'Udhampur'
            ],
            'Jharkhand': ['Bokaro',
                'Chaibasa',
                'Deoghar',
                'Dhanbad',
                'Dumka',
                'Giridih',
                'Hazaribag',
                'Jamshedpur',
                'Jharia',
                'Rajmahal',
                'Ranchi',
                'Saraikela'
            ],
            'Karnataka': ['Badami',
                'Bagalkot',
                'Ballari',
                'Belagavi',
                'Bengaluru',
                'Bhadravati',
                'Bidar',
                'Bijapur',
                'Chikkamagaluru',
                'Chitradurga',
                'Davangere',
                'Gadag-Betageri',
                'Gangavati',
                'Gulbarga',
                'Halebid',
                'Hassan',
                'Hospet',
                'Hubballi-Dharwad',
                'Kalaburagi',
                'Kolar',
                'Madikeri',
                'Mandya',
                'Mangaluru',
                'Mysuru',
                'Raichur',
                'Ranebennuru',
                'Robertsonpet',
                'Shivamogga',
                'Shravanabelagola',
                'Shrirangapattana',
                'Tumakuru',
                'Udupi',
                'Vijayapura'
            ],
            'Kerala': ['Alappuzha',
                'Eranakulam',
                'Idukki',
                'Kannur',
                'Kasargod',
                'Kochi',
                'Kollam',
                'Kottayam',
                'Kozhikode',
                'Malappuram',
                'Mattancheri',
                'Palakkad',
                'Pathanamthitta',
                'Thalassery',
                'Thiruvananthapuram',
                'Thrissur',
                'Vatakara',
                'Wayanad'
            ],
            'Ladakh': ['Kargil',
                'Leh'
            ],
            'Madhya Pradesh': ['Balaghat',
                'Barwani',
                'Betul',
                'Bharhut',
                'Bhind',
                'Bhojpur',
                'Bhopal',
                'Burhanpur',
                'Chhatarpur',
                'Chhindwara',
                'Damoh',
                'Datia',
                'Dewas',
                'Dhar',
                'Dr. Ambedkar Nagar (Mhow)',
                'Guna',
                'Gwalior',
                'Hoshangabad',
                'Indore',
                'Itarsi',
                'Jabalpur',
                'Jhabua',
                'Khajuraho',
                'Khandwa',
                'Khargone',
                'Maheshwar',
                'Mandla',
                'Mandsaur',
                'Morena',
                'Murwara',
                'Narsimhapur',
                'Narsinghgarh',
                'Narwar',
                'Neemuch',
                'Nowgong',
                'Orchha',
                'Panna',
                'Raisen',
                'Rajgarh',
                'Ratlam',
                'Rewa',
                'Sagar',
                'Sarangpur',
                'Satna',
                'Sehore',
                'Seoni',
                'Shahdol',
                'Shajapur',
                'Sheopur',
                'Shivpuri',
                'Ujjain',
                'Vidisha'
            ],
            'Maharashtra': ['Ahmadnagar',
                'Akola',
                'Amravati',
                'Aurangabad',
                'Bhandara',
                'Bhusawal',
                'Bid',
                'Buldhana',
                'Chandrapur',
                'Daulatabad',
                'Dhule',
                'Jalgaon',
                'Kalyan',
                'Karli',
                'Kolhapur',
                'Mahabaleshwar',
                'Malegaon',
                'Matheran',
                'Mumbai',
                'Nagpur',
                'Nanded',
                'Nashik',
                'Osmanabad',
                'Pandharpur',
                'Parbhani',
                'Pune',
                'Ratnagiri',
                'Sangli',
                'Satara',
                'Sevagram',
                'Solapur',
                'Thane',
                'Ulhasnagar',
                'Vasai-Virar',
                'Wardha',
                'Yavatmal'
            ],
            'Manipur': [
                'Churachandpur',
                'Imphal',
                'Senapati',
                'Tamenglong',
                'Thoubal',
                'Ukhrul'
            ],
            'Meghalaya': ['Cherrapunji',
                'Garo Hills',
                'Jaintia Hills',
                'Khasi Hills',
                'Ribhoi',
                'Shillong'
            ],
            'Mizoram': ['Aizawl',
                'Champhai',
                'Kolasib',
                'Lawngtlai',
                'Lunglei',
                'Mamit',
                'Saiha',
                'Serchhip'
            ],
            'Nagaland': ['Chumoukedima',
                'Dimapur',
                'Kiphire',
                'Kohima',
                'Longleng',
                'Mokokchung',
                'Mon',
                'Niuland',
                'Noklak',
                'Peren',
                'Phek',
                'Tseminyu',
                'Tuensang',
                'Wokha',
                'Zunheboto'
            ],
            'Odisha': ['Balangir',
                'Baleshwar',
                'Barbil',
                'Bargarh',
                'Baripada',
                'Bhawanipatna',
                'Bhubaneshwar',
                'Brahmapur',
                'Brajarajnagar',
                'Byasangapur',
                'Cuttack',
                'Dhenkanal',
                'Jatani',
                'Jaypur',
                'Kendujhar',
                'Konark',
                'Koraput',
                'Paradip',
                'Phulabani',
                'Puri',
                'Rajagangapur',
                'Sambalpur',
                'sunabeda',
                'Udayagiri'
            ],
            'Puducherry': ['Karaikal',
                'Mahe',
                'Puducherry',
                'Yanam'
            ],
            'Punjab': ['Amritsar',
                'Batala',
                'Bathinda',
                'Faridkot',
                'Fetehgarh Sahib',
                'Firozpur',
                'Gurdaspur',
                'Hoshiarpur',
                'Jalandhar',
                'Kapurthala',
                'Ludhiana',
                'Mansa',
                'Moga',
                'Mukster',
                'Nabha',
                'Patiala',
                'Rupnagar',
                'S.A.S Nagar',
                'S.B.S Nagar',
                'Sangrur',
                'Tam Taran'
            ],
            'Rajasthan': ['Abu',
                'Ajmer',
                'Alwar',
                'Amer',
                'Barmer',
                'Beawar',
                'Bharatpur',
                'Bhilwara',
                'Bikaner',
                'Bundi',
                'Chittaurgarh',
                'Churu',
                'Dhaulpur',
                'Dungarpur',
                'Ganganagar',
                'Hanumangarh',
                'Jaipur',
                'Jaisalmer',
                'Jalor',
                'Jhalawar',
                'Jhunjhunu',
                'Jodhpur',
                'Kishangarh',
                'Kota',
                'Merta',
                'Nagaur',
                'Nathdwara',
                'Pali',
                'Phalodi',
                'Pushkar',
                'Sawai Madhopur',
                'Shahpura',
                'Sikar',
                'Sirohi',
                'Tonk',
                'Udaipur'
            ],
            'Sikkim': ['Gangtok',
                'Gyalshing',
                'Lachung',
                'Mangan',
                'Namchi',
                'Pakyong',
                'Soreng'
            ],
            'Tamil Nadu': ['Ambur',
                'Anthiyur',
                'Arcot',
                'Bhavani',
                'Chengalpattu',
                'Chennai',
                'Chidambaram',
                'Coimbatore',
                'Cuddalore',
                'Dharmapuri',
                'Dindigul',
                'Erode',
                'Gopichettipalayam',
                'Gudiyatham',
                'Hosur',
                'Kanchipuram',
                'Kanniyakumari',
                'Karaikudi',
                'Karur',
                'Kodaikanal',
                'Kumarapalayam',
                'Kumbakonam',
                'Madurai',
                'Mamallapuram',
                'Nagappattinam',
                'Nagercoil',
                'Neyveli',
                'Palayamkottai',
                'Pollachi',
                'Pudukkottai',
                'Rajapalayam',
                'Ramanathapuram',
                'Ranipet',
                'Salem',
                'Sathyamangalam',
                'Sivakasi',
                'Thanjavur',
                'Thoothukudi',
                'Tiruchchirappalli',
                'Tirunelveli',
                'Tiruppur',
                'Tiruvannamalai',
                'Udhagamandalam',
                'Vaniyambadi',
                'Vellore'
            ],
            'Telangana': ['Adilabad',
                'Bhadradri Kothagudem',
                'Hyderabad',
                'Jagitial',
                'Jangaon',
                'Jayashankar Bhupalpally',
                'Jogulamba Gadwal',
                'Kamareddy',
                'Karimnagar',
                'Khammam',
                'Komaram Bheem',
                'Mahabubabad',
                'Mahbubnagar',
                'Mancherial',
                'Medak',
                'Medchal-Malkajgiri',
                'Mulugu',
                'Nagarkurnool',
                'Nalgonda',
                'Narayanpet',
                'Nirmal',
                'Nizamabad',
                'Peddapalli',
                'Rajanna Sircilla',
                'Sangareddi',
                'Siddipet',
                'Suryapet',
                'Vikarabad',
                'Warangal'
            ],
            'Tripura': ['Agartala',
                'Dhalai',
                'Gomati',
                'Khowai',
                'Sepahijala',
                'Unokoti'
            ],
            'Uttar Pradesh': ['Agra',
                'Aligarh',
                'Amroha',
                'Ayodhya',
                'Azamgarh',
                'Bahraich',
                'Ballia',
                'Banda',
                'Bara Banki',
                'Bareilly',
                'Basti',
                'Bijnor',
                'Bithur',
                'Budaun',
                'Bulandshahr',
                'Deoria',
                'Etah',
                'Etawah',
                'Faizabad',
                'Farrukhabad-cum-Fatehgarh',
                'Fatehpur',
                'Fatehpur Sikri',
                'Ghaziabad',
                'Ghazipur',
                'Gonda',
                'Gorakhpur',
                'Hardoi',
                'Hathras',
                'Jalaun',
                'Jaunpur',
                'Jhansi',
                'Kannauj',
                'Kanpur',
                'Lakhimpur',
                'Lalitpur',
                'Lucknow',
                'Mainpuri',
                'Mathura',
                'Meerut',
                'Mirzapur-Vindhyachal',
                'Moradabad',
                'Muzaffarnagar',
                'Partapgarh',
                'Pilibhit',
                'Prayagraj',
                'Rae Bareli',
                'Rampur',
                'Saharanpur',
                'Sambhal',
                'Shahjahanpur',
                'Sitapur',
                'Sultanpur',
                'Tehri',
                'Varanasi'
            ],
            'Uttarakhand': ['Almora',
                'Dehra Dun',
                'Haldwani',
                'Haridwar',
                'Kashipur',
                'Mussoorie',
                'Nainital',
                'Pithoragarh',
                'Rishikesh',
                'Roorkee',
                'Rudrapur'
            ],
            'West Bengal': ['Alipore',
                'Alipur Duar',
                'Alipurduar',
                'Asansol',
                'Baharampur',
                'Bally',
                'Balurghat',
                'Bangaon',
                'Bankura',
                'Baranagar',
                'Barasat',
                'Barrackpore',
                'Basirhat',
                'Bhatpara',
                'Bishnupur',
                'Bolpur',
                'Budge Budge',
                'Burdwan',
                'Chakdaha',
                'Chandernagore',
                'Cooch Behar',
                'Dankuni',
                'Darjeeling',
                'Dhulian',
                'Diamond Harbour',
                'Dum Dum',
                'Durgapur',
                'Habra',
                'Haldia',
                'Halisahar',
                'Haora',
                'Hugli',
                'Ingraj Bazar',
                'Jalpaiguri',
                'Jangipur',
                'Kalimpong',
                'Kamarhati',
                'Kanchrapara',
                'Kharagpur',
                'Kolkata',
                'Krishnanagar',
                'Malda',
                'Medinipur',
                'Midnapore',
                'Murshidabad',
                'Nabadwip',
                'Palashi',
                'Panihati',
                'Purulia',
                'Raiganj',
                'Ranaghat',
                'Santipur',
                'Shantiniketan',
                'Shantipur',
                'Shrirampur',
                'Siliguri',
                'Siuri',
                'Tamluk',
                'Titagarh'
            ]
        }

        function changestate(value) {
            var city = "<option value=''>Choose City</option> ";
            if (value.length != 0) {
                for (id in citybystate[value]) {
                    city += "<option>" + citybystate[value][id] + "</option>";
                }
            }
            document.querySelector(".city").innerHTML = city;
        }
    </script>
    <script>
        document.querySelector("#myForm").onclick = function() {
            event.preventDefault();
            const name = document.querySelector("#name").value;
            const email = document.querySelector("#email").value;
            const phone = document.querySelector("#phone").value;
            const address = document.querySelector("#address").value;
            const state = document.querySelector("#state").value;
            const city = document.querySelector("#city").value;

            if (name === "") {
                document.querySelector("#error_name").style.display = "block";
            } else {
                document.querySelector("#error_name").style.display = "none";
            }

            if (phone === "" || phone.length != 10) {
                document.querySelector("#error_phone").style.display = "block";
            } else {
                document.querySelector("#error_phone").style.display = "none";
            }

            if (email === "") {
                document.querySelector("#error_email").style.display = "block";
            } else {
                document.querySelector("#error_email").style.display = "none";
            }

            if (address === "") {
                document.querySelector("#error_address").style.display = "block";
            } else {
                document.querySelector("#error_address").style.display = "none";
            }

            if (state === "") {
                document.querySelector("#error_state").style.display = "block";
            } else {
                document.querySelector("#error_state").style.display = "none";
            }

            if (city === "") {
                document.querySelector("#error_city").style.display = "block";
            } else {
                document.querySelector("#error_city").style.display = "none";
            }

            if (name && phone && email && address && state && city) {
                $.ajax({
                    url: "<?= site_url("/") ?>",
                    method: 'POST',
                    type: 'POST',
                    data: {
                        name: name,
                        phone: phone,
                        email: email,
                        address: address,
                        state: state,
                        city: city,
                    },
                    success: function(data) {
                        var details = JSON.parse(data);
                        var dataArray = details
                        processArray(dataArray);
                        if (details.status == 200) {
                            document.querySelector("#clearform").reset();
                            document.querySelector('#success').style.display = "block";
                            setTimeout(function() {
                                document.querySelector('#success').style.display = "none";
                            }, 3000)
                        } else {
                            document.querySelector('#wrong').style.display = "block";
                            setTimeout(function() {
                                document.querySelector('#wrong').style.display = "none";
                            }, 3000)
                        }
                    }
                });
            }
        }

        function processArray(details) {
            var html = ""
            sno = 1;
            if (details.users) {
                for (var i = 0; i < details.users.length; i++) {
                    html += '<tr>';
                    html += '<th scope="row">' + sno++ + '</th>';
                    html += '<td>' + details.users[i].name + '</td>';
                    html += '<td>' + details.users[i].phone + '</td>';
                    html += '<td>' + details.users[i].email + '</td>';
                    html += '<td>' + details.users[i].address + '</td>';
                    html += '<td>' + details.users[i].state + '</td>';
                    html += '<td>' + details.users[i].city + '</td>';
                    html += '<td><a href=<?= site_url('edit/') ?>' + details.users[i].id + ' class="btn btn-primary"><i class="bi bi-wrench"></i></a></td>';
                    html += '<td><button uid=' + details.users[i].id + ' class="btn deleting btn-danger"><i class="bi bi-trash3"></i></button></td></tr>';
                }
            }
            document.querySelector("#user_details").innerHTML = html;
        }

        function testing() {
            if (document.querySelector(".deleting")) {
                $('.deleting').on('click', function() {
                    var user_id = $(this).attr('uid');
                    $.ajax({
                        url: "<?= site_url("delete") ?>",
                        method: 'POST',
                        type: 'POST',
                        data: {
                            id: user_id,
                        },
                        success: function(data) {
                            var details = JSON.parse(data);
                            var dataArray = details;
                            processArray(dataArray);
                            if (details.status == 200) {
                                document.querySelector("#clearform").reset();
                                document.querySelector('#deleted').style.display = "block";
                                setTimeout(function() {
                                    document.querySelector('#deleted').style.display = "none";
                                }, 3000);
                            } else {
                                document.querySelector('#wrong').style.display = "block";
                                setTimeout(function() {
                                    document.querySelector('#wrong').style.display = "none";
                                }, 3000);
                            }
                        }
                    });
                });
            }
        }

        setInterval(testing, 1000);
    </script>
</body>

</html>