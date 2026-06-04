<?php
function iconButton($text, $icon = '', $bgColor = '#111111', $textColor = '#ffffff') {
    echo '<button class="btn-icon" style="--bg: ' . $bgColor . '; --text: ' . $textColor . ';">';
    if ($icon) {
        echo '<i data-lucide="' . $icon . '"></i> ';
    }
    echo '<span>' . $text . '</span>';
    echo '</button>';
}
?>