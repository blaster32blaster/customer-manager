<?php

namespace App\Repositories;

/**
 * Interface Repository
 * @package App\Repositories
 */
interface Repository
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param $id
     * @return mixed
     */
    public function show($id);
}