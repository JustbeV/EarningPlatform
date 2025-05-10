<?php
// function generatePassword($length = 12) {
//     $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $lower = 'abcdefghijklmnopqrstuvwxyz';
//     $numbers = '0123456789';
//     $symbols = '!@#$%^&*()-_=+[]{}<>?';
//     $password = '';
//     $password .= $upper[random_int(0, strlen($upper) - 1)];
//     $password .= $lower[random_int(0, strlen($lower) - 1)];
//     $password .= $numbers[random_int(0, strlen($numbers) - 1)];
//     $password .= $symbols[random_int(0, strlen($symbols) - 1)];
//     $all = $upper . $lower . $numbers . $symbols;
//     for ($i = 4; $i < $length; $i++) {
//         $password .= $all[random_int(0, strlen($all) - 1)];
//     }
//     return str_shuffle($password);
// }

function isValidPassword($password) {
    $hasUppercase = preg_match('@[A-Z]@', $password);
    $hasLowercase = preg_match('@[a-z]@', $password);
    $hasNumber    = preg_match('@[0-9]@', $password);
    $hasSpecial   = preg_match('@[^\w]@', $password); // non-word character = symbol

    return $hasUppercase && $hasLowercase && $hasNumber && $hasSpecial;
}
?>
