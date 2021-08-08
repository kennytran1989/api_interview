<?php
namespace App\Repository\Mysql;
class BaseRepository {
    public function dataReturn($data, $mess, $pagination = '')
    {
        $result = [
            'status'    => true,
            'message'   => $mess,
            'data'      => $data,
        ];
        !empty($pagination) ? $result['pagination'] = $pagination : $result;
        return $result;
    }
}
