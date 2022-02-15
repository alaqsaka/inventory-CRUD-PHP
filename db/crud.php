<?php 
    class crud { 
        // private database object
        private $db; 

        // constructor to initialize private variable to the databse connection
        function __construct($conn)
        {   
            // accessing private variable
            $this->db = $conn;
        }

        // Function to insert a new record into the inveontory database
        public function insert($itemsname, $price, $quantity, $description, $sellersname, $sellerscontact, $dot){
            try {
                // defined sql statement to be executed
                $sql = "INSERT INTO inventory (itemsname, price, quantity, description, sellersname, sellerscontact, dateoftransaction) VALUES (:itemsname, :price, :quantity, :description, :sellersname, :sellerscontact, :dateoftransaction)";
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholdes to the actual values
                $stmt->bindparam(':itemsname', $itemsname);
                $stmt->bindparam(':price', $price);
                $stmt->bindparam(':quantity', $quantity);
                $stmt->bindparam(':description', $description);
                $stmt->bindparam(':sellersname', $sellersname);
                $stmt->bindparam(':sellerscontact', $sellerscontact);
                $stmt->bindparam(':dateoftransaction', $dot);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;

            }
        }
    }
?>