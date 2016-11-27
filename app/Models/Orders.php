<?php

namespace App\Models;

/**
 * Description of User
 *
 * @author nitins
 */
class Orders extends MasterModel
{

    /**
     * 
     * @return type
     */
    public function orders()
    {
        $sql = "SELECT user_guid, first_name, last_name, email, phone FROM users";
        $query = $this->db->query($sql);
        $result = [];
        while ($row = $query->fetch_assoc())
        {
            $result[] = $row;
        }
        return $result;
    }

    /**
     * 
     * @param type $user_guid
     * @return type $user 
     */
    public function get_order_by_guid($order_guid)
    {
        $sql = "SELECT order_guid, order_total, created_at, status FROM orders WHERE order_guid='$order_guid'";
        $query = $this->db->query($sql);
        return $query->fetch_assoc();
    }

}
