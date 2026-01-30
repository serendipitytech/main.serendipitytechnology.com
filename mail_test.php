<?php
if (mail('troy.shimkus@gmail.com', 'Test Subject', 'Test body', 'From: troy@serendipitytech.net')) {
    echo 'Mail sent';
} else {
    echo 'Mail failed';
}
?>