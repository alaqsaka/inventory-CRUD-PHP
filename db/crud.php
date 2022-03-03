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
        function insertItem($itemsname, $price, $quantity, $description, $sellersname, $sellerscontact, $dot, $gambar){
            try {
                // defined sql statement to be executed
                
                $sql = "INSERT INTO inventory (itemsname, price, quantity, description, sellersname, sellerscontact, dateoftransaction, gambar) VALUES (:itemsname, :price, :quantity, :description, :sellersname, :sellerscontact, :dateoftransaction, :gambar)";
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
                $stmt->bindparam(':gambar', $gambar);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;

            }
        }

        public function editItems($id,$itemsname, $price, $quantity, $description, $sellersname, $sellerscontact, $dot){
            try {
                $sql = "UPDATE inventory SET itemsname=:itemsname, quantity=:quantity, price=:price,description=:description,sellersname=:sellersname,sellerscontact=:sellerscontact,dateoftransaction=:dot WHERE item_id = :id";
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholdes to the actual values
                
                $stmt->bindparam(':itemsname', $itemsname);
                $stmt->bindparam(':quantity', $quantity);
                $stmt->bindparam(':price', $price);
                $stmt->bindparam(':description', $description);
                $stmt->bindparam(':sellersname', $sellersname);
                $stmt->bindparam(':sellerscontact', $sellerscontact);
                $stmt->bindparam(':dot', $dot);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getItems(){
            try {
                $sql = "SELECT * FROM `inventory`;";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
             
            
        }

        public function deleteItems($id){
            try {
                $sql = "DELETE FROM inventory where item_id = :id";

                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getItemDetails($id){
            try {
                $sql = "SELECT * from inventory where item_id = :id";

                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getLatestItemsRegistered(){
            try {
                $sql = "SELECT * FROM `inventory` ORDER BY item_id DESC LIMIT 1;";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
?>