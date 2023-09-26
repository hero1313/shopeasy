<?php

namespace App\Payments;

use App\Events\OrderReceived;
use App\Events\OrderRejected;

use App\Models\Order;
use Exception;

abstract class payzeabstract {
    protected $config;
    protected $fqdn;
    protected $kovzyFqdn;
    protected Int $payment_type;

    public function __construct(Object $config) {
        $this->validateConfig($config);
        $this->config = $config;
        $this->prepare();
    }

    protected abstract function validateConfig(Object $config) : void;
    protected abstract function prepare() : void;

    public abstract function pay(Object $args) : Object;
    public abstract function refund(Object $args) : void;
    public abstract function get(Object $args) : Object;

    // public abstract function getOrderStatus(Order $order) : object;


    // protected function orderStatusUpdated(Order $order) : void
    // {
    //     if($order->payment_status === 1) {
    //         OrderReceived::dispatch($order);
    //     } else if($order->payment_status === -1 || $order->payment_status === -2) {
    //         OrderRejected::dispatch($order);
    //     }
    // }

    // public function updateOrderStatus(Order $order) : bool {

    //     $result = $this->getOrderStatus($order);
    //     $order->payment_status = $result->status;
    //     $order->payment_data = json_encode(['data' => $result->data]);
    //     $order->save();
        
    //     $this->orderStatusUpdated($order);
    //     return $result->success;
    // }
}
