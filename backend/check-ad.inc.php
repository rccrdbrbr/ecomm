<?php

require_once 'dbh.inc.php';
require_once 'functions/functions-check-ad.inc.php';

eliminaAnnunci($conn);
eliminaAnnunciOsservati($conn);
