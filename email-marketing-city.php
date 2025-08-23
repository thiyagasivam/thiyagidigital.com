<?php
// Get city name from URL and sanitize it
$citySlug = isset($_GET['city']) ? strtolower(trim($_GET['city'])) : '';
$cityName = ucwords(str_replace('-', ' ', $citySlug));

// List of supported cities (same as your other services)
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
    'andimadam' => ['name' => 'Andimadam', 'state' => 'Tamil Nadu'],
    'sendurai' => ['name' => 'Sendurai', 'state' => 'Tamil Nadu'],
    'udayarpalayam' => ['name' => 'Udayarpalayam', 'state' => 'Tamil Nadu'],
    'thirukkalukundram' => ['name' => 'Thirukkalukundram', 'state' => 'Tamil Nadu'],
    'thirupporur' => ['name' => 'Thirupporur', 'state' => 'Tamil Nadu'],
    'chevyur' => ['name' => 'Chevyur', 'state' => 'Tamil Nadu'],
    'pallavaram' => ['name' => 'Pallavaram', 'state' => 'Tamil Nadu'],
    'vandalur' => ['name' => 'Vandalur', 'state' => 'Tamil Nadu'],
    'ambattur' => ['name' => 'Ambattur', 'state' => 'Tamil Nadu'],
    'aminjikarai' => ['name' => 'Aminjikarai', 'state' => 'Tamil Nadu'],
    'ayanavaram' => ['name' => 'Ayanavaram', 'state' => 'Tamil Nadu'],
    'egmore' => ['name' => 'Egmore', 'state' => 'Tamil Nadu'],
    'maduravoyal' => ['name' => 'Maduravoyal', 'state' => 'Tamil Nadu'],
    'mambalam' => ['name' => 'Mambalam', 'state' => 'Tamil Nadu'],
    'madhavaram' => ['name' => 'Madhavaram', 'state' => 'Tamil Nadu'],
    'perambur' => ['name' => 'Perambur', 'state' => 'Tamil Nadu'],
    'purasawalkam' => ['name' => 'Purasawalkam', 'state' => 'Tamil Nadu'],
    'thiruvottiyur' => ['name' => 'Thiruvottiyur', 'state' => 'Tamil Nadu'],
    'tondiarpet' => ['name' => 'Tondiarpet', 'state' => 'Tamil Nadu'],
    'alandur' => ['name' => 'Alandur', 'state' => 'Tamil Nadu'],
    'guindy' => ['name' => 'Guindy', 'state' => 'Tamil Nadu'],
    'mylapore' => ['name' => 'Mylapore', 'state' => 'Tamil Nadu'],
    'sholinganallur' => ['name' => 'Sholinganallur', 'state' => 'Tamil Nadu'],
    'velachery' => ['name' => 'Velachery', 'state' => 'Tamil Nadu'],
    'annur' => ['name' => 'Annur', 'state' => 'Tamil Nadu'],
    'coimbatore-north' => ['name' => 'Coimbatore North', 'state' => 'Tamil Nadu'],
    'coimbatore-south' => ['name' => 'Coimbatore South', 'state' => 'Tamil Nadu'],
    'madukkarai' => ['name' => 'Madukkarai', 'state' => 'Tamil Nadu'],
    'perur' => ['name' => 'Perur', 'state' => 'Tamil Nadu'],
    'anaimalai' => ['name' => 'Anaimalai', 'state' => 'Tamil Nadu'],
    'kinathukadavu' => ['name' => 'Kinathukadavu', 'state' => 'Tamil Nadu'],
    'bhuvanagiri' => ['name' => 'Bhuvanagiri', 'state' => 'Tamil Nadu'],
    'kattumannarkoil' => ['name' => 'Kattumannarkoil', 'state' => 'Tamil Nadu'],
    'srimushnam' => ['name' => 'Srimushnam', 'state' => 'Tamil Nadu'],
    'kurinjipadi' => ['name' => 'Kurinjipadi', 'state' => 'Tamil Nadu'],
    'veppur' => ['name' => 'Veppur', 'state' => 'Tamil Nadu'],
    'karimangalam' => ['name' => 'Karimangalam', 'state' => 'Tamil Nadu'],
    'nallampalli' => ['name' => 'Nallampalli', 'state' => 'Tamil Nadu'],
    'palacode' => ['name' => 'Palacode', 'state' => 'Tamil Nadu'],
    'pennagaram' => ['name' => 'Pennagaram', 'state' => 'Tamil Nadu'],
    'pappireddipatti' => ['name' => 'Pappireddipatti', 'state' => 'Tamil Nadu'],
    'athoor' => ['name' => 'Athoor', 'state' => 'Tamil Nadu'],
    'dindigul-east' => ['name' => 'Dindigul East', 'state' => 'Tamil Nadu'],
    'dindigul-west' => ['name' => 'Dindigul West', 'state' => 'Tamil Nadu'],
    'natham' => ['name' => 'Natham', 'state' => 'Tamil Nadu'],
    'nilakottai' => ['name' => 'Nilakottai', 'state' => 'Tamil Nadu'],
    'gujiliamparai' => ['name' => 'Gujiliamparai', 'state' => 'Tamil Nadu'],
    'vedasandur' => ['name' => 'Vedasandur', 'state' => 'Tamil Nadu'],
    'kodumudi' => ['name' => 'Kodumudi', 'state' => 'Tamil Nadu'],
    'modakkurichi' => ['name' => 'Modakkurichi', 'state' => 'Tamil Nadu'],
    'anthiyur' => ['name' => 'Anthiyur', 'state' => 'Tamil Nadu'],
    'nambiyur' => ['name' => 'Nambiyur', 'state' => 'Tamil Nadu'],
    'thalavadi' => ['name' => 'Thalavadi', 'state' => 'Tamil Nadu'],
    'chinnasalem' => ['name' => 'Chinnasalem', 'state' => 'Tamil Nadu'],
    'kalvarayan-hills' => ['name' => 'Kalvarayan Hills', 'state' => 'Tamil Nadu'],
    'sankarapuram' => ['name' => 'Sankarapuram', 'state' => 'Tamil Nadu'],
    'tirukovilur' => ['name' => 'Tirukovilur', 'state' => 'Tamil Nadu'],
    'ulundurpet' => ['name' => 'Ulundurpet', 'state' => 'Tamil Nadu'],
    'uthiramerur' => ['name' => 'Uthiramerur', 'state' => 'Tamil Nadu'],
    'walajabad' => ['name' => 'Walajabad', 'state' => 'Tamil Nadu'],
    'agastheeswaram' => ['name' => 'Agastheeswaram', 'state' => 'Tamil Nadu'],
    'thovalai' => ['name' => 'Thovalai', 'state' => 'Tamil Nadu'],
    'kalkulam' => ['name' => 'Kalkulam', 'state' => 'Tamil Nadu'],
    'killiyoor' => ['name' => 'Killiyoor', 'state' => 'Tamil Nadu'],
    'thiruvattar' => ['name' => 'Thiruvattar', 'state' => 'Tamil Nadu'],
    'vilavancode' => ['name' => 'Vilavancode', 'state' => 'Tamil Nadu'],
    'aravakurichi' => ['name' => 'Aravakurichi', 'state' => 'Tamil Nadu'],
    'krishnarayapuram' => ['name' => 'Krishnarayapuram', 'state' => 'Tamil Nadu'],
    'kadavur' => ['name' => 'Kadavur', 'state' => 'Tamil Nadu'],
    'anchetty' => ['name' => 'Anchetty', 'state' => 'Tamil Nadu'],
    'denkanikottai' => ['name' => 'Denkanikottai', 'state' => 'Tamil Nadu'],
    'shoolagiri' => ['name' => 'Shoolagiri', 'state' => 'Tamil Nadu'],
    'bargur' => ['name' => 'Bargur', 'state' => 'Tamil Nadu'],
    'pochampalli' => ['name' => 'Pochampalli', 'state' => 'Tamil Nadu'],
    'uthangarai' => ['name' => 'Uthangarai', 'state' => 'Tamil Nadu'],
    'madurai-north' => ['name' => 'Madurai North', 'state' => 'Tamil Nadu'],
    'madurai-west' => ['name' => 'Madurai West', 'state' => 'Tamil Nadu'],
    'madurai-east' => ['name' => 'Madurai East', 'state' => 'Tamil Nadu'],
    'madurai-south' => ['name' => 'Madurai South', 'state' => 'Tamil Nadu'],
    'kalligudi' => ['name' => 'Kalligudi', 'state' => 'Tamil Nadu'],
    'thirupparankundram' => ['name' => 'Thirupparankundram', 'state' => 'Tamil Nadu'],
    'peraiyur' => ['name' => 'Peraiyur', 'state' => 'Tamil Nadu'],
    'muthupettai' => ['name' => 'Muthupettai', 'state' => 'Tamil Nadu'],
    'needamangalam' => ['name' => 'Needamangalam', 'state' => 'Tamil Nadu'],
    'kudavasal' => ['name' => 'Kudavasal', 'state' => 'Tamil Nadu'],
    'nannilam' => ['name' => 'Nannilam', 'state' => 'Tamil Nadu'],
    'valangaiman' => ['name' => 'Valangaiman', 'state' => 'Tamil Nadu'],
    'papanasam' => ['name' => 'Papanasam', 'state' => 'Tamil Nadu'],
    'thiruvidaimarudur' => ['name' => 'Thiruvidaimarudur', 'state' => 'Tamil Nadu'],
    'peravurani' => ['name' => 'Peravurani', 'state' => 'Tamil Nadu'],
    'orathanadu' => ['name' => 'Orathanadu', 'state' => 'Tamil Nadu'],
    'budalur' => ['name' => 'Budalur', 'state' => 'Tamil Nadu'],
    'aundipatti' => ['name' => 'Aundipatti', 'state' => 'Tamil Nadu'],
    'thottiyam' => ['name' => 'Thottiyam', 'state' => 'Tamil Nadu'],
    'marungapuri' => ['name' => 'Marungapuri', 'state' => 'Tamil Nadu'],
    'srirangam' => ['name' => 'Srirangam', 'state' => 'Tamil Nadu'],
    'tiruchirappalli-west' => ['name' => 'Tiruchirappalli West', 'state' => 'Tamil Nadu'],
    'tiruverumbur' => ['name' => 'Tiruverumbur', 'state' => 'Tamil Nadu'],
    'tiruchirappalli-east' => ['name' => 'Tiruchirappalli East', 'state' => 'Tamil Nadu'],
    'natrampalli' => ['name' => 'Natrampalli', 'state' => 'Tamil Nadu'],
    'kuthalam' => ['name' => 'Kuthalam', 'state' => 'Tamil Nadu'],
    'tharangambadi' => ['name' => 'Tharangambadi', 'state' => 'Tamil Nadu'],
    'kilvelur' => ['name' => 'Kilvelur', 'state' => 'Tamil Nadu'],
    'thirukkuvalai' => ['name' => 'Thirukkuvalai', 'state' => 'Tamil Nadu'],
    'kolli-hills' => ['name' => 'Kolli Hills', 'state' => 'Tamil Nadu'],
    'sendamangalam' => ['name' => 'Sendamangalam', 'state' => 'Tamil Nadu'],
    'kumarapalayam' => ['name' => 'Kumarapalayam', 'state' => 'Tamil Nadu'],
    'paramathi-velur' => ['name' => 'Paramathi Velur', 'state' => 'Tamil Nadu'],
    'coonoor' => ['name' => 'Coonoor', 'state' => 'Tamil Nadu'],
    'kotagiri' => ['name' => 'Kotagiri', 'state' => 'Tamil Nadu'],
    'pandalur' => ['name' => 'Pandalur', 'state' => 'Tamil Nadu'],
    'kundah' => ['name' => 'Kundah', 'state' => 'Tamil Nadu'],
    'alathur' => ['name' => 'Alathur', 'state' => 'Tamil Nadu'],
    'kunnam' => ['name' => 'Kunnam', 'state' => 'Tamil Nadu'],
    'veppanthattai' => ['name' => 'Veppanthattai', 'state' => 'Tamil Nadu'],
    'avudayarkoil' => ['name' => 'Avudayarkoil', 'state' => 'Tamil Nadu'],
    'manamelkudi' => ['name' => 'Manamelkudi', 'state' => 'Tamil Nadu'],
    'illuppur' => ['name' => 'Illuppur', 'state' => 'Tamil Nadu'],
    'kulathur' => ['name' => 'Kulathur', 'state' => 'Tamil Nadu'],
    'ponnamaravathy' => ['name' => 'Ponnamaravathy', 'state' => 'Tamil Nadu'],
    'viralimalai' => ['name' => 'Viralimalai', 'state' => 'Tamil Nadu'],
    'alangudi' => ['name' => 'Alangudi', 'state' => 'Tamil Nadu'],
    'gandharvakottai' => ['name' => 'Gandharvakottai', 'state' => 'Tamil Nadu'],
    'karambakudi' => ['name' => 'Karambakudi', 'state' => 'Tamil Nadu'],
    'thirumayam' => ['name' => 'Thirumayam', 'state' => 'Tamil Nadu'],
    'kadaladi' => ['name' => 'Kadaladi', 'state' => 'Tamil Nadu'],
    'kamuthi' => ['name' => 'Kamuthi', 'state' => 'Tamil Nadu'],
    'mudukulathur' => ['name' => 'Mudukulathur', 'state' => 'Tamil Nadu'],
    'keelakarai' => ['name' => 'Keelakarai', 'state' => 'Tamil Nadu'],
    'nemili' => ['name' => 'Nemili', 'state' => 'Tamil Nadu'],
    'kalavai' => ['name' => 'Kalavai', 'state' => 'Tamil Nadu'],
    'walajah' => ['name' => 'Walajah', 'state' => 'Tamil Nadu'],
    'gangavalli' => ['name' => 'Gangavalli', 'state' => 'Tamil Nadu'],
    'pethanaickenpalayam' => ['name' => 'Pethanaickenpalayam', 'state' => 'Tamil Nadu'],
    'thalaivasal' => ['name' => 'Thalaivasal', 'state' => 'Tamil Nadu'],
    'kadayampatti' => ['name' => 'Kadayampatti', 'state' => 'Tamil Nadu'],
    'omalur' => ['name' => 'Omalur', 'state' => 'Tamil Nadu'],
    'salem-south' => ['name' => 'Salem South', 'state' => 'Tamil Nadu'],
    'salem-west' => ['name' => 'Salem West', 'state' => 'Tamil Nadu'],
    'valapady' => ['name' => 'Valapady', 'state' => 'Tamil Nadu'],
    'yercaud' => ['name' => 'Yercaud', 'state' => 'Tamil Nadu'],
    'sankari' => ['name' => 'Sankari', 'state' => 'Tamil Nadu'],
    'singampunari' => ['name' => 'Singampunari', 'state' => 'Tamil Nadu'],
    'ilayangudi' => ['name' => 'Ilayangudi', 'state' => 'Tamil Nadu'],
    'kalaiyarkoil' => ['name' => 'Kalaiyarkoil', 'state' => 'Tamil Nadu'],
    'thiruppuvanam' => ['name' => 'Thiruppuvanam', 'state' => 'Tamil Nadu'],
    'sivagiri' => ['name' => 'Sivagiri', 'state' => 'Tamil Nadu'],
    'thiruvengadam' => ['name' => 'Thiruvengadam', 'state' => 'Tamil Nadu'],
    'alangulam' => ['name' => 'Alangulam', 'state' => 'Tamil Nadu'],
    'shenkottai' => ['name' => 'Shenkottai', 'state' => 'Tamil Nadu'],
    'v.k.-pudur' => ['name' => 'V.K. Pudur', 'state' => 'Tamil Nadu'],
    'ettayapuram' => ['name' => 'Ettayapuram', 'state' => 'Tamil Nadu'],
    'kayathar' => ['name' => 'Kayathar', 'state' => 'Tamil Nadu'],
    'ottapidaram' => ['name' => 'Ottapidaram', 'state' => 'Tamil Nadu'],
    'vilathikulam' => ['name' => 'Vilathikulam', 'state' => 'Tamil Nadu'],
    'srivaikuntam' => ['name' => 'Srivaikuntam', 'state' => 'Tamil Nadu'],
    'eral' => ['name' => 'Eral', 'state' => 'Tamil Nadu'],
    'sattankulam' => ['name' => 'Sattankulam', 'state' => 'Tamil Nadu'],
    'cheranmahadevi' => ['name' => 'Cheranmahadevi', 'state' => 'Tamil Nadu'],
    'nanguneri' => ['name' => 'Nanguneri', 'state' => 'Tamil Nadu'],
    'radhapuram' => ['name' => 'Radhapuram', 'state' => 'Tamil Nadu'],
    'thisayanvilai' => ['name' => 'Thisayanvilai', 'state' => 'Tamil Nadu'],
    'manur' => ['name' => 'Manur', 'state' => 'Tamil Nadu'],
    'palayamkottai' => ['name' => 'Palayamkottai', 'state' => 'Tamil Nadu'],
    'kangayam' => ['name' => 'Kangayam', 'state' => 'Tamil Nadu'],
    'tiruppur-north' => ['name' => 'Tiruppur North', 'state' => 'Tamil Nadu'],
    'tiruppur-south' => ['name' => 'Tiruppur South', 'state' => 'Tamil Nadu'],
    'uthukuli' => ['name' => 'Uthukuli', 'state' => 'Tamil Nadu'],
    'madathukulam' => ['name' => 'Madathukulam', 'state' => 'Tamil Nadu'],
    'udumalpet' => ['name' => 'Udumalpet', 'state' => 'Tamil Nadu'],
    'gummidipoondi' => ['name' => 'Gummidipoondi', 'state' => 'Tamil Nadu'],
    'pallipattu' => ['name' => 'Pallipattu', 'state' => 'Tamil Nadu'],
    'r.k.-pettai' => ['name' => 'R.K. Pettai', 'state' => 'Tamil Nadu'],
    'poonamallee' => ['name' => 'Poonamallee', 'state' => 'Tamil Nadu'],
    'uthukottai' => ['name' => 'Uthukottai', 'state' => 'Tamil Nadu'],
    'jamunamarathur' => ['name' => 'Jamunamarathur', 'state' => 'Tamil Nadu'],
    'kalasapakkam' => ['name' => 'Kalasapakkam', 'state' => 'Tamil Nadu'],
    'chetpet' => ['name' => 'Chetpet', 'state' => 'Tamil Nadu'],
    'cheyyar' => ['name' => 'Cheyyar', 'state' => 'Tamil Nadu'],
    'vandavasi' => ['name' => 'Vandavasi', 'state' => 'Tamil Nadu'],
    'vembakkam' => ['name' => 'Vembakkam', 'state' => 'Tamil Nadu'],
    'kilpennathur' => ['name' => 'Kilpennathur', 'state' => 'Tamil Nadu'],
    'thandrampet' => ['name' => 'Thandrampet', 'state' => 'Tamil Nadu'],
    'k.v.-kuppam' => ['name' => 'K.V. Kuppam', 'state' => 'Tamil Nadu'],
    'anaicut' => ['name' => 'Anaicut', 'state' => 'Tamil Nadu'],
    'katpadi' => ['name' => 'Katpadi', 'state' => 'Tamil Nadu'],
    'gingee' => ['name' => 'Gingee', 'state' => 'Tamil Nadu'],
    'marakkanam' => ['name' => 'Marakkanam', 'state' => 'Tamil Nadu'],
    'melmalayanur' => ['name' => 'Melmalayanur', 'state' => 'Tamil Nadu'],
    'kandachipuram' => ['name' => 'Kandachipuram', 'state' => 'Tamil Nadu'],
    'tiruvennainallur' => ['name' => 'Tiruvennainallur', 'state' => 'Tamil Nadu'],
    'vanur' => ['name' => 'Vanur', 'state' => 'Tamil Nadu'],
    'vikravandi' => ['name' => 'Vikravandi', 'state' => 'Tamil Nadu'],
    'kariyapatti' => ['name' => 'Kariyapatti', 'state' => 'Tamil Nadu'],
    'tiruchuli' => ['name' => 'Tiruchuli', 'state' => 'Tamil Nadu'],
    'vembakkottai' => ['name' => 'Vembakkottai', 'state' => 'Tamil Nadu'],
    'watrap' => ['name' => 'Watrap', 'state' => 'Tamil Nadu']
];


// Redirect to main email marketing page if city not found
if (!array_key_exists($citySlug, $supportedCities)) {
    header("Location: /email-marketing-service.php");
    exit();
}

// Get city data
$cityData = $supportedCities[$citySlug];
$fullCityName = $cityData['name'];
$stateName = $cityData['state'];

// Dynamic SEO variables for this city page
$page_title = "Professional Email Marketing Services in {$fullCityName} | ThiyagiDigital";
$page_description = "Targeted email marketing solutions for {$fullCityName} businesses. Drive engagement and conversions with our localized email campaigns in {$stateName}.";
$page_keywords = "email marketing {$fullCityName}, email campaigns {$fullCityName}, email automation {$fullCityName}";
$canonical_url = "https://www.thiyagidigital.com/email-marketing-service/{$citySlug}";
// BreadcrumbList + FAQPage JSON-LD via @graph
$serviceName = 'Email Marketing';
$serviceUrl = 'https://www.thiyagidigital.com/email-marketing.php';
$breadcrumbSchema = [
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => 'https://www.thiyagidigital.com/'
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => $serviceName,
            'item' => $serviceUrl
        ],
        [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $serviceName . ' in ' . $fullCityName,
            'item' => $canonical_url
        ]
    ]
];
$faqSchema = [
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => "How do you localize email content for {$fullCityName} audiences?",
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'We tailor subject lines, content, and timing using local references and audience behavior data.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => "What platforms work best for {$fullCityName} businesses?",
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'We use Mailchimp, Sendinblue, and HubSpot with segmentation and automation optimized for regional deliverability.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => "Can you automate follow-ups for {$fullCityName} leads?",
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes, we build nurture sequences and behavior-based workflows tailored to local audiences.'
            ]
        ]
    ]
];
$page_schema = [
    '@context' => 'https://schema.org',
    '@graph' => [ $breadcrumbSchema, $faqSchema ]
];
?>
<?php include 'header.php';?>
	
<!-- Start of breadcrumb section -->
<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="/assets/img/bg/bread-bg.jpg">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="bi-breadcrumbs-content headline ul-li text-center">
            <h2 style="color: white"><b>Email Marketing Services in <?php echo $fullCityName; ?></b></h2><br>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">Services</a></li>
                <li style="color: white">Email Marketing in <?php echo $fullCityName; ?></li>
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
                            <img src="/assets/img/service/serd1.jpg" alt="Email Marketing Services in <?php echo $fullCityName; ?>">
                        </div>
                        <div class="bi-service-details-text headline pera-content">
                            <h3>Email Marketing in <?php echo $fullCityName; ?></h3>

                            <p>In <?php echo $fullCityName; ?>'s competitive business environment, email marketing remains one of the most effective ways to reach and engage your target audience. Our localized email marketing services help <?php echo $fullCityName; ?> businesses create campaigns that resonate with local customers while driving measurable results.</p>

                            <p>Our <?php echo $fullCityName; ?>-focused email strategies combine global best practices with local market insights. We understand the unique preferences and behaviors of <?php echo $stateName; ?> audiences, allowing us to craft email campaigns that achieve higher open rates, click-through rates, and conversions for <?php echo $fullCityName; ?> businesses.</p>

                            <p>For <?php echo $fullCityName; ?> companies, we create email content that speaks directly to your local customers. Whether it's incorporating regional references, local event tie-ins, or vernacular language options, we ensure your emails feel personal and relevant to <?php echo $fullCityName; ?> recipients.</p>

                            <h4>"Driving Results Through Targeted Email Campaigns in <?php echo $fullCityName; ?>"</h4>

                            <p>We go beyond basic email blasts. Our <?php echo $fullCityName; ?> email marketing services include advanced segmentation based on location-specific data, automated nurture sequences for local leads, and performance tracking tailored to <?php echo $stateName; ?> market benchmarks. We help you build lasting relationships with your <?php echo $fullCityName; ?> customer base through strategic email communication.</p>

                            <p>Whether you're a <?php echo $fullCityName; ?>-based retailer looking to boost local sales or a service provider aiming to nurture <?php echo $stateName; ?> leads, our email marketing experts have the local knowledge and technical expertise to deliver campaigns that work. Partner with us to transform your email marketing into a powerful growth channel for your <?php echo $fullCityName; ?> business.</p>

                
                            <div class="bi-faq-content-area">
                                <div class="accordion" id="accordionExample_31">
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading10">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                                                <span>How do you localize email content for <?php echo $fullCityName; ?> audiences?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse10" class="accordion-collapse collapse show" aria-labelledby="heading10" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                We incorporate <?php echo $fullCityName; ?>-specific references, local event tie-ins, and regional language options where appropriate. Our subject lines and content are optimized for what resonates with <?php echo $stateName; ?> audiences based on performance data.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading12">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                                <span>What email marketing platforms work best in <?php echo $fullCityName; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                For <?php echo $fullCityName; ?> businesses, we recommend and work with platforms like Mailchimp, Sendinblue, and HubSpot that offer excellent deliverability in <?php echo $stateName; ?>, along with features for local audience segmentation and regional performance tracking.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading13">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                                <span>Can you help build email lists for <?php echo $fullCityName; ?> businesses?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                Yes, we implement ethical list-building strategies specifically for <?php echo $fullCityName; ?> audiences, including localized lead magnets, event-based signups, and permission-based collection methods compliant with <?php echo $stateName; ?> data protection norms.
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
                            <div class="bi-single-sidebar-item">
                                <div class="bi-sidebar-contact-widget headline">
                                    <h3 class="widget-title">Serving <?php echo $fullCityName; ?> Area</h3>
                                    <p>We provide specialized email marketing services for businesses in <?php echo $fullCityName; ?>, <?php echo $stateName; ?>.</p>
                                </div>
                            </div>
                            <div class="bi-single-sidebar-item">
                                <div class="bi-sidebar-contact-widget headline">
                                    <h3 class="widget-title">Quick FAQs: Email in <?php echo $fullCityName; ?></h3>
                                    <div class="bi-faq-content-area">
                                        <div class="accordion" id="accordionSidebarEMAIL">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="emfaq1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#emfaq1c" aria-expanded="false" aria-controls="emfaq1c">
                                                        What open rates should I expect?
                                                    </button>
                                                </h2>
                                                <div id="emfaq1c" class="accordion-collapse collapse" aria-labelledby="emfaq1" data-bs-parent="#accordionSidebarEMAIL">
                                                    <div class="accordion-body">
                                                        Benchmarks vary by industry; we optimize subject lines and timing for <?php echo $fullCityName; ?> to lift engagement.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="emfaq2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#emfaq2c" aria-expanded="false" aria-controls="emfaq2c">
                                                        Can you automate follow-ups?
                                                    </button>
                                                </h2>
                                                <div id="emfaq2c" class="accordion-collapse collapse" aria-labelledby="emfaq2" data-bs-parent="#accordionSidebarEMAIL">
                                                    <div class="accordion-body">
                                                        Yes—nurture sequences and behavior-based automation tailored to <?php echo $fullCityName; ?> audiences.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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