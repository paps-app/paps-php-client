<?php

namespace Paps\Resources;

class Delivery extends AbstractResource
{
    /**
     * Delivery Status Event Type
     */
    const EVENT_DELIVERY_STATUS = 'event.delivery_status';

    /**
     * Courier Update Event Type
     */
    const EVENT_COURIER_UPDATE = 'event.courier_update';

    /**
     * Pickup is being happening status
     */
    const STATUS_PICKUP = 'pickup';

    /**
     * Pickup has been completed status
     */
    const STATUS_PICKUP_COMPLETE = 'pickup_complete';

    /**
     * Dropoff is being happening status
     */
    const STATUS_DROPOFF = 'dropoff';

    /**
     * Delivery has been completed status
     */
    const STATUS_DELIVERED = 'delivered';

    /**
     * Base endpoint for Deliveries
     *
     * @var string
     */
    // protected $endpoint = 'createPickupAndDelivery';
    // protected $endpoint = 'customers/[customer_id]/deliveries';

    /**
     * Create a new delivery
     *
     * https://developers.paps.sn/create#créer-une-tâche-de-pickup-et-delivery-liés
     *
     * @param array $delivery_params
     * @return mixed
     */
    public function create(array $delivery_params = [])
    {
        return $this->setEndpoint($this->getEndpoint() . 'createPickupAndDelivery')
            ->setParams($delivery_params)
            ->setMethod('POST')
            ->send();
    }

    /**
     * Create a new delivery for an app user (monespace.paps.sn)
     *
     * https://developers.paps.sn/create#créer-une-tâche-de-pickup-et-delivery-liés
     *
     * @param string $email
     * @param array $pickup_params
     * @param array $delivery_params
     * @return mixed
     */
    public function createTaskForAPIUser(
        $email = string,
        array $pickup_params = [],
        array $delivery_params = []
    ) {
        $pickup_params = array_map(function ($array) {
            return (object) $array;
        }, $pickup_params);

        $delivery_params = array_map(function ($array) {
            return (object) $array;
        }, $delivery_params);

        return $this->setEndpoint($this->getEndpoint() . 'createTasksWithClientApp')
            ->setParams([
                'email' => $email,
                'pickups' => $pickup_params,
                'deliveries' => $delivery_params
            ])
            ->setMethod('POST')
            ->send();
    }

    /**
     * Get all deliveries from a date range
     *
     * @param string $date
     * @param string $start_date
     * @param string $end_date
     * @param string $select_by
     * @return mixed
     */
    public function listDeliveries(
        $date = string,
        $start_date = string,
        $end_date = string,
        $select_by = string
    ) {
        return $this->setEndpoint($this->getEndpoint() . 'viewAllTasksDetails')
            ->setParams([
                'date' => $date,
                'startDate' => $start_date,
                'endDate' => $end_date,
                'selectBy' => $select_by
            ])
            ->setMethod('GET')
            ->send();
    }

    /**
     *
     * Get a quote
     *
     * https://developers.paps.sn/get-quotes
     *
     * @param array $quotes_params
     * @return mixed
     */
    public function submitQuotesRequest(array $quotes_params = [])
    {
        return $this->setEndpoint($this->getEndpoint() . 'getQuotes')
            ->setParams($quotes_params)
            ->setMethod('GET')
            ->send();
    }

    /**
     * Get a delivery by id
     *
     * https://developers.paps.sn/handle#visualiser-les-infos-sur-une-tâche
     *
     * @param string $task_id
     * @return mixed
     */
    public function get($task_id)
    {
        return $this->setEndpoint($this->getEndpoint() . 'viewTask')
            ->setParams([
                'id' => $task_id
            ])
            ->setMethod('GET')
            ->send();
    }

    /**
     * Cancel a delivery
     *
     * https://developers.paps.sn/handle#annuler-une-tâche
     *
     * @param string $delivery_id
     * @return mixed
     */
    public function cancel($task_id)
    {
        return $this->setEndpoint($this->getEndpoint() . 'cancelTask')
            ->setParams([
                'id' => $task_id
            ])
            ->setMethod('POST')
            ->send();
    }
}
