<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

class Sms_gateway {

    protected $_ci;
    protected $db_smsconfig = "sms_config";

    public function __construct() {

        $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
    }

    public function send_sms($data) {
        $get_smsconfig = $this->_ci->db->query('select * from ' . $this->db_smsconfig . ' where id_sms=1')->result();
        // Configure client
        $config = Configuration::getDefaultConfiguration();
        $config->setApiKey('Authorization', $get_smsconfig[0]->sms_token);
        $apiClient = new ApiClient($config);
        $messageClient = new MessageApi($apiClient);

        // Sending a SMS Message
        $sendMessageRequest = new SendMessageRequest([
            'phoneNumber' => $data['no_hp'],
            'message' => $data['pesan'],
            'deviceId' => $get_smsconfig[0]->device_id
        ]);

        $sendMessages = $messageClient->sendMessages([
            $sendMessageRequest
        ]);

        if ($sendMessages) { // Jika Email berhasil dikirim
            $response = TRUE;
        } else { // Jika Email Gagal dikirim
            $response = FALSE;
        }
        return $response;
    }

}
