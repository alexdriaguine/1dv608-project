<?php


namespace model;

require_once("src/app/model/PubRepository.php");


class PubDAL extends BaseDAL {

    private static $table = "pubs"; // change when real table is setup


    public function __construct() {
        parent::__construct();
    }

    public function getPubs() {

        try {
            $stmt = $this->conn->prepare("SELECT * FROM " . self::$table);

            if (!$stmt) {
                throw new \Exception($this->conn->error);
            }

            $stmt->execute();

            $stmt->bind_result($id, $name, $address, $webpageURL);

            //TODO: Not return array
            $pubs = new \model\PubRepository();


            while ($stmt->fetch()) {
                $pub = new Pub($id, $name, $address, $webpageURL);
                $pubs->add($pub);
            }

            return $pubs;

        } catch (\DataBaseException $e) {
            if (\Settings::DEBUG_MODE) {
                throw $e;
            } else {
                error_log($e->getMessage() . "\n", 3, \Settings::ERROR_LOG);
                echo "Something went wrong when connecting to the database";
                die();
            }
        }


    }

    public function getPubByID($id) {

        try {
            $stmt = $this->conn->prepare("SELECT * FROM " . self::$table . "WHERE pubid=?");
            $stmt->bind_param("s", $id);
            if (!$stmt) {
                throw new \Exception($this->conn->error);
            }

            $stmt->execute();

            $stmt->bind_result($id, $name, $address, $webpageURL);

            $stmt->fetch();

            return Pub($id, $name, $address, $webpageURL);
        } catch (\DataBaseException $e) {
            if (\Settings::DEBUG_MODE) {
                throw $e;
            } else {
                error_log($e->getMessage() . "\n", 3, \Settings::ERROR_LOG);
                echo "Something went wrong when connecting to the database";
                die();
            }
        }

    }

}