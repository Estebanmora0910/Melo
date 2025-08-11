<?php
require_once __DIR__ . '/../Modelo/ClienteModel.php';

$clientes = ClienteModel::obtenerClientes();
include __DIR__ . '/../Vista/html/lista_clientes.php';
