<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Culqi {
    public function charge($token,$price,$email,$name){
        require 'Requests/library/Requests.php';
        Requests::register_autoloader();
        require 'culqi-php/lib/culqi.php';
        
        
        $SECRET_KEY = "sk_test_a97f34f9b293a02a";
        $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
        
        $charge = $culqi->Charges->create(
                array(
                  "amount" => $price,
                  "capture" => true,
                  "currency_code" => "PEN",
                  "description" => "Venta de Producto y/o Servicios",
                  "email" => "$email",
                  "installments" => 0,
                  "antifraud_details" => array(
                      "country_code" => "PE",
                      "first_name" => "$name",
                  ),
                  "source_id" => "$token"
                )
            );
        return $charge;
    }
}

