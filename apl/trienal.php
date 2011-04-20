<?php

// Operações relativas as instituições de ensino superior (IES)

/** Listagem de todas as instituições de ensino
 */
Router::get('trienal/:id', function($id) {
	$dbh =& DB::handler();
	$sql = 'SELECT a.nivel,a.nota,a.ano,a.nome as programa,
				   a2.nome as area,i.sigla,i.nome as ies,i.uf
			FROM avaliacao a JOIN ies i ON (a.ies=i.id) JOIN areas a2 ON (a2.id=a.area)
			WHERE i.id=?';
	$sth = $dbh->prepare($sql);
	$sth->execute(array($id));
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	Router::dispose($result);
});
