<?php
/**
 * Class to handle interaction with the users table in the database.
 * This class will make use of the database connection created when a
 * script initializes.
 */
class User
{
    /**
     * Currenct connection to database
     *
     * @var null
     */
    private $db = null;
    private $table = 'users';
    /**
     * List of valid fields and their types for this table
     *
     * @var array
     */
    private $whiteList = [
        'id' => 'int',
        'role_id' => 'int',
        'firstName' => 'varchar',
        'middleName' => 'varchar',
        'lastName' => 'varchar',
        'address1' => 'varchar',
        'address2' => 'varchar',
        'city' => 'varchar',
        'state' => 'varchar',
        'zip' => 'varchar',
        'password' => 'varchar',
        'phone' => 'varchar',
        'email' => 'varchar',
        'isActive' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    /**
     * Constructor that stores the database connection.
     *
     * User constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
        $this->table = 'users';
    }
    /**
     * Get user data for a specific user using the id
     *
     * @param $id
     * @return mixed
     */
    public function getUser($id)
    {
        $sql = 'select * from ' . $this->table .' where id = ' . $id . ';';
        $result = $this->db->query($sql);
        return $result->fetch();
    }
    /**
     * Return all users.  If the active parameter is supplied,
     * return only the active or inactive users as appropriate
     *
     * @param null $active
     * @return mixed
     */
    public function getUsers($active = null)
    {
        $sql = 'select * from ' . $this->table;
        if (!is_null($active)) {
            $sql .= ' where isActive = ' . $active . ';';
        } else {
            $sql .= ';';
        }
        $result = $this->db->query($sql);
        return $result;
    }
    /**
     * Take the form data, process it and then execute the SQL INSERT command
     * to add the row to the database
     */
    public function create($data)
    {
        // Not used yet but a required field so stuff it with something
        $data['role_id'] = 1;
        $sql = 'INSERT into ' . $this->table .' ({{fields}}) VALUES ({{values}})';
        // Remove any fields that aren't in the white list
        $cleanData = $this->clean($data);
        // Build the list of fields that will be inserted into the table
        $fields = $this->buildFieldsList($cleanData);
        $sql = str_replace('{{fields}}', $fields, $sql);
        // Build the list of values that will be inserted into the table
        $values = $this->buildValuesList($cleanData);
        $sql = str_replace('{{values}}', $values, $sql);
        // Insert the data
        $result = $this->db->query($sql);
        return $result;
    }
    /**
     * This method will retrieve the user from the database,
     * update the values with what was submitted in the form
     * and then execute the UPDATE SQL command to update the row
     * in the table
     */
    public function update($data)
    {
        $sql = "update users set firstName = '" . $data['firstName'] . "', lastName = '" . $data['lastName'] . "' where id = " . $data['id'] . ';';
        $result = $this->db->query($sql);
        return $result;
    }
    /**
     * Delete a user with a given ID by deactivating them
     * Set the isActive = 0 to deactivate
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $sql = 'update users set isActive=0 where id = ' . $id . ';';
        $result = $this->db->query($sql);
        return $result;
    }
    /**
     * Compares form data with the white list of fields
     * and removes any form fields that aren't in the
     * white list.  This prevents an attack by submitting
     * invluad fields with malicious data
     *
     */
    private function clean($data)
    {
        foreach ($data as $key => $value) {
            if (!array_key_exists($key, $this->whiteList)) {
                unset($data[$key]);
            }
        }
        return $data;
    }
    /**
     * Loops through the form data and creates the list of field names
     * that came from the form.  This will be used in the insert and update
     * statements to identify the fields used in the query.
     */
    private function buildFieldsList($data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . ', ';
        }
        $fields = substr($fields, 0, strlen($fields) - 2);
        return $fields;
    }
    /**
     * Loops through the form data and creates the list of values
     * that came from the form.  This will be used in the insert and update
     * statements to identify the values that will be stored in the database.
     */
    private function buildValuesList($data)
    {
        $values = '';
        $w = $this->whiteList;
        // If the values are numeric then add value to list.  If string then also add the
        foreach ($data as $key => $value) {
            if (in_array($w[$key], ['int', 'float'])) {
                $values .= $value . ', ';
            } else {
                // Escape the string to handle special characters
                $value = $this->db->escape_string($value);
                // Append the value to the string and add a , and sapce to the string
                $values .= "'" . $value . "', ";
            }
        }
        // Remove the trailing , and space from the string
        $values = substr($values, 0, strlen($values) - 2);
        return $values;
    }
}