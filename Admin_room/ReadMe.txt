1.rootes.php
//Admin Room Managemen
$route['adm1n/inventory/room'] = 'Admin_room';
$route['adm1n/inventory/room/form/(:any)/(:num)'] = 'Admin_room/form/$1/$2';
$route['adm1n/inventory/room/form/(:any)/(:num)/comment/delete/(:num)'] = 'Admin_room/comment_delete/$2/$3';
$route['adm1n/inventory/room/add'] = 'Admin_room/insert';
$route['adm1n/inventory/room/edit'] = 'Admin_room/update';
$route['adm1n/inventory/room/delete/(:num)'] = 'Admin_room/delete/$1';

2.ADD this to menu_inventory
<ul class="sub-menu">
                            <li class="{menu_room}">
                                <a href="<?php echo base_url(); ?>adm1n/inventory/room">
                                    <span class="title"><i class="fa fa-home"></i> Room Manajement</span>
                                </a>                                
                            </li>                            
                        </ul>
3.impoort table