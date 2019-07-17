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
   * Get all deliveries
   *
   *
   * @param string $filter
   * @return mixed
   */
  public function listDeliveries($job_status, $job_type)
  {
    return $this->setEndpoint($this->getEndpoint() . 'viewTask')
      ->setMethod('GET')
      ->setParams([
        'jobStatus' => $job_status,
        'jobType' => $job_type
      ])
      ->setMethod('POST')
      ->send();
  }
  
    /**
   *
   * Get a quote
   *
   * https://developers.paps.sn/quotes#get-quote
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
