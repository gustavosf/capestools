<?php

// Operações relativas as instituições de ensino superior (IES)

/** Listagem de todas as instituições de ensino
 */
Router::get('ies/list', function() {
	$dbh =& DB::handler();
	$result = $dbh->query('SELECT * FROM ies')->fetchAll(PDO::FETCH_ASSOC);
	Router::dispose($result);
});

/** Informações sobre uma instituição de ensino em particular
 * 
 * int id * Número de identificação da instituição de ensino no BD
 */
Router::get('ies/:id', function($id) {
	$dbh =& DB::handler();
	$sth = $dbh->prepare('SELECT * FROM ies WHERE id=?');
	$sth->execute(array($id));
	$result = $sth->fetch(PDO::FETCH_ASSOC);
	Router::dispose($result);
});


