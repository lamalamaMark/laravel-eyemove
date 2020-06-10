<?php

namespace LamaLama\EyeMove;

class Leads extends EyeMove
{
    /**
    * Create.
    *
    * @return void
    */
    public function create(array $params)
    {
        $xml = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Header>
                    <AuthHeader xmlns="http://ws.eye-move.nl/Lead">
                        <Username>'.config('eyemove.username').'</Username>
                        <Password>'.config('eyemove.password').'</Password>
                        <Customer>'.config('eyemove.customer').'</Customer>
                    </AuthHeader>
                </soap:Header>
                <soap:Body>
                    <Add xmlns="http://ws.eye-move.nl/Lead">
                        <Gegevens>
                            <Emailadres>'.$params['email'].'</Emailadres>
                            <Naam>'.$params['last_name'].'</Naam>
                            <TelefoonnummerPrive>'.$params['phone'].'</TelefoonnummerPrive>
                            <Voornamen>'.$params['first_name'].'</Voornamen>
                        </Gegevens>
                    </Add>
                </soap:Body>
            </soap:Envelope>';

        $response = $this->post('lead.asmx', $xml);

        return ($result = $this->hasResult($response))
            ? $result
            : false;
    }

    /**
     * hasResult.
     * @param  string  $response
     * @return boolean
     */
    private function hasResult(string $response)
    {
        $obj = simplexml_load_string($response);

        return $obj->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children('http://ws.eye-move.nl/Lead')->AddResponse->AddResult->Resultaat;
    }
}
