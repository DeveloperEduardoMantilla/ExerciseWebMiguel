<?php
    function from(DateTimeImmutable $date): DateTimeImmutable
    {
        $giga = 1e9; // = 1000000000
        return $date->modify("+{$giga} seconds");
    }
?>