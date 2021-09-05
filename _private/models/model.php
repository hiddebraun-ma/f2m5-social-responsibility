<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function getUsers() {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `users`";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}
