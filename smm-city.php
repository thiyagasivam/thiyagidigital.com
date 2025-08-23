<?php include 'header.php';?>

<?php
// Get city name from URL and sanitize it
$citySlug = isset($_GET['city']) ? strtolower(trim($_GET['city'])) : '';
$cityName = ucwords(str_replace('-', ' ', $citySlug));

// List of supported cities (Tamil Nadu)
$supportedCities = [
    // Major cities
    'chennai' => ['name' => 'Chennai', 'state' => 'Tamil Nadu'],
    'madurai' => ['name' => 'Madurai', 'state' => 'Tamil Nadu'],
    'coimbatore' => ['name' => 'Coimbatore', 'state' => 'Tamil Nadu'],
    'tiruchirappalli' => ['name' => 'Tiruchirappalli', 'state' => 'Tamil Nadu'],
    'salem' => ['name' => 'Salem', 'state' => 'Tamil Nadu'],
    'tirunelveli' => ['name' => 'Tirunelveli', 'state' => 'Tamil Nadu'],
    'vellore' => ['name' => 'Vellore', 'state' => 'Tamil Nadu'],
    'tiruppur' => ['name' => 'Tiruppur', 'state' => 'Tamil Nadu'],
    'erode' => ['name' => 'Erode', 'state' => 'Tamil Nadu'],
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
    'pudukkottai' => ['name' => 'Pudukkottai', 'state' => 'Tamil Nadu'],
    'tiruvannamalai' => ['name' => 'Tiruvannamalai', 'state' => 'Tamil Nadu'],
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

// Redirect to main SMM page if city not found
if (!array_key_exists($citySlug, $supportedCities)) {
    header("Location: /smm");
    exit();
}

// Get city data
$cityData = $supportedCities[$citySlug];
$fullCityName = $cityData['name'];
$stateName = $cityData['state'];

// Dynamic SEO variables for this city page
$page_title = "Top Social Media Marketing Services in {$fullCityName} | ThiyagiDigital";
$page_description = "Professional SMM services in {$fullCityName}. Boost your social media presence with our expert strategies tailored for {$stateName} businesses.";
$page_keywords = "SMM services {$fullCityName}, social media marketing {$fullCityName}, social media management {$fullCityName}";
$canonical_url = "https://www.thiyagidigital.com/smm-service/{$citySlug}";
?>
	
<!-- Start of breadcrumb section -->
<section id="bi-breadcrumbs" class="bi-bredcrumbs-section position-relative about-bgimgsize" data-background="/assets/img/bg/bread-bg.jpg">
    <div class="background_overlay"></div>
    <div class="container">
        <div class="bi-breadcrumbs-content headline ul-li text-center">
            <h2 style="color: white"><b>SMM Services in <?php echo $fullCityName; ?></b></h2><br>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">Services</a></li>
                <li style="color: white">SMM in <?php echo $fullCityName; ?></li>
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
                            <img src="/assets/img/service/serd1.jpg" alt="SMM Services in <?php echo $fullCityName; ?>">
                        </div>
                        <div class="bi-service-details-text headline pera-content">
                            <h3>Social Media Marketing in <?php echo $fullCityName; ?></h3>

                            <p>In <?php echo $fullCityName; ?>'s competitive digital landscape, a strong social media presence is no longer optional - it's essential for business success. Our Social Media Marketing Services are specifically designed to help <?php echo $fullCityName; ?> businesses stand out, engage their local audience, and drive meaningful results.</p>

                            <p>Our approach combines global social media expertise with local <?php echo $fullCityName; ?> market knowledge. We create customized strategies that resonate with <?php echo $stateName; ?>'s unique audience demographics, cultural nuances, and business environment. From content creation to community management, we handle every aspect of your social presence.</p>

                            <p>For <?php echo $fullCityName; ?> businesses, we focus on platforms that deliver the best results locally - whether it's Instagram for visual brands, LinkedIn for B2B companies, or Facebook for community engagement. Our content is tailored to speak directly to <?php echo $fullCityName; ?>'s diverse audience while maintaining your brand's core identity.</p>

                            <h4>"Elevate Your <?php echo $fullCityName; ?> Brand with Social Media Mastery"</h4>

                            <p>We go beyond just posting content. Our <?php echo $fullCityName; ?> SMM services include in-depth audience analysis, competitor benchmarking, and performance tracking to ensure your social media investment delivers real business value. We help you build genuine connections with your <?php echo $fullCityName; ?> customers, turning followers into loyal brand advocates.</p>

                            <p>Whether you're a startup looking to establish your presence or an established <?php echo $fullCityName; ?> business aiming to dominate your niche, our social media experts have the local knowledge and technical expertise to make it happen. Partner with us and watch your <?php echo $fullCityName; ?> business thrive in the social media landscape.</p>

                            <h4>Frequently Asked Questions About SMM in <?php echo $fullCityName; ?></h4>
                            <div class="bi-faq-content-area">
                                <div class="accordion" id="accordionExample_31">
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading10">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                                                <span>Which social platforms work best in <?php echo $fullCityName; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse10" class="accordion-collapse collapse show" aria-labelledby="heading10" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                In <?php echo $fullCityName; ?>, we typically see strong engagement on Instagram and Facebook for B2C, LinkedIn for B2B, and growing potential on platforms like ShareChat for regional language content targeting <?php echo $stateName; ?> audiences.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading12">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                                <span>How do you localize content for <?php echo $fullCityName; ?> audiences?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                We incorporate <?php echo $fullCityName; ?>-specific references, local festivals, vernacular language nuances, and geo-targeted campaigns to ensure content resonates deeply with <?php echo $stateName; ?> audiences while maintaining brand consistency.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">
                                        <h2 class="accordion-header" id="heading13">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                                <span>Do you offer local event coverage in <?php echo $fullCityName; ?>?</span>
                                            </button>
                                        </h2>
                                        <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionExample_31">
                                            <div class="accordion-body">
                                                <div class="bi-faq-text">
                                                Yes, we provide on-ground social media coverage for <?php echo $fullCityName; ?> events including live posting, story updates, and post-event content packages to maximize your local event's digital impact.
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
                                    <p>We provide specialized SMM services for businesses in <?php echo $fullCityName; ?>, <?php echo $stateName; ?>.</p>
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