<?php

class DataBase
{

    private $dbhost = 'localhost';
    private $dbname = 'iltis';
    private $user = 'iltis';
    private $password = 'P@$$w0rd';

    public function ExecuteWithResultData($sql)
    {
    }

    public function ExecuteNonQuery($sql)
    {
        // Create connection
        $conn = new mysqli($this->dbhost, $this->user, $this->password, $this->dbname);

        // Check connection
        if ($conn->connect_error) {

            die("Connection failed: " . $conn->connect_error);
        }

        $conn->query($sql);
    }



    public function ExecuteScalar($sql)
    {

        // Create connection
        $conn = new mysqli($this->dbhost, $this->user, $this->password, $this->dbname);

        // Check connection
        if ($conn->connect_error) {

            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            if ($row = $result->fetch_row()) {

                return $row[0];
            }
        }
        return null;
        $conn->close();
    }

    public function ExecuteList($sql)
    {
        // Create connection
        $conn = new mysqli($this->dbhost, $this->user, $this->password, $this->dbname);

        // Check connection
        if ($conn->connect_error) {

            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);
        $returningList = array();

        if ($result->num_rows > 0) {
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                array_push($returningList, $row);
            }
        }
        $conn->close();
        return $returningList;
    }
}
