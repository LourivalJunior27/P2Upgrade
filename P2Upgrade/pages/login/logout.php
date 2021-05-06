<?php

if (isset($_POST['btnLogout'])) {
  session_destroy();
  header('Location: home');
}
