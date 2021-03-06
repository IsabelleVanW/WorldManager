<?php
/*  Guild Manager v1.1.0 (Princesse d’Ampshere)
	Guild Manager has been designed to help Guild Wars 2 (and other MMOs) guilds to organize themselves for PvP battles.
    Copyright (C) 2013  Xavier Olland

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>. */
$page_date = date('Y-m-d', time() );

echo "<div id='Menu'>
		<h5>".$lng[g__menu]."</h5>
			<h6 style='margin-left:5px;'>";
				$sql="SELECT d.$local AS module, m.page, m.date
				FROM ".$gm_prefix."module AS m
				LEFT JOIN ".$gm_prefix."dictionary AS d ON d.table_ID=m.module_ID AND d.entity_name='module' 
				WHERE m.active=1 AND m.admin!=1
				ORDER BY m.rank" ;
				$list=mysqli_query($con,$sql);
				while($result=mysqli_fetch_array($list,MYSQLI_ASSOC))
				{ echo "<a class='menu' href='".$result['page']; 
				if($result['date']==1){echo "?date=".$page_date;};
				echo "'>".$result['module']."</a><br />";};
				
				//Admin Menu / Menu admin
				if (in_array($user->data['group_id'],$cfg_groups_backoffice))
				{ $sql="SELECT d.$local AS module, m.page, m.date
				FROM ".$gm_prefix."module AS m
				LEFT JOIN ".$gm_prefix."dictionary AS d ON d.table_ID=m.module_ID AND d.entity_name='module' 
				WHERE m.active=1 AND m.admin=1
				ORDER BY m.rank" ;
				$list=mysqli_query($con,$sql);
				while($result=mysqli_fetch_array($list,MYSQLI_ASSOC))
				{ echo "<a class='menu' href='".$result['page']; 
				if($result['date']==1){echo "?date=".$page_date;};
				echo "'>".$result['module']."</a><br />";};};
				
				echo "
				<br />
				<br />
			</h6>
			<h6 style='text-align:right'>
				<a class='menu' href='../index.php'>".$lng[g__return]."</a>
			</h6>
</div>"
?>