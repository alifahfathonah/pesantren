<?php  

function summarize($data) 
{
	// var_dump($data);
	// exit;
	$tax_total 		= 0;
	$grand_total 	= 0;
	$quantities 	= 0;
	$outlets		= [];		
	foreach ($data as $row)
	{
		if (!isset($outlets['outlet-' . $row->outlet_id]))
		{
			$outlets['outlet-' . $row->outlet_id] = [
				'tax_total'		=> 0,
				'grand_total'	=> 0,
				'quantities'	=> 0,
				'id'			=> $row->outlet_id
			];
		}

		$total 		= $row->grand_total;
		$quantity	= $row->quantities;
		if (count($total) > 0 && count($quantity) > 0)
		{
			$tax = ($row->tax / 100) * $total[0]->total;
			$grand_total += $total[0]->total;
			$tax_total += $tax;
			$quantities += $quantity[0]->quantities;
			$outlets['outlet-' . $row->outlet_id]['tax_total'] += $tax;
			$outlets['outlet-' . $row->outlet_id]['grand_total'] += $total[0]->total;
			$outlets['outlet-' . $row->outlet_id]['quantities'] += $quantity[0]->quantities;
		}
	}

	return [
		'tax_total'			=> $tax_total,
		'grand_total'		=> $grand_total,
		'quantities'		=> $quantities,
		'outlets'			=> $outlets,
		'transaction_total'	=> count($data)
	];
}