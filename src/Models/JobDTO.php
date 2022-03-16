<?php

declare(strict_types=1);



namespace PapsAPILib\Models;

use stdClass;

class JobDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private $jobType;

    /**
     * @var AddressDTO
     */
    private $jobAddress;

    /**
     * @var string
     */
    private $jobDate;

    /**
     * @var string
     */
    private $jobSlotStart;

    /**
     * @var string
     */
    private $jobSlotEnd;

    /**
     * @var string
     */
    private $jobTime;

    /**
     * @var string
     */
    private $jobVehicleType;

    /**
     * @param string $jobType
     * @param AddressDTO $jobAddress
     * @param string $jobDate
     * @param string $jobSlotStart
     * @param string $jobSlotEnd
     * @param string $jobTime
     * @param string $jobVehicleType
     */
    public function __construct(
        string $jobType,
        AddressDTO $jobAddress,
        string $jobDate,
        string $jobSlotStart,
        string $jobSlotEnd,
        string $jobTime,
        string $jobVehicleType
    ) {
        $this->jobType = $jobType;
        $this->jobAddress = $jobAddress;
        $this->jobDate = $jobDate;
        $this->jobSlotStart = $jobSlotStart;
        $this->jobSlotEnd = $jobSlotEnd;
        $this->jobTime = $jobTime;
        $this->jobVehicleType = $jobVehicleType;
    }

    /**
     * Returns Job Type.
     *
     * The type of the job.
     */
    public function getJobType(): string
    {
        return $this->jobType;
    }

    /**
     * Sets Job Type.
     *
     * The type of the job.
     *
     * @required
     * @maps job_type
     */
    public function setJobType(string $jobType): void
    {
        $this->jobType = $jobType;
    }

    /**
     * Returns Job Address.
     *
     * The address of the job.
     */
    public function getJobAddress(): AddressDTO
    {
        return $this->jobAddress;
    }

    /**
     * Sets Job Address.
     *
     * The address of the job.
     *
     * @required
     * @maps job_address
     */
    public function setJobAddress(AddressDTO $jobAddress): void
    {
        $this->jobAddress = $jobAddress;
    }

    /**
     * Returns Job Date.
     *
     * The date of the job.
     */
    public function getJobDate(): string
    {
        return $this->jobDate;
    }

    /**
     * Sets Job Date.
     *
     * The date of the job.
     *
     * @required
     * @maps job_date
     */
    public function setJobDate(string $jobDate): void
    {
        $this->jobDate = $jobDate;
    }

    /**
     * Returns Job Slot Start.
     *
     * The slot start of the job.
     */
    public function getJobSlotStart(): string
    {
        return $this->jobSlotStart;
    }

    /**
     * Sets Job Slot Start.
     *
     * The slot start of the job.
     *
     * @required
     * @maps job_slot_start
     */
    public function setJobSlotStart(string $jobSlotStart): void
    {
        $this->jobSlotStart = $jobSlotStart;
    }

    /**
     * Returns Job Slot End.
     *
     * The slot end of the job.
     */
    public function getJobSlotEnd(): string
    {
        return $this->jobSlotEnd;
    }

    /**
     * Sets Job Slot End.
     *
     * The slot end of the job.
     *
     * @required
     * @maps job_slot_end
     */
    public function setJobSlotEnd(string $jobSlotEnd): void
    {
        $this->jobSlotEnd = $jobSlotEnd;
    }

    /**
     * Returns Job Time.
     *
     * The time to pickup of the job.
     */
    public function getJobTime(): string
    {
        return $this->jobTime;
    }

    /**
     * Sets Job Time.
     *
     * The time to pickup of the job.
     *
     * @required
     * @maps job_time
     */
    public function setJobTime(string $jobTime): void
    {
        $this->jobTime = $jobTime;
    }

    /**
     * Returns Job Vehicle Type.
     *
     * The type of vehicle used for the job.
     */
    public function getJobVehicleType(): string
    {
        return $this->jobVehicleType;
    }

    /**
     * Sets Job Vehicle Type.
     *
     * The type of vehicle used for the job.
     *
     * @required
     * @maps job_vehicle_type
     */
    public function setJobVehicleType(string $jobVehicleType): void
    {
        $this->jobVehicleType = $jobVehicleType;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        $json['job_type']         = $this->jobType;
        $json['job_address']      = $this->jobAddress;
        $json['job_date']         = $this->jobDate;
        $json['job_slot_start']   = $this->jobSlotStart;
        $json['job_slot_end']     = $this->jobSlotEnd;
        $json['job_time']         = $this->jobTime;
        $json['job_vehicle_type'] = $this->jobVehicleType;

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
