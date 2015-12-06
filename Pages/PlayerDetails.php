<div class="enter-effect">

	<h1 class="page-header">Player Statistics <small><?php echo '('.$_GET['name'].')'; ?></small></h1>
	<ol class="breadcrumb">
	    <li><a href="" onClick="loadDoc('Home'); return false;">Home</a></li>
	    <li><a href="" onClick="loadDoc('Statistics'); return false;">Statistics</a></li>
	    <li><?php echo $_GET['name']; ?></li>
	</ol>

	<?php

	// Gets an array of all json file names (including '.' and '..')
	$directory = '../database/war-history/json';

	// Remove the '.' and '..' from the array
	$scanned_directory = array_diff(scandir($directory), array('..', '.'));

	?>

	<table class="table table-striped table-bordered table-hover dt-responsive members-table">
		<thead>
			<tr>
				<th>War Number</th>
				<th>Attack #</th>
				<th>Damage</th>
				<th>Enemy</th>
				<th>Enemy Clan</th>
				<th>Stars Won</th>
				<th>Stars Earned</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($scanned_directory as $warFile) : ?>
			<?php 
				$str = file_get_contents('../database/war-history/json/'.$warFile);
				$json = json_decode($str, true);
			?>
				<?php foreach ($json['home']['roster'] as $roster) : ?>
					<?php if ($roster['name'] === $_GET['name']) : ?>
						<?php if ($roster['attack1'] !== "") : ?>
							<tr>
								<td><a onclick="loadWar('<?php echo $json['id'] ?>')" class="pointer"><?php echo $json['id']; ?></a></td>
								<td>Attack 1</td>
								<td><?php echo $roster['attack1']['damage']; ?></td>
								<td><?php echo $roster['attack1']['targetPosition'].'. '.$roster['attack1']['target']; ?></td>
								<td><?php echo $json['enemy']['name']; ?></td>
								<td><?php echo $roster['attack1']['starsWon']; ?></td>
								<td><?php echo $roster['attack1']['starsEarned']; ?></td>
							</tr>
						<?php endif; ?>	
						<?php if ($roster['attack2'] !== "") : ?>
							<tr>
								<td><a onclick="loadWar('<?php echo $json['id'] ?>')" class="pointer"><?php echo $json['id']; ?></a></td>
								<td>Attack 2</td>
								<td><?php echo $roster['attack2']['damage']; ?></td>
								<td><?php echo $roster['attack2']['targetPosition'].'. '.$roster['attack2']['target']; ?></td>
								<td><?php echo $json['enemy']['name']; ?></td>
								<td><?php echo $roster['attack2']['starsWon']; ?></td>
								<td><?php echo $roster['attack2']['starsEarned']; ?></td>
							</tr>
						<?php endif; ?>	
					<?php endif; ?>	
				<?php endforeach; ?>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>