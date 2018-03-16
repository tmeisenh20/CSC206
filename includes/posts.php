<?php

/**
 * Class to handle interaction with the posts table in the database.
 * This class will make use of the database connection created when a
 * script initializes.
 */


class Stories
{

    /**
     * Current connection to database
     *
     * @var null
     */
    private $db = null;

    /**
     * List of valid fields and their types for this table
     *
     * @var array
     */
    private $whiteList = ['role_id' => 'int',
        'content' => 'varchar',
        'endDate' => 'varchar',
        'startDate' => 'varchar',
        'image' => 'varchar',
        'title' => 'varchar',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
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
    }


    /**
     * Get user data for a specific user using the id
     *
     * @param $id
     * @return mixed
     */
    public function getPost($id)
    {

        $sql = 'select * from stories where id = ' . $id . ';';

        $result = $this->db->query($sql);

        return $result;

    }

    /**
     * Return all users.  If th active parameter is supplied,
     * return only the active or inactive users as appropriate
     *
     * @param null $active
     * @return mixed
     */
    public function getPosts($active = null)
    {

        $sql = 'select * from stories';

        if (!is_null($active)) {
            $sql .= ' where isActive = ' . $active . ';';
        } else {
            $sql .= ';';
        }

        $result = $this->db->query($sql);

        return $result->fetchAll();
    }


    public function create($data)
    {

        $sql = 'INSERT into stories ({{fields}}) VALUES ({{values}})';

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

    public function update($data)
    {

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

        $sql = 'update stories set isActive=0 where id = ' . $id . ';';

        $result = $this->db->query($sql);

        return $result;

    }

    private function clean($data)
    {

        foreach ($data as $key => $value) {
            if (!array_key_exists($key, $this->whiteList)) {
                unset($data[$key]);
            }
        }
        return $data;
    }

    private function buildFieldsList($data)
    {

        $fields = '';

        foreach ($data as $key => $value) {
            $fields .= $key . ', ';
        }

        $fields = substr($fields, 0, strlen($fields) - 2);

        return $fields;

    }

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

                $values .= "'" . $value . "', ";
            }
        }

        $values = substr($values, 0, strlen($values) - 2);

        return $values;

    }


}