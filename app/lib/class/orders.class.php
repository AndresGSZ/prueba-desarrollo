<?php

class Orders extends DBTools
{
    public function setOrders($data)
    {

        

    }
    public function getOrders($data)
    {
        $query = "SELECT * FROM orders WHERE 1 ";

        if (array_key_exists('origen', $data)) {
            $query .= " AND origen LIKE '%{$data['origen']}%'";
        }

        if (array_key_exists('destino', $data)) {
            $query .= " AND destino LIKE '%{$data['destino']}%'";
        }

        if (array_key_exists('salida', $data)) {
            $query .= " AND salida LIKE '%{$data['salida']}%'";
        }

        if (array_key_exists('retorno', $data)) {
            $query .= " AND retorno LIKE '%{$data['retorno']}%'";
        }

        if (array_key_exists('total', $data)) {
            $query .= " AND total LIKE '%{$data['total']}%'";
        }

        if (array_key_exists('fecha', $data)) {
            $query .= " AND fecha LIKE '%{$data['fecha']}%'";
        } else if (array_key_exists('inicio_fecha', $data) && array_key_exists('final_fecha', $data) && !empty($data['inicio_fecha'])) {
            $query .= " AND fecha BETWEEN '{$data['inicio_fecha']}' AND '{$data['final_fecha']}'";
        }

        if (array_key_exists('hora', $data)) {
            $query .= " AND hora LIKE '%{$data['hora']}%'";
        }

        return $this->exec($query);
    }
}
