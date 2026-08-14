<?php

namespace App\PHPMailer;

// Thin shim over the composer-managed PHPMailer package so legacy
// `App\PHPMailer\*` imports keep working after the Laravel 11 upgrade.
class OAuth extends \PHPMailer\PHPMailer\OAuth
{
}
