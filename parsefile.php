<?php 

$prolog_file = file_get_contents($_FILES['file']['tmp_name']);

$lines        = explode("\n", $prolog_file);

$lines1 = array();
$lines2 = array();

// Breaking up the file
$keyword = "%%";
$a = 1;
foreach($lines as $line => $data) {
	if (mb_strpos($data, $keyword) !== FALSE) {
		
		${'lines' . $a} = array_slice($lines,$line, NULL, true);

		$a++;
	}
}

for ($x = 1; $x < ($a-1); $x++) {
	${'result' . $x} = array_diff(${'lines' . $x}, ${'lines' . ($x+1)});
} 

${'result' . $x} = ${'lines' . $x};

for ($y = 1; $y < $a; $y++) {

} 

$predicates = array();
$arguments = array();
$backgroundknowledge = array();

// PREDICATES
for ($y = 1; $y < $a; $y++) {
	foreach(${'result' . $y} as $key => $data) {
		// Finding the comment
		if (mb_strpos($data, "%% tell metagol to use the BK") !== FALSE) {
			$predicates = ${'result' . $y};
		}
	}
}
// Using regular expression on the predicates to find matches
$jspreds = array();
foreach($predicates as $key => $predicate) {
	preg_match("/^prim\(([a-zA-Z_0-9]*)\/([a-zA-Z_0-9]*)\)\.$/", $predicate, $matches);
	
	$length = count($matches);
	for ($i = 1; $i < $length; $i++) {
	  array_push($jspreds, $matches[$i]);
	}
}

$jspredsnames = array();
$jspredsnums = array();
$length = count($jspreds);
	for ($i = 0; $i < $length; $i++) {
	  array_push($jspredsnames, $jspreds[$i]);
	  $i++;
	}
	for ($i = 1; $i < $length; $i++) {
	  array_push($jspredsnums, $jspreds[$i]);
	  $i++;
	}
$jspreds = array($jspredsnames, $jspredsnums);

// ARGUMENTS

for ($y = 1; $y < $a; $y++) {
	foreach(${'result' . $y} as $key => $data) {
		// Finding the comment
		if (mb_strpos($data, "%% background knowledge") !== FALSE) {

			$arguments = ${'result' . $y};

		}
	}
} 

// Using regular expression on the arguments to find matches
$jsargs = array();
foreach($arguments as $key => $argument) {
	preg_match("/^([a-zA-Z_0-9]*)\(([a-zA-Z_0-9]*)\,([a-zA-Z_0-9]*)\)\.$/", $argument, $matches);
	
	$length = count($matches);
	for ($i = 2; $i < $length; $i++) {
	  array_push($jsargs, $matches[$i]);
	}
}
// Removing any duplicates
$jsargs = array_unique($jsargs);

// BACKGROUND KNOWLEDGE
for ($y = 1; $y < $a; $y++) {
	foreach(${'result' . $y} as $key => $data) {
		// Finding the comment
		if (mb_strpos($data, "%% background knowledge") !== FALSE) {
			$backgroundknowledge = ${'result' . $y};
		}
	}
}

// Using regular expression on the background knowledge to find matches
$jsbk = array();
foreach($backgroundknowledge as $key => $bk) {
	preg_match("/^([a-zA-Z_0-9]*)\(([a-zA-Z_0-9]*)\,([a-zA-Z_0-9]*)\)\.$/", $bk, $matches);

	$length = count($matches);
	for ($i = 1; $i < $length; $i++) {
	  array_push($jsbk, array($matches[$i],$matches[$i+1],$matches[$i+2]));
	  $i += 2;
	}
}

echo json_encode(array_values(array(array_values($jsargs),array_values($jspreds),array_values($jsbk))));

?>