<?php

namespace App\Repositories;

use App\Models\Subscription;

/**
 * Class SubscriptionRepository
 * @package App\Repositories
 */
class SubscriptionRepository implements Repository
{
    /**
     * @var Subscription $subscription
     */
    protected $subscription;

    /**
     * SubscriptionRepository constructor.
     * @param Subscription $subscription
     */
    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->subscription->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->subscription->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $sub = $this->find($id);
        return $sub->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->subscription->destroy($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->subscription->findOrFail($id);
    }
}