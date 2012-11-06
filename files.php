<html>
<head>
<link rel="stylesheet" type="text/css" src="main.css" />
<title>Minecraft Forge Downloads</title>
</head>
<body>
<?php




$target = "http://files.minecraftforge.net/";


$contents = file_get_contents($target);


$dom = new DomDocument();
$dom->loadHTML($contents);

$body = $dom->getElementsByTagName("a");

$length = $body->length - 1;

function get_forge_meta($url) {
	if (!preg_match("/files\.minecraftforge\.net/", $url)) {
		print("<b> invalid value </b>");
		return;
	}
	//echo("<td><tr>");
	$array = preg_split("/\-/", $url);
	$total = count($array);
	print($total."\n");
	var_dump($array);
	$ver = $array[($total - 1)];
	sleep(1);
	$ver = preg_replace("/\.txt/", "", $ver);
	$ver = preg_replace("/\.zip/", "", $ver);
	$finalString = " ";
	if ( preg_match("/\w+/", $ver)) {
		$finalString .= "($ver)";
	}
	else {
		$finalString .= "(v$ver)";
	}
	echo("FORGE - " . $array[($total - 2)] . $finalString );

	if (preg_match("/adf\.ly/", $url)) {
		// adfly code
	}
	else {
		// direct code
	}
}

$ii = 0;
echo('<table>');
for ($i = 0; $i < $length; $i++) {
	// first 7 i's will be recommeneded & latest
	// i 0 will be changelog
	// i 1 javadoc adfly
	// i 2 javadoc direct
	// i 3 src adfly
	// 4 src direct
	// 5 uni adfly
	// 6 uni direct
	$domnode = $body->item($i);
	$attrs = $domnode->attributes;
	$targ = $attrs->getNamedItem("href")->nodeValue;
	$forgemeta = get_forge_meta($targ);
	if ($ii < 7) {
		$ii++;
		print("<fancy top part code> $targ </fancy top part code>\n");
	}
	else {
		print("$targ\n");
		if ($i == 7) {
			echo("Finished the top part of the links...");
		}
		if (($i - $ii) % 7 == 0 && $i > 7) {
			echo("Finished one element...\n");
			sleep(1);
		}
	}
	
}
/*
 <table>
                <tr><td>6.0.1.<b>339</b>: 10/26/2012 22:42:17 <a href="http://files.minecraftforge.net/minecraftforge-universal-6.0.1.339.zip">universal</a> <a href="http://files.minecraftforge.net/minecraftforge-src-6.0.1.339.zip">src</a> <a href="http://files.minecraftforge.net/minecraftforge-javadoc-6.0.1.339.zip">javadoc</a><a>changelog</a></td></tr>
                <tr><td>6.0.1.<b>338</b>: 10/26/2012 21:15:08 <a href="http://files.minecraftforge.net/minecraftforge-universal-6.0.1.338.zip">universal</a> <a href="http://files.minecraftforge.net/minecraftforge-src-6.0.1.338.zip">src</a> <a href="http://files.minecraftforge.net/minecraftforge-javadoc-6.0.1.338.zip">javadoc</a><a>changelog</a></td></tr>
                <tr><td>6.0.1.<b>338</b>: 10/26/2012 21:15:08 <a href="http://files.minecraftforge.net/minecraftforge-universal-6.0.1.338.zip">universal</a> <a href="http://files.minecraftforge.net/minecraftforge-src-6.0.1.338.zip">src</a> <a href="http://files.minecraftforge.net/minecraftforge-javadoc-6.0.1.338.zip">javadoc</a><a>changelog</a></td></tr>
                <tr><td>6.0.1.<b>338</b>: 10/26/2012 21:15:08 <a href="http://files.minecraftforge.net/minecraftforge-universal-6.0.1.338.zip">universal</a> <a href="http://files.minecraftforge.net/minecraftforge-src-6.0.1.338.zip">src</a> <a href="http://files.minecraftforge.net/minecraftforge-javadoc-6.0.1.338.zip">javadoc</a><a>changelog</a></td></tr>
                <tr><td>6.0.1.<b>338</b>: 10/26/2012 21:15:08 <a href="http://files.minecraftforge.net/minecraftforge-universal-6.0.1.338.zip">universal</a> <a href="http://files.minecraftforge.net/minecraftforge-src-6.0.1.338.zip">src</a> <a href="http://files.minecraftforge.net/minecraftforge-javadoc-6.0.1.338.zip">javadoc</a><a>changelog</a></td></tr>
                <tr><td>6.0.1.<b>338</b>: 10/26/2012 21:15:08 <a href="http://files.minecraftforge.net/minecraftforge-universal-6.0.1.338.zip">universal</a> <a href="http://files.minecraftforge.net/minecraftforge-src-6.0.1.338.zip">src</a> <a href="http://files.minecraftforge.net/minecraftforge-javadoc-6.0.1.338.zip">javadoc</a><a>changelog</a></td></tr>
                <tr><td>6.0.1.<b>338</b>: 10/26/2012 21:15:08 <a href="http://files.minecraftforge.net/minecraftforge-universal-6.0.1.338.zip">universal</a> <a href="http://files.minecraftforge.net/minecraftforge-src-6.0.1.338.zip">src</a> <a href="http://files.minecraftforge.net/minecraftforge-javadoc-6.0.1.338.zip">javadoc</a><a>changelog</a></td></tr>
		</table>
 */
