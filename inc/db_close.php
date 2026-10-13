<?php

if (isset($result)) {
    mysqli_free_result($result);
}

if (isset($connection)) {
    mysqli_close($connection);
}