<?php

namespace App\Services\Admin\Tags;

interface TagInterface
{
    public function get($ignore = null, $with_tree = false);

    public function find($id);

    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
