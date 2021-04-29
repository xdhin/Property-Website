<?php
session_start();


session_destroy();
echo'<script>alert("You have successfully logout")</script>';
echo'<script>window.location.href = "Homepage.html"</script>';
?>