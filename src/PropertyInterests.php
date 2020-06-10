<?php

namespace LamaLama\EyeMove;

class PropertyInterests
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
                    <AuthHeader xmlns="http://ws.eye-move.nl/WoningInteresse">
                        <Username>'.config('eyemove.username').'</Username>
                        <Password>'.config('eyemove.password').'</Password>
                        <Customer>'.config('eyemove.customer').'</Customer>
                    </AuthHeader>
                </soap:Header>
                <soap:Body>
                    <Add xmlns="http://ws.eye-move.nl/WoningInteresse">
                        <Gegevens>
                            <RelatieID>'.$params['id'].'</RelatieID>
                            <WoningID>'.$params['propertyId'].'</WoningID>
                            <Afgevallen>false</Afgevallen>
                            <Datum>'.date('Y-m-d').'T00:00:00</Datum>
                        </Gegevens>
                    </Add>
                </soap:Body>
            </soap:Envelope>';

        $response = $this->curlEyemove($xml, '/WoningInteresse.asmx');
        $obj = simplexml_load_string($response);

        return ($result = $obj->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children('http://ws.eye-move.nl/WoningInteresse')->AddResponse->AddResult->Succeeded) {
            ? $result
            : false;
    }
}
