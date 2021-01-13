<!DOCTYPE html>
<head>
  <title>Michael John Carini MD5 Cracker</title>
</head>

<body>

<h1>MD5 cracker</h1>

<p>This application takes an MD5 hash
of four characters and
attempts to hash all combinations
to determine the original characters.</p>

<pre>
Debug Output:

<?php

// pssw 1 = 0bd65e799153554726820ca639514029 = 4429
// pssw 2 = aa36c88c27650af3b9868b723ae15dfc = 4413
// pssw 3 = 1ca906c1ad59db8f11643829560bab55 = Not Found
// pssw 4 = 1d8d70dddf147d2d92a634817f01b239 = 4427
// pssw 5 = acf06cdd9c744f969958e1f085554c8b = 3341

$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our alphabet
    $txt = "abcdefghijklmnopqrstuvwxyz0123456789";
    $show = 15;

    // Outer loop goes through the alphabet for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<strlen($txt); $i++ ) {

        // The first of four characters
        $ch1 = $txt[$i];

        // Our inner loop Not the use of new variables
        // $j and $ch2
        for($j=0; $j<strlen($txt); $j++ ) {
            // Our second character
            $ch2 = $txt[$j];

              for($k=0; $k<strlen($txt); $k++ ) {
                // Our third character
                $ch3 = $txt[$k];

                  for($l=0; $l<strlen($txt); $l++ ) {
                    // Our fourth character
                    $ch4 = $txt[$l];


            // Concatenate the four characters together to
            // form the "possible" pre-hash text
            $try = $ch1.$ch2.$ch3.$ch4;

            // Run the hash and then check to see if we match
            $check = hash('md5', $try);
            if ( $check == $md5 ) {
                $goodtext = $try;
                // Exit the inner loop
                break;
            }

            // Debug output until $show hits 0
            if ( $show > 0 ) {
                print "$check $try\n";
                $show = $show - 1;
            }
        }
    }


}
}
// Compute elapsed time
$time_post = microtime(true);
print "Elapsed time: ";
print $time_post-$time_pre;
print "\n";
}
?>

</pre>

<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($goodtext); ?></p>

<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>

<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/csev/wa4e/tree/master/code/crack"
target="_blank">Source code for this application</a></li>
</ul>

</body>
</html>
