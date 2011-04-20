<?php

// Relativo ás areas listadas pela CAPES

/** Lista todas as áreas */
Router::get('areas/list', function() {
	$dbh =& DB::handler();
	$result = $dbh->query('SELECT * FROM areas')->fetchAll(PDO::FETCH_ASSOC);
	Router::dispose($result);
});
