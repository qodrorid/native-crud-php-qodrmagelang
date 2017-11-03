<?php

    // untuk filtering data agar
    // tag php/js/html gk masuk
    function filterData($value) {
        return htmlspecialchars(strip_tags($value));
    }

?>