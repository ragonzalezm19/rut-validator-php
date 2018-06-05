<?php

namespace Ragonzalezm19\RutValidator;

class RutValidator
{

  public function __construct()
  {

  }

  public static function validate($rut)
  {
    $rut = strtolower($rut);
    $array_rut = explode('-', $rut);
    $rut_invertido = array_reverse(str_split($array_rut[0]));
    $dv = $array_rut[1];
    $multiplicador = 2;
    $array_rut_multiplicado = [];

    foreach ($rut_invertido as $digito) {
      array_push($array_rut_multiplicado, $digito * $multiplicador);
      if($multiplicador == 7)
      {
        $multiplicador = 2;
      }
      else
      {
        $multiplicador++;
      }
    }

    $suma = 0;

    foreach ($array_rut_multiplicado as $elemento) {
      $suma = $suma + $elemento;
    }

    $mod = $suma % 11;

    $dv_final = 11 - $mod;

    switch ($dv_final) {
      case '10':
        $dv_final = 'k';
        break;
      
      case '11':
        $dv_final = 0;
        break;
    }

    
    $rut_validado = $array_rut[0] . '-' . $dv_final;

    if ($rut == $rut_validado)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
}