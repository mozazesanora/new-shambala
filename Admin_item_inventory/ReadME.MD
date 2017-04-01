1. import table
2. Add to routes.php

//Admin Item Management
$route['adm1n/inventory/item'] = 'Admin_item_inventory';
$route['adm1n/inventory/item/insert'] ='Admin_item_inventory/insert';
$route['adm1n/inventory/item/update'] ='Admin_item_inventory/update';
$route['adm1n/inventory/item/generate_code'] ='Admin_item_inventory/select_print';
$route['adm1n/inventory/item/delete/(:any)'] ='Admin_item_inventory/delete/$1';

3.
