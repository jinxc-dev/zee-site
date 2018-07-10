<?php 
$w_meas_bust = array();
for ($i = 30; $i < 66; $i++) {
	$w_meas_bust[] = $i . "&quot;";
}
$w_meas_waist = array();
for ($i = 22; $i < 46; $i++) {
	$w_meas_waist[] = $i . "&quot;";
}

$w_meas_hips = array();
for ($i = 30; $i < 53; $i++) {
	$w_meas_hips[] = $i . "&quot;";
}

$w_height = array();
for ($i = 4; $i < 7; $i++) {
	for ($j = 0; $j < 12; $j ++) {
		$w_height[] = $i . "'" . $j . "&quot;";
	}
}

$w_weight = array();
for ($i = 90; $i < 305; $i += 5) {
	$w_weight[] = $i . " lbs";
}
$w_weight[] = "Don't want to say";

$w_breast_size = array();
$w_tmp = array('A','B', 'C', 'D', 'DD', 'DDD', 'E','E','G','H','I','J','K','L','M','N');
for ($i = 28; $i < 47; $i ++) {
	foreach ($w_tmp as $value) {
		$w_breast_size[] = $i . $value;
	}
}

$w_implant_size = array();
for ($i = 200; $i < 1000; $i += 50) {
	$w_implant_size[] = $i . 'cc';
}
for ($i = 1000; $i <= 3500; $i += 100) {
	$w_implant_size[] = $i . 'cc';
}


return  array(
	'bust' => $w_meas_bust,
	'waist' => $w_meas_waist,
	'hips' => $w_meas_hips,
	'height' => $w_height,
	'breast_size' => $w_breast_size,
	'implant_size' => $w_implant_size,
	'weight' => $w_weight,
	'breast_type' => array(
		"Slender","Athletic and Toned","A few extra pounds","About Average","Stocky","Heavyset"
	),
	'occupation' => array(
		"Webcam Model",
		"Porn Star",
		"Actress",
		"Student",
		"Model",
		"Stripper",
		"Naughty Girl",
		"Dominatrix",
		"Fetish Model",
		"Glamour Model",
		"Super Model",
		"Public Figure"
	),
	'gender' => array(
		"Male",
		"Female",
		"Trans",
		"Genderqueer"
	),
	'sign' => array(
		"Capricorn",
		"Aquarius",
		"Pisces",
		"Aries",
		"Taurus",
		"Gemini",
		"Cancer",
		"Leo",
		"Virgo",
		"Libra",
		"Scorpio",
		"Sagittarius",
		"I don't believe in Astrology"
	),
	'ethnicity' => array(
		"Asian",
		"Black / Ebony",
		"East Indian",
		"Latino / Hispanic",
		"Mixed",
		"Middle Eastern",
		"Native American / Alaskan",
		"Pacific Islander",
		"White / Caucasian",
		"Other"
	),
	"language" =>array(
		"English"
	),
	"status" => array(
		"Single",
		"In a relationship",
		"Married",
		"Engaged",
		"Open relationship",
		"It's complicated",
		"Widowed",
		"Divorced"
	),

	"orientation" => array(
		"Straight","Gay","Lesbian","Bi-curious","Bisexual","Pansexual","Sapiosexual"
	),
	"hair_color" => array(
		"Black","Blonde","Dark Blonde","Platinum Blonde","Brunette","Dark Brown","Redhead","Auburn","Blue","Green","Grey","Pink","Purple","Orange","Salt and Pepper","Many"
	),
	"eye_color" => array(
		"Black", "Blue","Brown","Grey","Green","Hazel"
	),

	"body_type" => array(
		"Slender", "Athletic and Toned","A few extra pounds","About Average","Stocky","Heavyset"
	),
	'tattoos' => array('No', 'Yes'),
	'piercings' => array('No', 'Yes'),
);
?>