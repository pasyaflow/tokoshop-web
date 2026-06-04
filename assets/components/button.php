<?php
function button($text, $bgColor = '#111111', $textColor = '#ffffff') {
    echo '<button class="btn" style="--bg: ' . $bgColor . '; --text: ' . $textColor . ';">';
    echo '<span>' . $text . '</span>';
    echo '</button>';
}
?>