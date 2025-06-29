<!-- first run this php file and add generated hashed password in login.txt -->
<?php
echo password_hash('admin123', PASSWORD_DEFAULT) . "\n";
?>
