<?php

function number_to_rp($num, $prefix = 'Rp.') {
	return $prefix . ' ' . number_format($num, 2, ',', '.');
}