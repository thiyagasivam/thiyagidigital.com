<?php
// City-specific SMS Marketing page
$city = isset($_GET['city']) ? ucwords(str_replace('-', ' ', $_GET['city'])) : 'Chennai';
$city_lower = strtolower(str_replace(' ', '-', $city));

// Supported cities array (comprehensive list)
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
    'watrap' => ['name' => 'Watrap', 'state' => 'Tamil Nadu'],
    
    // North America - United States Cities
    // Major Metropolitan Areas
    'new-york' => ['name' => 'New York', 'state' => 'New York'],
    'los-angeles' => ['name' => 'Los Angeles', 'state' => 'California'],
    'chicago' => ['name' => 'Chicago', 'state' => 'Illinois'],
    'houston' => ['name' => 'Houston', 'state' => 'Texas'],
    'phoenix' => ['name' => 'Phoenix', 'state' => 'Arizona'],
    'philadelphia' => ['name' => 'Philadelphia', 'state' => 'Pennsylvania'],
    'san-antonio' => ['name' => 'San Antonio', 'state' => 'Texas'],
    'san-diego' => ['name' => 'San Diego', 'state' => 'California'],
    'dallas' => ['name' => 'Dallas', 'state' => 'Texas'],
    'austin' => ['name' => 'Austin', 'state' => 'Texas'],
    'san-jose' => ['name' => 'San Jose', 'state' => 'California'],
    'fort-worth' => ['name' => 'Fort Worth', 'state' => 'Texas'],
    'jacksonville' => ['name' => 'Jacksonville', 'state' => 'Florida'],
    'charlotte' => ['name' => 'Charlotte', 'state' => 'North Carolina'],
    'san-francisco' => ['name' => 'San Francisco', 'state' => 'California'],
    'indianapolis' => ['name' => 'Indianapolis', 'state' => 'Indiana'],
    'seattle' => ['name' => 'Seattle', 'state' => 'Washington'],
    'denver' => ['name' => 'Denver', 'state' => 'Colorado'],
    'boston' => ['name' => 'Boston', 'state' => 'Massachusetts'],
    'el-paso' => ['name' => 'El Paso', 'state' => 'Texas'],
    'detroit' => ['name' => 'Detroit', 'state' => 'Michigan'],
    'nashville' => ['name' => 'Nashville', 'state' => 'Tennessee'],
    'portland' => ['name' => 'Portland', 'state' => 'Oregon'],
    'memphis' => ['name' => 'Memphis', 'state' => 'Tennessee'],
    'oklahoma-city' => ['name' => 'Oklahoma City', 'state' => 'Oklahoma'],
    'las-vegas' => ['name' => 'Las Vegas', 'state' => 'Nevada'],
    'louisville' => ['name' => 'Louisville', 'state' => 'Kentucky'],
    'baltimore' => ['name' => 'Baltimore', 'state' => 'Maryland'],
    'milwaukee' => ['name' => 'Milwaukee', 'state' => 'Wisconsin'],
    'albuquerque' => ['name' => 'Albuquerque', 'state' => 'New Mexico'],
    'tucson' => ['name' => 'Tucson', 'state' => 'Arizona'],
    'fresno' => ['name' => 'Fresno', 'state' => 'California'],
    'sacramento' => ['name' => 'Sacramento', 'state' => 'California'],
    'kansas-city' => ['name' => 'Kansas City', 'state' => 'Missouri'],
    'mesa' => ['name' => 'Mesa', 'state' => 'Arizona'],
    'atlanta' => ['name' => 'Atlanta', 'state' => 'Georgia'],
    'omaha' => ['name' => 'Omaha', 'state' => 'Nebraska'],
    'raleigh' => ['name' => 'Raleigh', 'state' => 'North Carolina'],
    'miami' => ['name' => 'Miami', 'state' => 'Florida'],
    'long-beach' => ['name' => 'Long Beach', 'state' => 'California'],
    'virginia-beach' => ['name' => 'Virginia Beach', 'state' => 'Virginia'],
    'oakland' => ['name' => 'Oakland', 'state' => 'California'],
    'minneapolis' => ['name' => 'Minneapolis', 'state' => 'Minnesota'],
    'tulsa' => ['name' => 'Tulsa', 'state' => 'Oklahoma'],
    'arlington' => ['name' => 'Arlington', 'state' => 'Texas'],
    'new-orleans' => ['name' => 'New Orleans', 'state' => 'Louisiana'],
    'wichita' => ['name' => 'Wichita', 'state' => 'Kansas'],
    'cleveland' => ['name' => 'Cleveland', 'state' => 'Ohio'],
    'tampa' => ['name' => 'Tampa', 'state' => 'Florida'],
    'bakersfield' => ['name' => 'Bakersfield', 'state' => 'California'],
    'aurora' => ['name' => 'Aurora', 'state' => 'Colorado'],
    'anaheim' => ['name' => 'Anaheim', 'state' => 'California'],
    'honolulu' => ['name' => 'Honolulu', 'state' => 'Hawaii'],
    'santa-ana' => ['name' => 'Santa Ana', 'state' => 'California'],
    'corpus-christi' => ['name' => 'Corpus Christi', 'state' => 'Texas'],
    'riverside' => ['name' => 'Riverside', 'state' => 'California'],
    'lexington' => ['name' => 'Lexington', 'state' => 'Kentucky'],
    'stockton' => ['name' => 'Stockton', 'state' => 'California'],
    'henderson' => ['name' => 'Henderson', 'state' => 'Nevada'],
    'saint-paul' => ['name' => 'Saint Paul', 'state' => 'Minnesota'],
    'st-louis' => ['name' => 'St. Louis', 'state' => 'Missouri'],
    'cincinnati' => ['name' => 'Cincinnati', 'state' => 'Ohio'],
    'pittsburgh' => ['name' => 'Pittsburgh', 'state' => 'Pennsylvania'],
    'greensboro' => ['name' => 'Greensboro', 'state' => 'North Carolina'],
    'anchorage' => ['name' => 'Anchorage', 'state' => 'Alaska'],
    'plano' => ['name' => 'Plano', 'state' => 'Texas'],
    'lincoln' => ['name' => 'Lincoln', 'state' => 'Nebraska'],
    'orlando' => ['name' => 'Orlando', 'state' => 'Florida'],
    'irvine' => ['name' => 'Irvine', 'state' => 'California'],
    'newark' => ['name' => 'Newark', 'state' => 'New Jersey'],
    'durham' => ['name' => 'Durham', 'state' => 'North Carolina'],
    'chula-vista' => ['name' => 'Chula Vista', 'state' => 'California'],
    'toledo' => ['name' => 'Toledo', 'state' => 'Ohio'],
    'fort-wayne' => ['name' => 'Fort Wayne', 'state' => 'Indiana'],
    'st-petersburg' => ['name' => 'St. Petersburg', 'state' => 'Florida'],
    'laredo' => ['name' => 'Laredo', 'state' => 'Texas'],
    'jersey-city' => ['name' => 'Jersey City', 'state' => 'New Jersey'],
    'chandler' => ['name' => 'Chandler', 'state' => 'Arizona'],
    'madison' => ['name' => 'Madison', 'state' => 'Wisconsin'],
    'lubbock' => ['name' => 'Lubbock', 'state' => 'Texas'],
    'buffalo' => ['name' => 'Buffalo', 'state' => 'New York'],
    'gilbert' => ['name' => 'Gilbert', 'state' => 'Arizona'],
    'glendale' => ['name' => 'Glendale', 'state' => 'Arizona'],
    'north-las-vegas' => ['name' => 'North Las Vegas', 'state' => 'Nevada'],
    'winston-salem' => ['name' => 'Winston-Salem', 'state' => 'North Carolina'],
    'chesapeake' => ['name' => 'Chesapeake', 'state' => 'Virginia'],
    'norfolk' => ['name' => 'Norfolk', 'state' => 'Virginia'],
    'fremont' => ['name' => 'Fremont', 'state' => 'California'],
    'garland' => ['name' => 'Garland', 'state' => 'Texas'],
    'irving' => ['name' => 'Irving', 'state' => 'Texas'],
    'hialeah' => ['name' => 'Hialeah', 'state' => 'Florida'],
    'richmond' => ['name' => 'Richmond', 'state' => 'Virginia'],
    'boise' => ['name' => 'Boise', 'state' => 'Idaho'],
    'spokane' => ['name' => 'Spokane', 'state' => 'Washington'],
    'baton-rouge' => ['name' => 'Baton Rouge', 'state' => 'Louisiana'],
    
    // Canada
    'toronto' => ['name' => 'Toronto', 'state' => 'Ontario'],
    'montreal' => ['name' => 'Montreal', 'state' => 'Quebec'],
    'vancouver' => ['name' => 'Vancouver', 'state' => 'British Columbia'],
    'calgary' => ['name' => 'Calgary', 'state' => 'Alberta'],
    'ottawa' => ['name' => 'Ottawa', 'state' => 'Ontario'],
    'edmonton' => ['name' => 'Edmonton', 'state' => 'Alberta'],
    'winnipeg' => ['name' => 'Winnipeg', 'state' => 'Manitoba'],
    'quebec-city' => ['name' => 'Quebec City', 'state' => 'Quebec'],
    'hamilton' => ['name' => 'Hamilton', 'state' => 'Ontario'],
    'halifax' => ['name' => 'Halifax', 'state' => 'Nova Scotia'],
    
    // Europe - United Kingdom
    'london' => ['name' => 'London', 'state' => 'England'],
    'manchester' => ['name' => 'Manchester', 'state' => 'England'],
    'birmingham' => ['name' => 'Birmingham', 'state' => 'England'],
    'glasgow' => ['name' => 'Glasgow', 'state' => 'Scotland'],
    'liverpool' => ['name' => 'Liverpool', 'state' => 'England'],
    'edinburgh' => ['name' => 'Edinburgh', 'state' => 'Scotland'],
    'bristol' => ['name' => 'Bristol', 'state' => 'England'],
    'cardiff' => ['name' => 'Cardiff', 'state' => 'Wales'],
    'leeds' => ['name' => 'Leeds', 'state' => 'England'],
    'belfast' => ['name' => 'Belfast', 'state' => 'Northern Ireland'],
    
    // Europe - Germany
    'berlin' => ['name' => 'Berlin', 'state' => 'Berlin'],
    'hamburg' => ['name' => 'Hamburg', 'state' => 'Hamburg'],
    'munich' => ['name' => 'Munich', 'state' => 'Bavaria'],
    'cologne' => ['name' => 'Cologne', 'state' => 'North Rhine-Westphalia'],
    'frankfurt' => ['name' => 'Frankfurt', 'state' => 'Hesse'],
    'stuttgart' => ['name' => 'Stuttgart', 'state' => 'Baden-WÃ¼rttemberg'],
    'dusseldorf' => ['name' => 'Dusseldorf', 'state' => 'North Rhine-Westphalia'],
    'dortmund' => ['name' => 'Dortmund', 'state' => 'North Rhine-Westphalia'],
    'essen' => ['name' => 'Essen', 'state' => 'North Rhine-Westphalia'],
    'leipzig' => ['name' => 'Leipzig', 'state' => 'Saxony'],
    
    // Europe - France
    'paris' => ['name' => 'Paris', 'state' => 'ÃŽle-de-France'],
    'marseille' => ['name' => 'Marseille', 'state' => 'Provence-Alpes-CÃ´te d\'Azur'],
    'lyon' => ['name' => 'Lyon', 'state' => 'Auvergne-RhÃ´ne-Alpes'],
    'toulouse' => ['name' => 'Toulouse', 'state' => 'Occitanie'],
    'nice' => ['name' => 'Nice', 'state' => 'Provence-Alpes-CÃ´te d\'Azur'],
    'nantes' => ['name' => 'Nantes', 'state' => 'Pays de la Loire'],
    'strasbourg' => ['name' => 'Strasbourg', 'state' => 'Grand Est'],
    'montpellier' => ['name' => 'Montpellier', 'state' => 'Occitanie'],
    'bordeaux' => ['name' => 'Bordeaux', 'state' => 'Nouvelle-Aquitaine'],
    'lille' => ['name' => 'Lille', 'state' => 'Hauts-de-France'],
    
    // Europe - Italy
    'rome' => ['name' => 'Rome', 'state' => 'Lazio'],
    'milan' => ['name' => 'Milan', 'state' => 'Lombardy'],
    'naples' => ['name' => 'Naples', 'state' => 'Campania'],
    'turin' => ['name' => 'Turin', 'state' => 'Piedmont'],
    'palermo' => ['name' => 'Palermo', 'state' => 'Sicily'],
    'genoa' => ['name' => 'Genoa', 'state' => 'Liguria'],
    'bologna' => ['name' => 'Bologna', 'state' => 'Emilia-Romagna'],
    'florence' => ['name' => 'Florence', 'state' => 'Tuscany'],
    'bari' => ['name' => 'Bari', 'state' => 'Apulia'],
    'catania' => ['name' => 'Catania', 'state' => 'Sicily'],
    
    // Europe - Spain
    'madrid' => ['name' => 'Madrid', 'state' => 'Community of Madrid'],
    'barcelona' => ['name' => 'Barcelona', 'state' => 'Catalonia'],
    'valencia' => ['name' => 'Valencia', 'state' => 'Valencia'],
    'seville' => ['name' => 'Seville', 'state' => 'Andalusia'],
    'zaragoza' => ['name' => 'Zaragoza', 'state' => 'Aragon'],
    'malaga' => ['name' => 'Malaga', 'state' => 'Andalusia'],
    'murcia' => ['name' => 'Murcia', 'state' => 'Region of Murcia'],
    'palma' => ['name' => 'Palma', 'state' => 'Balearic Islands'],
    'las-palmas' => ['name' => 'Las Palmas', 'state' => 'Canary Islands'],
    'bilbao' => ['name' => 'Bilbao', 'state' => 'Basque Country'],
    
    // Europe - Netherlands
    'amsterdam' => ['name' => 'Amsterdam', 'state' => 'North Holland'],
    'rotterdam' => ['name' => 'Rotterdam', 'state' => 'South Holland'],
    'the-hague' => ['name' => 'The Hague', 'state' => 'South Holland'],
    'utrecht' => ['name' => 'Utrecht', 'state' => 'Utrecht'],
    'eindhoven' => ['name' => 'Eindhoven', 'state' => 'North Brabant'],
    'tilburg' => ['name' => 'Tilburg', 'state' => 'North Brabant'],
    'groningen' => ['name' => 'Groningen', 'state' => 'Groningen'],
    'almere' => ['name' => 'Almere', 'state' => 'Flevoland'],
    'breda' => ['name' => 'Breda', 'state' => 'North Brabant'],
    'nijmegen' => ['name' => 'Nijmegen', 'state' => 'Gelderland'],
    
    // Europe - Sweden
    'stockholm' => ['name' => 'Stockholm', 'state' => 'Stockholm County'],
    'gothenburg' => ['name' => 'Gothenburg', 'state' => 'VÃ¤stra GÃ¶taland County'],
    'malmo' => ['name' => 'Malmo', 'state' => 'SkÃ¥ne County'],
    'uppsala' => ['name' => 'Uppsala', 'state' => 'Uppsala County'],
    'vasteras' => ['name' => 'Vasteras', 'state' => 'VÃ¤stmanland County'],
    'orebro' => ['name' => 'Orebro', 'state' => 'Ã–rebro County'],
    'linkoping' => ['name' => 'Linkoping', 'state' => 'Ã–stergÃ¶tland County'],
    'helsingborg' => ['name' => 'Helsingborg', 'state' => 'SkÃ¥ne County'],
    'jonkoping' => ['name' => 'Jonkoping', 'state' => 'JÃ¶nkÃ¶ping County'],
    'norrkoping' => ['name' => 'Norrkoping', 'state' => 'Ã–stergÃ¶tland County'],
    
    // Europe - Switzerland
    'zurich' => ['name' => 'Zurich', 'state' => 'Zurich'],
    'geneva' => ['name' => 'Geneva', 'state' => 'Geneva'],
    'basel' => ['name' => 'Basel', 'state' => 'Basel-Stadt'],
    'lausanne' => ['name' => 'Lausanne', 'state' => 'Vaud'],
    'bern' => ['name' => 'Bern', 'state' => 'Bern'],
    'winterthur' => ['name' => 'Winterthur', 'state' => 'Zurich'],
    'lucerne' => ['name' => 'Lucerne', 'state' => 'Lucerne'],
    'st-gallen' => ['name' => 'St. Gallen', 'state' => 'St. Gallen'],
    'lugano' => ['name' => 'Lugano', 'state' => 'Ticino'],
    'biel' => ['name' => 'Biel', 'state' => 'Bern'],
    
    // Europe - Poland
    'warsaw' => ['name' => 'Warsaw', 'state' => 'Masovian Voivodeship'],
    'krakow' => ['name' => 'Krakow', 'state' => 'Lesser Poland Voivodeship'],
    'lodz' => ['name' => 'Lodz', 'state' => 'ÅÃ³dÅº Voivodeship'],
    'wroclaw' => ['name' => 'Wroclaw', 'state' => 'Lower Silesian Voivodeship'],
    'poznan' => ['name' => 'Poznan', 'state' => 'Greater Poland Voivodeship'],
    'gdansk' => ['name' => 'Gdansk', 'state' => 'Pomeranian Voivodeship'],
    'szczecin' => ['name' => 'Szczecin', 'state' => 'West Pomeranian Voivodeship'],
    'bydgoszcz' => ['name' => 'Bydgoszcz', 'state' => 'Kuyavian-Pomeranian Voivodeship'],
    'lublin' => ['name' => 'Lublin', 'state' => 'Lublin Voivodeship'],
    'katowice' => ['name' => 'Katowice', 'state' => 'Silesian Voivodeship'],
    
    // Europe - Russia
    'moscow' => ['name' => 'Moscow', 'state' => 'Moscow'],
    'saint-petersburg' => ['name' => 'Saint Petersburg', 'state' => 'Saint Petersburg'],
    'novosibirsk' => ['name' => 'Novosibirsk', 'state' => 'Novosibirsk Oblast'],
    'yekaterinburg' => ['name' => 'Yekaterinburg', 'state' => 'Sverdlovsk Oblast'],
    'nizhny-novgorod' => ['name' => 'Nizhny Novgorod', 'state' => 'Nizhny Novgorod Oblast'],
    'kazan' => ['name' => 'Kazan', 'state' => 'Tatarstan'],
    'chelyabinsk' => ['name' => 'Chelyabinsk', 'state' => 'Chelyabinsk Oblast'],
    'omsk' => ['name' => 'Omsk', 'state' => 'Omsk Oblast'],
    'samara' => ['name' => 'Samara', 'state' => 'Samara Oblast'],
    'rostov-on-don' => ['name' => 'Rostov-on-Don', 'state' => 'Rostov Oblast'],
    
    // Asia - China
    'beijing' => ['name' => 'Beijing', 'state' => 'Beijing Municipality'],
    'shanghai' => ['name' => 'Shanghai', 'state' => 'Shanghai Municipality'],
    'guangzhou' => ['name' => 'Guangzhou', 'state' => 'Guangdong'],
    'shenzhen' => ['name' => 'Shenzhen', 'state' => 'Guangdong'],
    'tianjin' => ['name' => 'Tianjin', 'state' => 'Tianjin Municipality'],
    'wuhan' => ['name' => 'Wuhan', 'state' => 'Hubei'],
    'dongguan' => ['name' => 'Dongguan', 'state' => 'Guangdong'],
    'chengdu' => ['name' => 'Chengdu', 'state' => 'Sichuan'],
    'nanjing' => ['name' => 'Nanjing', 'state' => 'Jiangsu'],
    'chongqing' => ['name' => 'Chongqing', 'state' => 'Chongqing Municipality'],
    
    // Asia - Japan
    'tokyo' => ['name' => 'Tokyo', 'state' => 'Tokyo Metropolis'],
    'yokohama' => ['name' => 'Yokohama', 'state' => 'Kanagawa'],
    'osaka' => ['name' => 'Osaka', 'state' => 'Osaka'],
    'nagoya' => ['name' => 'Nagoya', 'state' => 'Aichi'],
    'sapporo' => ['name' => 'Sapporo', 'state' => 'Hokkaido'],
    'fukuoka' => ['name' => 'Fukuoka', 'state' => 'Fukuoka'],
    'kobe' => ['name' => 'Kobe', 'state' => 'Hyogo'],
    'kawasaki' => ['name' => 'Kawasaki', 'state' => 'Kanagawa'],
    'kyoto' => ['name' => 'Kyoto', 'state' => 'Kyoto'],
    'saitama' => ['name' => 'Saitama', 'state' => 'Saitama'],
    
    // Asia - South Korea
    'seoul' => ['name' => 'Seoul', 'state' => 'Seoul Special City'],
    'busan' => ['name' => 'Busan', 'state' => 'Busan Metropolitan City'],
    'incheon' => ['name' => 'Incheon', 'state' => 'Incheon Metropolitan City'],
    'daegu' => ['name' => 'Daegu', 'state' => 'Daegu Metropolitan City'],
    'daejeon' => ['name' => 'Daejeon', 'state' => 'Daejeon Metropolitan City'],
    'gwangju' => ['name' => 'Gwangju', 'state' => 'Gwangju Metropolitan City'],
    'suwon' => ['name' => 'Suwon', 'state' => 'Gyeonggi'],
    'ulsan' => ['name' => 'Ulsan', 'state' => 'Ulsan Metropolitan City'],
    'changwon' => ['name' => 'Changwon', 'state' => 'South Gyeongsang'],
    'goyang' => ['name' => 'Goyang', 'state' => 'Gyeonggi'],
    
    // Asia - Indonesia
    'jakarta' => ['name' => 'Jakarta', 'state' => 'DKI Jakarta'],
    'surabaya' => ['name' => 'Surabaya', 'state' => 'East Java'],
    'bandung' => ['name' => 'Bandung', 'state' => 'West Java'],
    'bekasi' => ['name' => 'Bekasi', 'state' => 'West Java'],
    'medan' => ['name' => 'Medan', 'state' => 'North Sumatra'],
    'tangerang' => ['name' => 'Tangerang', 'state' => 'Banten'],
    'depok' => ['name' => 'Depok', 'state' => 'West Java'],
    'semarang' => ['name' => 'Semarang', 'state' => 'Central Java'],
    'palembang' => ['name' => 'Palembang', 'state' => 'South Sumatra'],
    'makassar' => ['name' => 'Makassar', 'state' => 'South Sulawesi'],
    
    // Asia - Malaysia
    'kuala-lumpur' => ['name' => 'Kuala Lumpur', 'state' => 'Federal Territory of Kuala Lumpur'],
    'george-town' => ['name' => 'George Town', 'state' => 'Penang'],
    'ipoh' => ['name' => 'Ipoh', 'state' => 'Perak'],
    'shah-alam' => ['name' => 'Shah Alam', 'state' => 'Selangor'],
    'petaling-jaya' => ['name' => 'Petaling Jaya', 'state' => 'Selangor'],
    'klang' => ['name' => 'Klang', 'state' => 'Selangor'],
    'johor-bahru' => ['name' => 'Johor Bahru', 'state' => 'Johor'],
    'subang-jaya' => ['name' => 'Subang Jaya', 'state' => 'Selangor'],
    'kota-kinabalu' => ['name' => 'Kota Kinabalu', 'state' => 'Sabah'],
    'kuching' => ['name' => 'Kuching', 'state' => 'Sarawak'],
    
    // Asia - Thailand
    'bangkok' => ['name' => 'Bangkok', 'state' => 'Bangkok'],
    'samut-prakan' => ['name' => 'Samut Prakan', 'state' => 'Samut Prakan'],
    'mueang-nonthaburi' => ['name' => 'Mueang Nonthaburi', 'state' => 'Nonthaburi'],
    'udon-thani' => ['name' => 'Udon Thani', 'state' => 'Udon Thani'],
    'chon-buri' => ['name' => 'Chon Buri', 'state' => 'Chonburi'],
    'nakhon-ratchasima' => ['name' => 'Nakhon Ratchasima', 'state' => 'Nakhon Ratchasima'],
    'chiang-mai' => ['name' => 'Chiang Mai', 'state' => 'Chiang Mai'],
    'hat-yai' => ['name' => 'Hat Yai', 'state' => 'Songkhla'],
    'pak-kret' => ['name' => 'Pak Kret', 'state' => 'Nonthaburi'],
    'si-racha' => ['name' => 'Si Racha', 'state' => 'Chonburi'],
    
    // Asia - Vietnam
    'ho-chi-minh-city' => ['name' => 'Ho Chi Minh City', 'state' => 'Ho Chi Minh City'],
    'hanoi' => ['name' => 'Hanoi', 'state' => 'Hanoi'],
    'haiphong' => ['name' => 'Haiphong', 'state' => 'Haiphong'],
    'da-nang' => ['name' => 'Da Nang', 'state' => 'Da Nang'],
    'can-tho' => ['name' => 'Can Tho', 'state' => 'Can Tho'],
    'bien-hoa' => ['name' => 'Bien Hoa', 'state' => 'Dong Nai'],
    'hue' => ['name' => 'Hue', 'state' => 'Thua Thien Hue'],
    'nha-trang' => ['name' => 'Nha Trang', 'state' => 'Khanh Hoa'],
    'buon-ma-thuot' => ['name' => 'Buon Ma Thuot', 'state' => 'Dak Lak'],
    'vung-tau' => ['name' => 'Vung Tau', 'state' => 'Ba Ria-Vung Tau'],
    
    // Asia - Taiwan
    'taipei' => ['name' => 'Taipei', 'state' => 'Taipei'],
    'kaohsiung' => ['name' => 'Kaohsiung', 'state' => 'Kaohsiung'],
    'taichung' => ['name' => 'Taichung', 'state' => 'Taichung'],
    'tainan' => ['name' => 'Tainan', 'state' => 'Tainan'],
    'taoyuan' => ['name' => 'Taoyuan', 'state' => 'Taoyuan'],
    'hsinchu' => ['name' => 'Hsinchu', 'state' => 'Hsinchu'],
    'keelung' => ['name' => 'Keelung', 'state' => 'Keelung'],
    'chiayi' => ['name' => 'Chiayi', 'state' => 'Chiayi'],
    'changhua' => ['name' => 'Changhua', 'state' => 'Changhua'],
    'pingtung' => ['name' => 'Pingtung', 'state' => 'Pingtung'],
    
    // Asia - Philippines
    'manila' => ['name' => 'Manila', 'state' => 'Metro Manila'],
    'quezon-city' => ['name' => 'Quezon City', 'state' => 'Metro Manila'],
    'davao-city' => ['name' => 'Davao City', 'state' => 'Davao del Sur'],
    'caloocan' => ['name' => 'Caloocan', 'state' => 'Metro Manila'],
    'cebu-city' => ['name' => 'Cebu City', 'state' => 'Cebu'],
    'zamboanga-city' => ['name' => 'Zamboanga City', 'state' => 'Zamboanga del Sur'],
    'antipolo' => ['name' => 'Antipolo', 'state' => 'Rizal'],
    'pasig' => ['name' => 'Pasig', 'state' => 'Metro Manila'],
    'taguig' => ['name' => 'Taguig', 'state' => 'Metro Manila'],
    'cagayan-de-oro' => ['name' => 'Cagayan de Oro', 'state' => 'Misamis Oriental'],
    
    // Middle East & Africa - Saudi Arabia
    'riyadh' => ['name' => 'Riyadh', 'state' => 'Riyadh Region'],
    'jeddah' => ['name' => 'Jeddah', 'state' => 'Makkah Region'],
    'mecca' => ['name' => 'Mecca', 'state' => 'Makkah Region'],
    'medina' => ['name' => 'Medina', 'state' => 'Al Madinah Region'],
    'dammam' => ['name' => 'Dammam', 'state' => 'Eastern Province'],
    'khobar' => ['name' => 'Khobar', 'state' => 'Eastern Province'],
    'taif' => ['name' => 'Taif', 'state' => 'Makkah Region'],
    'tabuk' => ['name' => 'Tabuk', 'state' => 'Tabuk Region'],
    'buraidah' => ['name' => 'Buraidah', 'state' => 'Al-Qassim Region'],
    'khamis-mushait' => ['name' => 'Khamis Mushait', 'state' => 'Asir Region'],
    
    // Middle East & Africa - UAE
    'dubai' => ['name' => 'Dubai', 'state' => 'Dubai'],
    'abu-dhabi' => ['name' => 'Abu Dhabi', 'state' => 'Abu Dhabi'],
    'sharjah' => ['name' => 'Sharjah', 'state' => 'Sharjah'],
    'al-ain' => ['name' => 'Al Ain', 'state' => 'Abu Dhabi'],
    'ajman' => ['name' => 'Ajman', 'state' => 'Ajman'],
    'ras-al-khaimah' => ['name' => 'Ras Al Khaimah', 'state' => 'Ras Al Khaimah'],
    'fujairah' => ['name' => 'Fujairah', 'state' => 'Fujairah'],
    'umm-al-quwain' => ['name' => 'Umm Al Quwain', 'state' => 'Umm Al Quwain'],
    'al-dhafra' => ['name' => 'Al Dhafra', 'state' => 'Abu Dhabi'],
    'kalba' => ['name' => 'Kalba', 'state' => 'Sharjah'],
    
    // Middle East & Africa - Turkey
    'istanbul' => ['name' => 'Istanbul', 'state' => 'Istanbul'],
    'ankara' => ['name' => 'Ankara', 'state' => 'Ankara'],
    'izmir' => ['name' => 'Izmir', 'state' => 'Izmir'],
    'bursa' => ['name' => 'Bursa', 'state' => 'Bursa'],
    'adana' => ['name' => 'Adana', 'state' => 'Adana'],
    'gaziantep' => ['name' => 'Gaziantep', 'state' => 'Gaziantep'],
    'konya' => ['name' => 'Konya', 'state' => 'Konya'],
    'antalya' => ['name' => 'Antalya', 'state' => 'Antalya'],
    'diyarbakir' => ['name' => 'Diyarbakir', 'state' => 'Diyarbakir'],
    'mersin' => ['name' => 'Mersin', 'state' => 'Mersin'],
    
    // Middle East & Africa - South Africa
    'cape-town' => ['name' => 'Cape Town', 'state' => 'Western Cape'],
    'johannesburg' => ['name' => 'Johannesburg', 'state' => 'Gauteng'],
    'durban' => ['name' => 'Durban', 'state' => 'KwaZulu-Natal'],
    'pretoria' => ['name' => 'Pretoria', 'state' => 'Gauteng'],
    'port-elizabeth' => ['name' => 'Port Elizabeth', 'state' => 'Eastern Cape'],
    'pietermaritzburg' => ['name' => 'Pietermaritzburg', 'state' => 'KwaZulu-Natal'],
    'benoni' => ['name' => 'Benoni', 'state' => 'Gauteng'],
    'tembisa' => ['name' => 'Tembisa', 'state' => 'Gauteng'],
    'east-london' => ['name' => 'East London', 'state' => 'Eastern Cape'],
    'vereeniging' => ['name' => 'Vereeniging', 'state' => 'Gauteng'],
    
    // South America - Brazil
    'sao-paulo' => ['name' => 'SÃ£o Paulo', 'state' => 'SÃ£o Paulo'],
    'rio-de-janeiro' => ['name' => 'Rio de Janeiro', 'state' => 'Rio de Janeiro'],
    'brasilia' => ['name' => 'BrasÃ­lia', 'state' => 'Federal District'],
    'salvador' => ['name' => 'Salvador', 'state' => 'Bahia'],
    'fortaleza' => ['name' => 'Fortaleza', 'state' => 'CearÃ¡'],
    'belo-horizonte' => ['name' => 'Belo Horizonte', 'state' => 'Minas Gerais'],
    'manaus' => ['name' => 'Manaus', 'state' => 'Amazonas'],
    'curitiba' => ['name' => 'Curitiba', 'state' => 'ParanÃ¡'],
    'recife' => ['name' => 'Recife', 'state' => 'Pernambuco'],
    'porto-alegre' => ['name' => 'Porto Alegre', 'state' => 'Rio Grande do Sul'],
    
    // South America - Argentina
    'buenos-aires' => ['name' => 'Buenos Aires', 'state' => 'Buenos Aires'],
    'cordoba' => ['name' => 'CÃ³rdoba', 'state' => 'CÃ³rdoba'],
    'rosario' => ['name' => 'Rosario', 'state' => 'Santa Fe'],
    'mendoza' => ['name' => 'Mendoza', 'state' => 'Mendoza'],
    'tucuman' => ['name' => 'TucumÃ¡n', 'state' => 'TucumÃ¡n'],
    'la-plata' => ['name' => 'La Plata', 'state' => 'Buenos Aires'],
    'mar-del-plata' => ['name' => 'Mar del Plata', 'state' => 'Buenos Aires'],
    'salta' => ['name' => 'Salta', 'state' => 'Salta'],
    'santa-fe' => ['name' => 'Santa Fe', 'state' => 'Santa Fe'],
    'san-juan' => ['name' => 'San Juan', 'state' => 'San Juan'],
    
    // South America - Mexico
    'mexico-city' => ['name' => 'Mexico City', 'state' => 'Mexico City'],
    'guadalajara' => ['name' => 'Guadalajara', 'state' => 'Jalisco'],
    'monterrey' => ['name' => 'Monterrey', 'state' => 'Nuevo LeÃ³n'],
    'puebla' => ['name' => 'Puebla', 'state' => 'Puebla'],
    'tijuana' => ['name' => 'Tijuana', 'state' => 'Baja California'],
    'leon' => ['name' => 'LeÃ³n', 'state' => 'Guanajuato'],
    'juarez' => ['name' => 'JuÃ¡rez', 'state' => 'Chihuahua'],
    'torreon' => ['name' => 'TorreÃ³n', 'state' => 'Coahuila'],
    'queretaro' => ['name' => 'QuerÃ©taro', 'state' => 'QuerÃ©taro'],
    'merida' => ['name' => 'MÃ©rida', 'state' => 'YucatÃ¡n']
];;

// Check if city is supported
if (!in_array($city_lower, $supportedCities)) {
    header("Location: sms-marketing-service.php");
    exit();
}

// State mapping for cities
$cityStateMapping = [
    'chennai' => 'Tamil Nadu', 'mumbai' => 'Maharashtra', 'delhi' => 'Delhi', 'bangalore' => 'Karnataka',
    'hyderabad' => 'Telangana', 'kolkata' => 'West Bengal', 'pune' => 'Maharashtra', 'ahmedabad' => 'Gujarat',
    // Add more mappings as needed - abbreviated for space
];

$state = isset($cityStateMapping[$city_lower]) ? $cityStateMapping[$city_lower] : '';

$page_title = "SMS Marketing Services in $city | ThiyagiDigital";
$page_description = "Professional SMS marketing services in $city. Bulk SMS campaigns, text message marketing, and automated SMS solutions for $city businesses.";
$page_keywords = "SMS marketing $city, bulk SMS services $city, text message marketing $city, SMS campaigns $city";

include 'header.php';
?>

<!-- Start of breadcrumb section
	============================================= -->
	<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="assets/img/bg/bread-bg.jpg">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="bi-breadcrumbs-content headline ul-li text-center">
				<h1 style="color: white"><b>Best SMS Marketing Services in <?php echo $city; ?></b></h1><br>
				<ul>
					<li><a href="/#">Home</a></li>
					<li>SMS Marketing Services</li>
					<li style="color: white"><?php echo $city; ?></li>
				</ul>
			</div>
		</div>
	</section>	
<!-- End of breadcrumb section
	============================================= -->

<!-- Start of Service Details section
	============================================= -->
	<section id="bi-service-details" class="bi-service-details-section inner-page-padding">
		<div class="container">
			<div class="bi-service-details-content">
				<div class="row">
					<div class="col-lg-8">
						<div class="bi-service-details-text-area">
							<div class="bi-service-details-img">
								<img src="assets/img/service/serd1.jpg" alt="SMS Marketing Services in <?php echo $city; ?>">
							</div>
							<div class="bi-service-details-text headline pera-content">
								<h2>SMS Marketing Services in <?php echo $city; ?></h2>

								<p>Connect directly with your <?php echo $city; ?> customers through our powerful SMS Marketing services at ThiyagiDigital. We specialize in creating targeted text messaging campaigns for <?php echo $city; ?> businesses that deliver instant communication, drive immediate action, and build lasting customer relationships with exceptional open rates.</p>

								<p>Our SMS marketing experts understand the unique communication preferences of <?php echo $city; ?> consumers. With text messages boasting a 98% open rate and 90% being read within 3 minutes, SMS marketing provides unparalleled reach to your <?php echo $city; ?> audience. From promotional campaigns and flash sales to appointment reminders and customer service updates, we create comprehensive SMS strategies tailored for the <?php echo $city; ?> market.</p>

								<p>What sets our SMS Marketing services apart in <?php echo $city; ?> is our focus on compliance, personalization, and automation. We ensure all campaigns adhere to Indian SMS marketing regulations while delivering personalized messages that resonate with your <?php echo $city; ?> audience. Our advanced automation features allow for triggered campaigns, drip sequences, and behavioral-based messaging specifically designed for <?php echo $city; ?> businesses.</p>

                                <h4>"Instant Communication with Your <?php echo $city; ?> Customers"</h4>

                                <p>With features like bulk SMS broadcasting, automated drip campaigns, two-way messaging, and detailed analytics, our SMS Marketing services in <?php echo $city; ?> go beyond simple text blasts. We create integrated campaigns that work seamlessly with your email marketing, social media, and overall digital marketing strategy to maximize customer engagement in the <?php echo $city; ?> market.</p>

                                <p>Partner with us to harness the power of SMS marketing for your <?php echo $city; ?> business growth. From campaign strategy to execution and optimization, we are committed to delivering SMS Marketing services that drive immediate action, increase customer loyalty, and boost your bottom line in <?php echo $city; ?>. Let's create text campaigns that your <?php echo $city; ?> customers actually want to receive.</p>

								<h4>Frequently Asked Questions about SMS Marketing in <?php echo $city; ?></h4>
								<div class="bi-faq-content-area">
									<div class="accordion" id="accordionExample_31">
										<div class="accordion-item wow fadeInUp"  data-wow-delay="200ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading10">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
													<span>Why choose SMS marketing for <?php echo $city; ?> businesses?</span>
												</button>
											</h2>
											<div id="collapse10" class="accordion-collapse collapse show" aria-labelledby="heading10" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">SMS marketing in <?php echo $city; ?> offers 98% open rates, instant delivery, high mobile penetration, cost-effectiveness, and direct customer communication, making it perfect for reaching <?php echo $city; ?> consumers immediately.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="300ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading12">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
													<span>How do you ensure SMS compliance in <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">We strictly follow Indian SMS marketing regulations, implement proper DND compliance, provide clear opt-out options, respect sending time restrictions, and maintain compliance with TRAI guidelines for <?php echo $city; ?> businesses.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="400ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading13">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
													<span>Can you target specific areas within <?php echo $city; ?>?</span>
												</button>
											</h2>
											<div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">Yes, we can segment your <?php echo $city; ?> audience by locality, demographics, purchase behavior, and other criteria to deliver highly targeted SMS campaigns to specific areas and customer groups in <?php echo $city; ?>.
													</div>
												</div>
											</div>
										</div>
										<div class="accordion-item wow fadeInUp"  data-wow-delay="500ms" data-wow-duration="1000ms">
											<h2 class="accordion-header" id="heading14">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
													<span>What SMS marketing analytics do you provide for <?php echo $city; ?> campaigns?</span>
												</button>
											</h2>
											<div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14" data-bs-parent="#accordionExample_31">
												<div class="accordion-body ">
													<div class="bi-faq-text">We provide comprehensive <?php echo $city; ?>-specific reports including delivery rates, open rates, click-through rates, conversion tracking, ROI analysis, and local market insights to optimize your SMS campaigns for maximum effectiveness in <?php echo $city; ?>.
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
	</section>
<!-- End of Service Details section
	============================================= -->

	<!-- Cities Tabs Section -->
	<?php include 'cities-tabs.php';?>

	<?php include 'testmonial2.php';?>
	<?php include 'client-logo.php';?>
	<?php include 'project-count.php';?>

	<?php include 'certify-partner.php';?>

	<?php include 'footer.php';?>
