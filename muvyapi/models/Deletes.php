<?php
    class Deletes {
        // DB stuff
        private $conn;
        private $seriesTable        = 'series';
        private $singleTable        = 'singles';
        private $seasonNoTable      = 'seasonNo';
        private $charactersTable        = 'characters';
        private $subtitleTable      = 'subtitle';
        private $discriptionTable   = 'discription';

        //  DELETE properties
        public $movieName;
        public $category;
        public $coverPic;
        public $language;
        public $subtitle;
        public $movieFile;
        public $characters;
        public $discription;
        public $noOfEpisodes;
        public $seasonNo;
        public $id;

        // constructor with DB
        public function __construct($db){
            $this->conn = $db;
        }
        
        // DELETE single movies
        public function Deletesingle() {
            // DELETE query
            $query = 'DELETE FROM ' . $this->singleTable . '
                WHERE 
                    id = :id
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->id        = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':id', $this->id);

            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // DELETE subtitles
        public function Deletesubtitle() {
            // DELETE query
            $query = 'DELETE FROM ' . $this->subtitleTable . '
                WHERE
                    id = :id
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->id           = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':id',    $this->id);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // DELETE discriptions
        public function DELETEdiscription() {
            // DELETE query
            $query = 'DELETE FROM ' . $this->discriptionTable . '
                WHERE
                    id = :id
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->id = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':id', $this->id);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // DELETE characters
        public function DELETEcharacters() {
            // DELETE query
            $query = 'DELETE FROM ' . $this->charactersTable . '
                WHERE
                    id = :id  
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->id = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':id', $this->id);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }


        // DELETE seasonNo
        public function DeleteseasonNo() {
            // DELETE query
            $query = 'DELETE FROM ' . $this->seasonNoTable . '
                WHERE
                    id = :id 
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->id = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':id', $this->id);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // DELETE series movies
        public function Deleteseries() {
            // DELETE query
            $query = 'DELETE FROM ' . $this->seriesTable . '
                WHERE
                    id = :id
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->id = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':id', $this->id);

            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }
    }
?>