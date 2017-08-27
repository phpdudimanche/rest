<?php // assert.php
// display assertions failures
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);
function my_assert_handler($file, $line, $code, $desc = null)// $ code is KO
{
$desc=($desc != null)?$desc.'<br />':'';
    echo "<hr>Assert fails:
        File '$file'<br />
        Line '$line'<br />
        $desc <hr />";
}
assert_options(ASSERT_CALLBACK, 'my_assert_handler');

?>