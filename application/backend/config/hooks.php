<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$hook['post_controller'] = array(
    'class' => 'beforeFilter',
    'function' => 'chechAuthenticationForValidRedirection',
    'filename' => 'beforeFilter.php',
    'filepath' => 'hooks',
);

?>
