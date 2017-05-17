<?php
/* ********************************************************************************
 * The content of this file is subject to the VTE Notepad ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */

/**
 * Class VTENotepad_Record_Model
 */
class VTENotepad_Record_Model extends Vtiger_Record_Model
{
    /**
     * Function to get the Detail View url for the record
     * @return string - Record Detail View Url
     */
    public function getDetailViewUrl()
    {
        return 'index.php?module=VTENotepad&view=Edit&record=' . $this->getId();
    }

    /**
     * @param $id
     * @param $data
     * @return Vtiger_Record_Model
     */
    public function save($id, $data)
    {
        $db = PearDatabase::getInstance();
        $sql = null;
        $params = array();
        $timestamp = date('Y-m-d H:i:s', time());
        $columnNames = array('name', 'content', 'description', 'deleted', 'user_id', 'created', 'updated');

        if ($id) {
            $data = array_merge($data, array(
                'updated' => $timestamp
            ));

            $sqlPart2 = "";
            foreach ($data as $name => $value) {
                if (in_array($name, $columnNames)) {
                    $sqlPart2 .= " {$name}=?,";
                }

                $params[] = $value;
            }

            /**
             * Remove the last "," character from string
             * @link http://stackoverflow.com/questions/5592994/remove-the-last-character-from-string
             */
            $sqlPart2 = rtrim($sqlPart2, ',');

            $sqlPart3 = "WHERE id=?";
            $params[] = $id;

            $sql = "UPDATE vtiger_vtenotepad SET {$sqlPart2} {$sqlPart3}";
        } else {
            $data = array_merge($data, array(
                'created' => $timestamp,
                'updated' => $timestamp
            ));

            $sqlPart2 = " (";
            $sqlPart3 = " (";

            foreach ($data as $name => $value) {
                if (in_array($name, $columnNames)) {
                    $sqlPart2 .= " {$name},";
                    $sqlPart3 .= "?,";
                }

                $params[] = $value;
            }

            /**
             * Remove the last "," character from string
             * @link http://stackoverflow.com/questions/5592994/remove-the-last-character-from-string
             */
            $sqlPart2 = rtrim($sqlPart2, ',');
            $sqlPart2 .= ") ";
            $sqlPart3 = rtrim($sqlPart3, ',');
            $sqlPart3 .= ") ";

            $sql = "INSERT INTO vtiger_vtenotepad $sqlPart2 VALUES $sqlPart3";
        }

        // When false
        if (!$db->pquery($sql, $params)) {
            return null;
        }

        $recordId = ($id) ? $id : $db->getLastInsertID();
        return $this->getById($recordId);
    }

    /**
     * @param $id
     * @return Vtiger_Record_Model
     */
    public function getById($id)
    {
        $db = PearDatabase::getInstance();
        $instances = array();
        $sql = "SELECT * FROM vtiger_vtenotepad WHERE id=? AND deleted != 1 ORDER BY id LIMIT 1";
        $params = array($id);
        $rs = $db->pquery($sql, $params);
        if ($db->num_rows($rs)) {
            while ($data = $db->fetch_array($rs)) {
                $instances[] = new self($data);
            }
        }
        return (count($instances) > 0) ? $instances[0] : null;
    }

    /**
     * @param $userId
     * @return Vtiger_Record_Model
     */
    public function findByUserId($userId)
    {
        $db = PearDatabase::getInstance();
        $instances = array();
        $sql = "SELECT * FROM vtiger_vtenotepad WHERE user_id=? AND deleted != 1 ORDER BY id LIMIT 1";
        $params = array($userId);
        $rs = $db->pquery($sql, $params);
        if ($db->num_rows($rs)) {
            while ($data = $db->fetch_array($rs)) {
                $instances[] = new self($data);
            }
        }
        return (count($instances) > 0) ? $instances[0] : null;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $db = PearDatabase::getInstance();
        $sql = null;
        $stamp = date('Y-m-d H:i:s', time());

        $sql = "UPDATE vtiger_vtenotepad SET deleted=1, updated=? WHERE id=?";
        $params = array($stamp, $id);
        $result = $db->pquery($sql, $params);
        return $result ? true : false;
    }

}