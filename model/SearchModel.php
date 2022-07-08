<?php

namespace model;

class SearchModel
{
    public function buscar($q)
    {
        $db=db();
        $where=[
            'message[~]'=>$q
        ];
        return $db->select('messages', '*', $where);
    }
}
