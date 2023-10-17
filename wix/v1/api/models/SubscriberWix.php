<?php

class SubscriberWix
{
    private $subscribers;
    private $allUsers= [];
    private $individual = [];
    private $empresa;

    public function __construct($subscribers)
    {
        try {
            $this->subscribers = $subscribers;
            $this->parseSubscribers();
        } catch (Exception $e) {
            http_response_code(500); // Error interno del servidor
            throw new Exception($e->getMessage());
        }
    }

    public function getCompradorData() {
        $datos = $this->subscribers['data'];
        $email_parts = explode('@', $datos['contact.Email[0]']);
        $contact_name = $email_parts[0];
        $resultado = array(
            'contact_id' => $datos['contact.Id'],
            'contact_name' => "",
            'contact_email' => $datos['contact.Email[0]'],
            'paidplan_title' => $datos['paidplan.title'],
            'paidplan_startdate' => $datos['paidplan.startdate'],
            'paidplan_subscriptionid' => $datos['paidplan.subscriptionid'],
            'paidplan_id' => $datos['paidplan.id'],
            'paidplan_orderid' => $datos['paidplan.orderid'],
            'paidplan_price' => $datos['paidplan.price'],
            'paidplan_paymentmethod' => $datos['paidplan.paymentmethod']
        );

        return $resultado;
    }

    public function getEmpresa()
    {
        return $this->empresa;
    }

    public function getAllUsers()
    {
        return $this->allUsers;
    }

    public function getIndividuales()
    {
        return $this->individual;
    }

    public function getIndividual($id)
    {
        $key = 'contact.Email[' . $id . ']';
        return isset($this->subscribers['data'][$key]) ? $this->subscribers['data'][$key] : null;
    }

    // Métodos privados
    private function parseSubscribers()
    {
        $data = $this->subscribers['data'];
        $contactEmailKeys = $this->filterAndSortKeys($data);
        $this->empresa = $data[$contactEmailKeys[0]];
        $this->createIndividualArray($data, $contactEmailKeys);
        $this->createAllUsersArray($data, $contactEmailKeys);
    }

    private function filterAndSortKeys($data)
    {
        $contactEmailKeys = array_filter(array_keys($data), function ($key) {
            return strpos($key, 'contact.Email[') !== false;
        });
        usort($contactEmailKeys, array($this, 'sortKeys'));
        return $contactEmailKeys;
    }

    private function sortKeys($a, $b)
    {
        preg_match('/\[(\d+)\]/', $a, $matchesA);
        preg_match('/\[(\d+)\]/', $b, $matchesB);
        return intval($matchesA[1]) - intval($matchesB[1]);
    }

    private function createIndividualArray($data, $contactEmailKeys)
    {
        array_shift($contactEmailKeys); // Eliminar el primer elemento del array
        $this->individual = array();
        foreach ($contactEmailKeys as $index => $key) {
            $this->individual["user" . ($index + 1)] = $data[$key];
        }
    }

    private function createAllUsersArray($data, $contactEmailKeys)
    {
        $this->allUsers = array();
        foreach ($contactEmailKeys as $index => $key) {
            $this->allUsers["user" . ($index + 1)] = $data[$key];
        }
    }

}
