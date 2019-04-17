<?php

namespace App;

class App {

    /** @var const $DATABASE_MODE pode assumir dois valores
    *   DATABASE_MODE = 'SESSION;
    *   DATABASE_MODE = 'SQLITE';
    **/

    const DATABASE_MODE = 'SQLITE';

    const PATH_SQLITE = 'model/DBContato.sqlite';
}
