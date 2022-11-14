<?php
namespace NTTData\Practice\Block\Test\Productlist;

use NTTData\Practice\Block\Test\Productlist;

class Products extends Productlist
{
    public function getBlock()
	{
		echo '<h3>' . get_class($this) . '</h3>';
	}
}
