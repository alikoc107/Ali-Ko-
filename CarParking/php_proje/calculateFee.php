<?php
function calculateFee($entry_time, $exit_time)
{
    $entryTimestamp = strtotime($entry_time);
    $exitTimestamp = strtotime($exit_time);
    $timeDiff = ($exitTimestamp - $entryTimestamp) / 60;
    $fee = $timeDiff * 2;

    return $fee;
}
?>
