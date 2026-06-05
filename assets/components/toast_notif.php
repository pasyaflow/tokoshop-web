<?php
function toastNotification() {
    echo '
    <style>
        .toast-box {
            position: fixed;
            top: -150px;
            left: 50%;
            transform: translateX(-50%);
            background: #0d0f0e;
            color: #ffffff;
            padding: 14px 24px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 99999;
            font-size: 14px;
            font-weight: 500;
            transition: top 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .toast-box.show {
            top: 30px;
        }

        .toast-icon {
            color: #28a745;
            width: 18px;
            height: 18px;
        }
    </style>

    <div id="toast-notification" class="toast-box">
        <i data-lucide="check-circle" class="toast-icon"></i>
        <span id="toast-message">Product added successfully!</span>
    </div>
    ';
}
?>