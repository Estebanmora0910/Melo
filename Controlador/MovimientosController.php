<?php
require_once __DIR__ . '/../Modelo/MovimientosModel.php';

$movimientos = MovimientosModel::obtenerMovimientos();

include __DIR__ . '/../Vista/html/movimientos.php';
