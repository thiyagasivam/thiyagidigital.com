<?php
// IMPORTANT: Build city context and meta BEFORE including header (no output above)
// Get city name from URL and sanitize it
$citySlug = isset($_GET['city']) ? strtolower(trim($_GET['city'])) : '';
$cityName = ucwords(str_replace('-', ' ', $citySlug));

$supportedCities = [
    // Major cities
    'chennai' => ['name' => 'Chennai', 'state' => 'Tamil Nadu'],
    'madurai' => ['name' => 'Madurai', 'state' => 'Tamil Nadu'],
    'coimbatore' => ['name' => 'Coimbatore', 'state' => 'Tamil Nadu'],
    'tiruchirappalli' => ['name' => 'Tiruchirappalli', 'state' => 'Tamil Nadu'],
    'thoothukudi' => ['name' => 'Thoothukudi', 'state' => 'Tamil Nadu'],
    'dindigul' => ['name' => 'Dindigul', 'state' => 'Tamil Nadu'],
    'thanjavur' => ['name' => 'Thanjavur', 'state' => 'Tamil Nadu'],
    'nagercoil' => ['name' => 'Nagercoil', 'state' => 'Tamil Nadu'],
    'hosur' => ['name' => 'Hosur', 'state' => 'Tamil Nadu'],
    'avadi' => ['name' => 'Avadi', 'state' => 'Tamil Nadu'],
    'kumbakonam' => ['name' => 'Kumbakonam', 'state' => 'Tamil Nadu'],
    'cuddalore' => ['name' => 'Cuddalore', 'state' => 'Tamil Nadu'],
    'karur' => ['name' => 'Karur', 'state' => 'Tamil Nadu'],
    'sivakasi' => ['name' => 'Sivakasi', 'state' => 'Tamil Nadu'],
    'tambaram' => ['name' => 'Tambaram', 'state' => 'Tamil Nadu'],
    'karaikudi' => ['name' => 'Karaikudi', 'state' => 'Tamil Nadu'],
    'namakkal' => ['name' => 'Namakkal', 'state' => 'Tamil Nadu'],
    'chengalpattu' => ['name' => 'Chengalpattu', 'state' => 'Tamil Nadu'],
    'kanchipuram' => ['name' => 'Kanchipuram', 'state' => 'Tamil Nadu'],
    'ooty' => ['name' => 'Ooty', 'state' => 'Tamil Nadu'],
    'nagapattinam' => ['name' => 'Nagapattinam', 'state' => 'Tamil Nadu'],
    'ariyalur' => ['name' => 'Ariyalur', 'state' => 'Tamil Nadu'],
    'virudhunagar' => ['name' => 'Virudhunagar', 'state' => 'Tamil Nadu'],
    'tenkasi' => ['name' => 'Tenkasi', 'state' => 'Tamil Nadu'],
    'ramanathapuram' => ['name' => 'Ramanathapuram', 'state' => 'Tamil Nadu'],
    'theni' => ['name' => 'Theni', 'state' => 'Tamil Nadu'],
    'sivagangai' => ['name' => 'Sivagangai', 'state' => 'Tamil Nadu'],
    'dharmapuri' => ['name' => 'Dharmapuri', 'state' => 'Tamil Nadu'],
    'krishnagiri' => ['name' => 'Krishnagiri', 'state' => 'Tamil Nadu'],
    'nilgiris' => ['name' => 'Nilgiris', 'state' => 'Tamil Nadu'],
    'thiruvarur' => ['name' => 'Thiruvarur', 'state' => 'Tamil Nadu'],
    'mayiladuthurai' => ['name' => 'Mayiladuthurai', 'state' => 'Tamil Nadu'],
    // Additional cities and towns
    'tiruttani' => ['name' => 'Tiruttani', 'state' => 'Tamil Nadu'],
    'ponneri' => ['name' => 'Ponneri', 'state' => 'Tamil Nadu'],
    'naravarikuppam' => ['name' => 'Naravarikuppam', 'state' => 'Tamil Nadu'],
    'veppampattu' => ['name' => 'Veppampattu', 'state' => 'Tamil Nadu'],
    'maduranthakam' => ['name' => 'Maduranthakam', 'state' => 'Tamil Nadu'],
    'mamallapuram' => ['name' => 'Mamallapuram', 'state' => 'Tamil Nadu'],
    'maraimalai-nagar' => ['name' => 'Maraimalai Nagar', 'state' => 'Tamil Nadu'],
    'nandivaram' => ['name' => 'Nandivaram', 'state' => 'Tamil Nadu'],
    'tirukalukundram' => ['name' => 'Tirukalukundram', 'state' => 'Tamil Nadu'],
    'kundrathur' => ['name' => 'Kundrathur', 'state' => 'Tamil Nadu'],
    'mangadu' => ['name' => 'Mangadu', 'state' => 'Tamil Nadu'],
    'sriperumbudur' => ['name' => 'Sriperumbudur', 'state' => 'Tamil Nadu'],
    'chidambaram' => ['name' => 'Chidambaram', 'state' => 'Tamil Nadu'],
    'panruti' => ['name' => 'Panruti', 'state' => 'Tamil Nadu'],
    'nellikuppam' => ['name' => 'Nellikuppam', 'state' => 'Tamil Nadu'],
    'tittakudi' => ['name' => 'Tittakudi', 'state' => 'Tamil Nadu'],
    'vadalur' => ['name' => 'Vadalur', 'state' => 'Tamil Nadu'],
    'virudhachalam' => ['name' => 'Virudhachalam', 'state' => 'Tamil Nadu'],
    'viluppuram' => ['name' => 'Viluppuram', 'state' => 'Tamil Nadu'],
    'kallakurichi' => ['name' => 'Kallakurichi', 'state' => 'Tamil Nadu'],
    'ranipet' => ['name' => 'Ranipet', 'state' => 'Tamil Nadu'],
    'tirupathur' => ['name' => 'Tirupathur', 'state' => 'Tamil Nadu'],
    'kottakuppam' => ['name' => 'Kottakuppam', 'state' => 'Tamil Nadu'],
    'tindivanam' => ['name' => 'Tindivanam', 'state' => 'Tamil Nadu'],
    'arni' => ['name' => 'Arni', 'state' => 'Tamil Nadu'],
    'tirukoilur' => ['name' => 'Tirukoilur', 'state' => 'Tamil Nadu'],
    'ulundurpettai' => ['name' => 'Ulundurpettai', 'state' => 'Tamil Nadu'],
    'gudiyatham' => ['name' => 'Gudiyatham', 'state' => 'Tamil Nadu'],
    'pernambut' => ['name' => 'Pernambut', 'state' => 'Tamil Nadu'],
    'arakkonam' => ['name' => 'Arakkonam', 'state' => 'Tamil Nadu'],
    'arcot' => ['name' => 'Arcot', 'state' => 'Tamil Nadu'],
    'melvisharam' => ['name' => 'Melvisharam', 'state' => 'Tamil Nadu'],
    'sholinghur' => ['name' => 'Sholinghur', 'state' => 'Tamil Nadu'],
    'walajapet' => ['name' => 'Walajapet', 'state' => 'Tamil Nadu'],
    'ambur' => ['name' => 'Ambur', 'state' => 'Tamil Nadu'],
    'jolarpettai' => ['name' => 'Jolarpettai', 'state' => 'Tamil Nadu'],
    'tirupattur' => ['name' => 'Tirupattur', 'state' => 'Tamil Nadu'],
    'vaniyambadi' => ['name' => 'Vaniyambadi', 'state' => 'Tamil Nadu'],
    'chengam' => ['name' => 'Chengam', 'state' => 'Tamil Nadu'],
    'polur' => ['name' => 'Polur', 'state' => 'Tamil Nadu'],
    'harur' => ['name' => 'Harur', 'state' => 'Tamil Nadu'],
    'attur' => ['name' => 'Attur', 'state' => 'Tamil Nadu'],
    'edaganasalai' => ['name' => 'Edaganasalai', 'state' => 'Tamil Nadu'],
    'edappadi' => ['name' => 'Edappadi', 'state' => 'Tamil Nadu'],
    'mettur' => ['name' => 'Mettur', 'state' => 'Tamil Nadu'],
    'narasingapuram' => ['name' => 'Narasingapuram', 'state' => 'Tamil Nadu'],
    'sangagiri' => ['name' => 'Sangagiri', 'state' => 'Tamil Nadu'],
    'tharamangalam' => ['name' => 'Tharamangalam', 'state' => 'Tamil Nadu'],
    'komarapalayam' => ['name' => 'Komarapalayam', 'state' => 'Tamil Nadu'],
    'mohanur' => ['name' => 'Mohanur', 'state' => 'Tamil Nadu'],
    'pallipalayam' => ['name' => 'Pallipalayam', 'state' => 'Tamil Nadu'],
    'rasipuram' => ['name' => 'Rasipuram', 'state' => 'Tamil Nadu'],
    'tiruchengode' => ['name' => 'Tiruchengode', 'state' => 'Tamil Nadu'],
    'velur' => ['name' => 'Velur', 'state' => 'Tamil Nadu'],
    'kulithalai' => ['name' => 'Kulithalai', 'state' => 'Tamil Nadu'],
    'pallapatti' => ['name' => 'Pallapatti', 'state' => 'Tamil Nadu'],
    'pugalur' => ['name' => 'Pugalur', 'state' => 'Tamil Nadu'],
    'mettupalayam' => ['name' => 'Mettupalayam', 'state' => 'Tamil Nadu'],
    'karamadai' => ['name' => 'Karamadai', 'state' => 'Tamil Nadu'],
    'udagamandalam' => ['name' => 'Udagamandalam', 'state' => 'Tamil Nadu'],
    'gudalur' => ['name' => 'Gudalur', 'state' => 'Tamil Nadu'],
    'karumathampatti' => ['name' => 'Karumathampatti', 'state' => 'Tamil Nadu'],
    'sulur' => ['name' => 'Sulur', 'state' => 'Tamil Nadu'],
    'pollachi' => ['name' => 'Pollachi', 'state' => 'Tamil Nadu'],
    'valparai' => ['name' => 'Valparai', 'state' => 'Tamil Nadu'],
    'bhavani' => ['name' => 'Bhavani', 'state' => 'Tamil Nadu'],
    'gobichettipalayam' => ['name' => 'Gobichettipalayam', 'state' => 'Tamil Nadu'],
    'kavandapadi' => ['name' => 'Kavandapadi', 'state' => 'Tamil Nadu'],
    'perundurai' => ['name' => 'Perundurai', 'state' => 'Tamil Nadu'],
    'punjai-puliampatti' => ['name' => 'Punjai Puliampatti', 'state' => 'Tamil Nadu'],
    'sathyamangalam' => ['name' => 'Sathyamangalam', 'state' => 'Tamil Nadu'],
    'avinashi' => ['name' => 'Avinashi', 'state' => 'Tamil Nadu'],
    'dharapuram' => ['name' => 'Dharapuram', 'state' => 'Tamil Nadu'],
    'kangeyam' => ['name' => 'Kangeyam', 'state' => 'Tamil Nadu'],
    'palladam' => ['name' => 'Palladam', 'state' => 'Tamil Nadu'],
    'thirumuruganpoondi' => ['name' => 'Thirumuruganpoondi', 'state' => 'Tamil Nadu'],
    'udumalaipettai' => ['name' => 'Udumalaipettai', 'state' => 'Tamil Nadu'],
    'vellakoil' => ['name' => 'Vellakoil', 'state' => 'Tamil Nadu'],
    'manachanallur' => ['name' => 'Manachanallur', 'state' => 'Tamil Nadu'],
    'manapparai' => ['name' => 'Manapparai', 'state' => 'Tamil Nadu'],
    'musiri' => ['name' => 'Musiri', 'state' => 'Tamil Nadu'],
    'lalgudi' => ['name' => 'Lalgudi', 'state' => 'Tamil Nadu'],
    'thuraiyur' => ['name' => 'Thuraiyur', 'state' => 'Tamil Nadu'],
    'thuvakudi' => ['name' => 'Thuvakudi', 'state' => 'Tamil Nadu'],
    'vedaranyam' => ['name' => 'Vedaranyam', 'state' => 'Tamil Nadu'],
    'sirkazhi' => ['name' => 'Sirkazhi', 'state' => 'Tamil Nadu'],
    'jayankondam' => ['name' => 'Jayankondam', 'state' => 'Tamil Nadu'],
    'perambalur' => ['name' => 'Perambalur', 'state' => 'Tamil Nadu'],
    'koothanallur' => ['name' => 'Koothanallur', 'state' => 'Tamil Nadu'],
    'mannargudi' => ['name' => 'Mannargudi', 'state' => 'Tamil Nadu'],
    'thiruthuraipoondi' => ['name' => 'Thiruthuraipoondi', 'state' => 'Tamil Nadu'],
    'adirampattinam' => ['name' => 'Adirampattinam', 'state' => 'Tamil Nadu'],
    'pattukkottai' => ['name' => 'Pattukkottai', 'state' => 'Tamil Nadu'],
    'thiruvaiyaru' => ['name' => 'Thiruvaiyaru', 'state' => 'Tamil Nadu'],
    'aranthangi' => ['name' => 'Aranthangi', 'state' => 'Tamil Nadu'],
    'melur' => ['name' => 'Melur', 'state' => 'Tamil Nadu'],
    'thirumangalam' => ['name' => 'Thirumangalam', 'state' => 'Tamil Nadu'],
    'usilampatti' => ['name' => 'Usilampatti', 'state' => 'Tamil Nadu'],
    'bodinayakkanur' => ['name' => 'Bodinayakkanur', 'state' => 'Tamil Nadu'],
    'chinnamanur' => ['name' => 'Chinnamanur', 'state' => 'Tamil Nadu'],
    'cumbum' => ['name' => 'Cumbum', 'state' => 'Tamil Nadu'],
    'periyakulam' => ['name' => 'Periyakulam', 'state' => 'Tamil Nadu'],
    'theni-allinagaram' => ['name' => 'Theni Allinagaram', 'state' => 'Tamil Nadu'],
    'uthamapalayam' => ['name' => 'Uthamapalayam', 'state' => 'Tamil Nadu'],
    'kodaikanal' => ['name' => 'Kodaikanal', 'state' => 'Tamil Nadu'],
    'oddanchatram' => ['name' => 'Oddanchatram', 'state' => 'Tamil Nadu'],
    'palani' => ['name' => 'Palani', 'state' => 'Tamil Nadu'],
    'devakottai' => ['name' => 'Devakottai', 'state' => 'Tamil Nadu'],
    'manamadurai' => ['name' => 'Manamadurai', 'state' => 'Tamil Nadu'],
    'kilakarai' => ['name' => 'Kilakarai', 'state' => 'Tamil Nadu'],
    'paramakudi' => ['name' => 'Paramakudi', 'state' => 'Tamil Nadu'],
    'rameswaram' => ['name' => 'Rameswaram', 'state' => 'Tamil Nadu'],
    'guduvancheri' => ['name' => 'Guduvancheri', 'state' => 'Tamil Nadu'],
    'ambasamudram' => ['name' => 'Ambasamudram', 'state' => 'Tamil Nadu'],
    'kalakkad' => ['name' => 'Kalakkad', 'state' => 'Tamil Nadu'],
    'kuzhithurai' => ['name' => 'Kuzhithurai', 'state' => 'Tamil Nadu'],
    'vadakkuvalliyur' => ['name' => 'Vadakkuvalliyur', 'state' => 'Tamil Nadu'],
    'vikramasingapuram' => ['name' => 'Vikramasingapuram', 'state' => 'Tamil Nadu'],
    'kadayanallur' => ['name' => 'Kadayanallur', 'state' => 'Tamil Nadu'],
    'puliyankudi' => ['name' => 'Puliyankudi', 'state' => 'Tamil Nadu'],
    'sankarankovil' => ['name' => 'Sankarankovil', 'state' => 'Tamil Nadu'],
    'sengottai' => ['name' => 'Sengottai', 'state' => 'Tamil Nadu'],
    'surandai' => ['name' => 'Surandai', 'state' => 'Tamil Nadu'],
    'aruppukkottai' => ['name' => 'Aruppukkottai', 'state' => 'Tamil Nadu'],
    'rajapalayam' => ['name' => 'Rajapalayam', 'state' => 'Tamil Nadu'],
    'sattur' => ['name' => 'Sattur', 'state' => 'Tamil Nadu'],
    'srivilliputhur' => ['name' => 'Srivilliputhur', 'state' => 'Tamil Nadu'],
    'kayalpatnam' => ['name' => 'Kayalpatnam', 'state' => 'Tamil Nadu'],
    'kovilpatti' => ['name' => 'Kovilpatti', 'state' => 'Tamil Nadu'],
    'tiruchendur' => ['name' => 'Tiruchendur', 'state' => 'Tamil Nadu'],
    'padmanabhapuram' => ['name' => 'Padmanabhapuram', 'state' => 'Tamil Nadu'],
    'colachel' => ['name' => 'Colachel', 'state' => 'Tamil Nadu'],
    // Major cities across India
    'nicobar' => ['name' => 'Nicobar', 'state' => 'Andaman and Nicobar Islands'],
    'north-middle-andaman' => ['name' => 'North Middle Andaman', 'state' => 'Andaman and Nicobar Islands'],
    'south-andaman' => ['name' => 'South Andaman', 'state' => 'Andaman and Nicobar Islands'],
    'alluri-sitarama-raju' => ['name' => 'Alluri Sitarama Raju', 'state' => 'Andhra Pradesh'],
    'anakapalli' => ['name' => 'Anakapalli', 'state' => 'Andhra Pradesh'],
    'anantapur' => ['name' => 'Anantapur', 'state' => 'Andhra Pradesh'],
    'annamaya' => ['name' => 'Annamaya', 'state' => 'Andhra Pradesh'],
    'bapatla' => ['name' => 'Bapatla', 'state' => 'Andhra Pradesh'],
    'chittoor' => ['name' => 'Chittoor', 'state' => 'Andhra Pradesh'],
    'east-godavari' => ['name' => 'East Godavari', 'state' => 'Andhra Pradesh'],
    'eluru' => ['name' => 'Eluru', 'state' => 'Andhra Pradesh'],
    'guntur' => ['name' => 'Guntur', 'state' => 'Andhra Pradesh'],
    'kadapa' => ['name' => 'Kadapa', 'state' => 'Andhra Pradesh'],
    'kakinada' => ['name' => 'Kakinada', 'state' => 'Andhra Pradesh'],
    'konaseema' => ['name' => 'Konaseema', 'state' => 'Andhra Pradesh'],
    'krishna' => ['name' => 'Krishna', 'state' => 'Andhra Pradesh'],
    'kurnool' => ['name' => 'Kurnool', 'state' => 'Andhra Pradesh'],
    'manyam' => ['name' => 'Manyam', 'state' => 'Andhra Pradesh'],
    'n-t-rama-rao' => ['name' => 'N T Rama Rao', 'state' => 'Andhra Pradesh'],
    'nandyal' => ['name' => 'Nandyal', 'state' => 'Andhra Pradesh'],
    'nellore' => ['name' => 'Nellore', 'state' => 'Andhra Pradesh'],
    'palnadu' => ['name' => 'Palnadu', 'state' => 'Andhra Pradesh'],
    'prakasam' => ['name' => 'Prakasam', 'state' => 'Andhra Pradesh'],
    'sri-balaji' => ['name' => 'Sri Balaji', 'state' => 'Andhra Pradesh'],
    'sri-satya-sai' => ['name' => 'Sri Satya Sai', 'state' => 'Andhra Pradesh'],
    'srikakulam' => ['name' => 'Srikakulam', 'state' => 'Andhra Pradesh'],
    'visakhapatnam' => ['name' => 'Visakhapatnam', 'state' => 'Andhra Pradesh'],
    'vizianagaram' => ['name' => 'Vizianagaram', 'state' => 'Andhra Pradesh'],
    'west-godavari' => ['name' => 'West Godavari', 'state' => 'Andhra Pradesh'],
    // Additional states for broader coverage
    'patna' => ['name' => 'Patna', 'state' => 'Bihar'],
    'mumbai' => ['name' => 'Mumbai', 'state' => 'Maharashtra'],
    'delhi' => ['name' => 'Delhi', 'state' => 'Delhi'],
    'kolkata' => ['name' => 'Kolkata', 'state' => 'West Bengal'],
    'bangalore' => ['name' => 'Bangalore', 'state' => 'Karnataka'],
    'hyderabad' => ['name' => 'Hyderabad', 'state' => 'Telangana'],
    'pune' => ['name' => 'Pune', 'state' => 'Maharashtra'],
    'ahmedabad' => ['name' => 'Ahmedabad', 'state' => 'Gujarat'],
    'surat' => ['name' => 'Surat', 'state' => 'Gujarat'],
    'jaipur' => ['name' => 'Jaipur', 'state' => 'Rajasthan'],
    'lucknow' => ['name' => 'Lucknow', 'state' => 'Uttar Pradesh'],
    'kanpur' => ['name' => 'Kanpur', 'state' => 'Uttar Pradesh'],
    'nagpur' => ['name' => 'Nagpur', 'state' => 'Maharashtra'],
    'indore' => ['name' => 'Indore', 'state' => 'Madhya Pradesh'],
    'thane' => ['name' => 'Thane', 'state' => 'Maharashtra'],
    'bhopal' => ['name' => 'Bhopal', 'state' => 'Madhya Pradesh'],
    'visakhapatnam' => ['name' => 'Visakhapatnam', 'state' => 'Andhra Pradesh'],
    'pimpri-chinchwad' => ['name' => 'Pimpri-Chinchwad', 'state' => 'Maharashtra'],
    'patna' => ['name' => 'Patna', 'state' => 'Bihar'],
    'vadodara' => ['name' => 'Vadodara', 'state' => 'Gujarat'],
    'ghaziabad' => ['name' => 'Ghaziabad', 'state' => 'Uttar Pradesh'],
    'ludhiana' => ['name' => 'Ludhiana', 'state' => 'Punjab'],
    'agra' => ['name' => 'Agra', 'state' => 'Uttar Pradesh'],
    'nashik' => ['name' => 'Nashik', 'state' => 'Maharashtra'],
    'faridabad' => ['name' => 'Faridabad', 'state' => 'Haryana'],
    'meerut' => ['name' => 'Meerut', 'state' => 'Uttar Pradesh'],
    'rajkot' => ['name' => 'Rajkot', 'state' => 'Gujarat'],
    'kalyan-dombivli' => ['name' => 'Kalyan-Dombivli', 'state' => 'Maharashtra'],
    'vasai-virar' => ['name' => 'Vasai-Virar', 'state' => 'Maharashtra'],
    'varanasi' => ['name' => 'Varanasi', 'state' => 'Uttar Pradesh'],
    'srinagar' => ['name' => 'Srinagar', 'state' => 'Jammu and Kashmir'],
    'aurangabad' => ['name' => 'Aurangabad', 'state' => 'Maharashtra'],
    'dhanbad' => ['name' => 'Dhanbad', 'state' => 'Jharkhand'],
    'amritsar' => ['name' => 'Amritsar', 'state' => 'Punjab'],
    'navi-mumbai' => ['name' => 'Navi Mumbai', 'state' => 'Maharashtra'],
    'allahabad' => ['name' => 'Allahabad', 'state' => 'Uttar Pradesh'],
    'ranchi' => ['name' => 'Ranchi', 'state' => 'Jharkhand'],
    'howrah' => ['name' => 'Howrah', 'state' => 'West Bengal'],
    'coimbatore' => ['name' => 'Coimbatore', 'state' => 'Tamil Nadu'],
    'jabalpur' => ['name' => 'Jabalpur', 'state' => 'Madhya Pradesh'],
    'gwalior' => ['name' => 'Gwalior', 'state' => 'Madhya Pradesh'],
    'vijayawada' => ['name' => 'Vijayawada', 'state' => 'Andhra Pradesh'],
    'jodhpur' => ['name' => 'Jodhpur', 'state' => 'Rajasthan'],
    'madurai' => ['name' => 'Madurai', 'state' => 'Tamil Nadu'],
    'raipur' => ['name' => 'Raipur', 'state' => 'Chhattisgarh'],
    'kota' => ['name' => 'Kota', 'state' => 'Rajasthan'],
    'guwahati' => ['name' => 'Guwahati', 'state' => 'Assam'],
    'chandigarh' => ['name' => 'Chandigarh', 'state' => 'Chandigarh'],
    'solapur' => ['name' => 'Solapur', 'state' => 'Maharashtra'],
    'hubli-dharwad' => ['name' => 'Hubli-Dharwad', 'state' => 'Karnataka'],
    'bareilly' => ['name' => 'Bareilly', 'state' => 'Uttar Pradesh'],
    'moradabad' => ['name' => 'Moradabad', 'state' => 'Uttar Pradesh'],
    'mysore' => ['name' => 'Mysore', 'state' => 'Karnataka'],
    'gurgaon' => ['name' => 'Gurgaon', 'state' => 'Haryana'],
    'aligarh' => ['name' => 'Aligarh', 'state' => 'Uttar Pradesh'],
    'jalandhar' => ['name' => 'Jalandhar', 'state' => 'Punjab'],
    'tiruchirappalli' => ['name' => 'Tiruchirappalli', 'state' => 'Tamil Nadu'],
    'bhubaneswar' => ['name' => 'Bhubaneswar', 'state' => 'Odisha'],
    'salem' => ['name' => 'Salem', 'state' => 'Tamil Nadu'],
    'mira-bhayandar' => ['name' => 'Mira-Bhayandar', 'state' => 'Maharashtra'],
    'warangal' => ['name' => 'Warangal', 'state' => 'Telangana'],
    'thiruvananthapuram' => ['name' => 'Thiruvananthapuram', 'state' => 'Kerala'],
    'guntur' => ['name' => 'Guntur', 'state' => 'Andhra Pradesh'],
    'bhiwandi' => ['name' => 'Bhiwandi', 'state' => 'Maharashtra'],
    'saharanpur' => ['name' => 'Saharanpur', 'state' => 'Uttar Pradesh'],
    'gorakhpur' => ['name' => 'Gorakhpur', 'state' => 'Uttar Pradesh'],
    'bikaner' => ['name' => 'Bikaner', 'state' => 'Rajasthan'],
    'amravati' => ['name' => 'Amravati', 'state' => 'Maharashtra'],
    'noida' => ['name' => 'Noida', 'state' => 'Uttar Pradesh'],
    'jamshedpur' => ['name' => 'Jamshedpur', 'state' => 'Jharkhand'],
    'bhilai-nagar' => ['name' => 'Bhilai Nagar', 'state' => 'Chhattisgarh'],
    'cuttack' => ['name' => 'Cuttack', 'state' => 'Odisha'],
    'firozabad' => ['name' => 'Firozabad', 'state' => 'Uttar Pradesh'],
    'kochi' => ['name' => 'Kochi', 'state' => 'Kerala'],
    'nellore' => ['name' => 'Nellore', 'state' => 'Andhra Pradesh'],
    'bhavnagar' => ['name' => 'Bhavnagar', 'state' => 'Gujarat'],
    'dehradun' => ['name' => 'Dehradun', 'state' => 'Uttarakhand'],
    'durgapur' => ['name' => 'Durgapur', 'state' => 'West Bengal'],
    'asansol' => ['name' => 'Asansol', 'state' => 'West Bengal'],
    'rourkela' => ['name' => 'Rourkela', 'state' => 'Odisha'],
    'nanded' => ['name' => 'Nanded', 'state' => 'Maharashtra'],
    'kolhapur' => ['name' => 'Kolhapur', 'state' => 'Maharashtra'],
    'ajmer' => ['name' => 'Ajmer', 'state' => 'Rajasthan'],
    'akola' => ['name' => 'Akola', 'state' => 'Maharashtra'],
    'gulbarga' => ['name' => 'Gulbarga', 'state' => 'Karnataka'],
    'jamnagar' => ['name' => 'Jamnagar', 'state' => 'Gujarat'],
    'ujjain' => ['name' => 'Ujjain', 'state' => 'Madhya Pradesh'],
    'loni' => ['name' => 'Loni', 'state' => 'Uttar Pradesh'],
    'siliguri' => ['name' => 'Siliguri', 'state' => 'West Bengal'],
    'jhansi' => ['name' => 'Jhansi', 'state' => 'Uttar Pradesh'],
    'ulhasnagar' => ['name' => 'Ulhasnagar', 'state' => 'Maharashtra'],
    'jammu' => ['name' => 'Jammu', 'state' => 'Jammu and Kashmir'],
    'sangli-miraj-kupwad' => ['name' => 'Sangli-Miraj-Kupwad', 'state' => 'Maharashtra'],
    'mangalore' => ['name' => 'Mangalore', 'state' => 'Karnataka'],
    'erode' => ['name' => 'Erode', 'state' => 'Tamil Nadu'],
    'belgaum' => ['name' => 'Belgaum', 'state' => 'Karnataka'],
    'ambattur' => ['name' => 'Ambattur', 'state' => 'Tamil Nadu'],
    'tirunelveli' => ['name' => 'Tirunelveli', 'state' => 'Tamil Nadu'],
    'malegaon' => ['name' => 'Malegaon', 'state' => 'Maharashtra'],
    'gaya' => ['name' => 'Gaya', 'state' => 'Bihar'],
    'jalgaon' => ['name' => 'Jalgaon', 'state' => 'Maharashtra'],
    'udaipur' => ['name' => 'Udaipur', 'state' => 'Rajasthan'],
    'maheshtala' => ['name' => 'Maheshtala', 'state' => 'West Bengal']
];

// Redirect to main WordPress development service page if city not found
if (!array_key_exists($citySlug, $supportedCities)) {
    header("Location: /wordpress-development-service");
    exit();
}

// Get city data
$cityData = $supportedCities[$citySlug];
$fullCityName = $cityData['name'];
$stateName = $cityData['state'];

// Dynamic SEO variables for this city page
$page_title = "Professional WordPress Website Design Services in {$fullCityName} | ThiyagiDigital";
$page_description = "Custom WordPress website design services in {$fullCityName}. We build responsive, SEO-optimized WordPress websites for businesses in {$stateName}.";
$page_keywords = "WordPress design {$fullCityName}, WordPress development {$fullCityName}, custom WordPress themes {$fullCityName}, WordPress website design {$stateName}";
$canonical_url = "https://www.thiyagidigital.com/wordpress-development-service/{$citySlug}";

// Include header
include 'header.php';
?>

<!-- Start of breadcrumb section -->
<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="bi-breadcrumbs-content headline ul-li text-center">
            <h1 style="color: white"><b>Best WordPress Website Design Services in <?php echo $fullCityName; ?></b></h1><br>
            <ul>
                <li><a href="/#">Home</a></li>
                <li>Services</li>
                <li style="color: white">WordPress Development in <?php echo $fullCityName; ?></li>
            </ul>
        </div>
    </div>
</section>	
<!-- End of breadcrumb section -->

<!-- Start of Service Details section -->
<section id="bi-service-details" class="bi-service-details-section inner-page-padding">
    <div class="container">
        <div class="bi-service-details-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bi-service-details-text-area">
                        <div class="bi-service-details-img">
                            <img src="/assets/img/service/serd1.jpg" alt="WordPress Website Design Services in <?php echo $fullCityName; ?>">
                        </div>
                        <div class="bi-service-details-text headline pera-content">
                            <h3>WordPress Website Design in <?php echo $fullCityName; ?></h3>

                            <p>At ThiyagiDigital, we specialize in creating stunning, functional WordPress websites for businesses in <?php echo $fullCityName; ?>. Our <?php echo $fullCityName; ?>-based WordPress development team combines technical expertise with local market understanding to deliver websites that not only look amazing but also drive real business results in <?php echo $stateName; ?>'s competitive digital landscape.</p>

                            <p>Our WordPress design services in <?php echo $fullCityName; ?> focus on creating custom themes, responsive layouts, and user-friendly interfaces that engage visitors and convert them into customers. We understand the unique business needs of <?php echo $fullCityName; ?> companies and tailor our WordPress solutions to help you establish a strong online presence in the <?php echo $stateName; ?> market.</p>

                            <p>From simple business websites to complex e-commerce stores, our WordPress development in <?php echo $fullCityName; ?> covers all aspects of modern web design. We prioritize performance, security, and SEO optimization to ensure your WordPress website ranks well in local <?php echo $fullCityName; ?> searches while providing an exceptional user experience.</p>

                            <h4>"Powering <?php echo $fullCityName; ?> Businesses with Professional WordPress Solutions"</h4>

                            <p>Whether you're a startup in <?php echo $fullCityName; ?> looking for your first WordPress website or an established business needing a modern redesign, our WordPress development services are designed to scale with your growth. We incorporate the latest WordPress features, plugins, and best practices specifically beneficial for <?php echo $fullCityName; ?> businesses looking to dominate their local market.</p>

                            <p>Partner with ThiyagiDigital for WordPress website design in <?php echo $fullCityName; ?> that combines cutting-edge technology with local market insights. Let's build a WordPress website that becomes your most powerful digital asset in the <?php echo $stateName; ?> business landscape.</p>

                            <h4>Frequently Asked Questions About WordPress Development in <?php echo $fullCityName; ?></h4>
                            <div class="bi-faq-content-area">
                                <div class="accordion" id="accordionExample_31">
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading10">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                                                <span>Why choose WordPress for my <?php echo $fullCityName; ?> business website?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse10" class="accordion-collapse collapse show" aria-labelledby="heading10" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                WordPress is perfect for <?php echo $fullCityName; ?> businesses because it's user-friendly, SEO-friendly, and highly customizable. It powers over 40% of websites globally and offers excellent local SEO benefits for <?php echo $stateName; ?> market targeting.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading12">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                                <span>Do you provide custom WordPress theme development for <?php echo $fullCityName; ?> businesses?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                Yes, we specialize in custom WordPress theme development tailored specifically for <?php echo $fullCityName; ?> businesses. Our themes are designed to reflect your brand identity while appealing to the local <?php echo $stateName; ?> market.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading13">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                                <span>How long does WordPress website development take in <?php echo $fullCityName; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                Typical WordPress development projects in <?php echo $fullCityName; ?> take 2-6 weeks depending on complexity and content readiness. We work efficiently to launch your website quickly while maintaining quality standards.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading14">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                                <span>Do you provide WordPress maintenance for <?php echo $fullCityName; ?> websites?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                Yes, we offer comprehensive WordPress maintenance services for <?php echo $fullCityName; ?> businesses including security updates, performance optimization, regular backups, and ongoing technical support to keep your website running smoothly.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bi-single-sidebar">
                        <div class="container">
                            <?php include 'sideform.php';?>
                            <?php include 'mainservice-sidebar.php';?>
                            <?php include 'callservice-sidebar.php';?>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Service Details section -->
<?php include 'testmonial2.php';?>
<?php include 'client-logo.php';?>
<?php include 'project-count.php';?>
<?php include 'certify-partner.php';?>
<?php include 'footer.php';?>