<?php
    class Creates {
        // DB stuff
        private $conn;
        private $seriesTable        = 'series';
        private $singleTable        = 'singles';
        private $seasonNoTable      = 'seasonNo';
        private $charactersTable        = 'characters';
        private $subtitleTable      = 'subtitle';
        private $discriptionTable   = 'discription';

        //  create properties
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
        public $createdAt;

        // constructor with DB
        public function __construct($db){
            $this->conn = $db;
        }
        
        // create single movies
        public function createSingle() {
            // create query
            $query = 'INSERT INTO ' . $this->singleTable . '
                SET
                    movieName = :movieName,
                    category  = :category,
                    language  = :language,
                    movieFile = :movieFile,
                    coverPic  = :coverPic
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName = htmlspecialchars(strip_tags($this->movieName));
            $this->category  = htmlspecialchars(strip_tags($this->category));
            $this->language  = htmlspecialchars(strip_tags($this->language));
            $this->movieFile = htmlspecialchars(strip_tags($this->movieFile));
            $this->coverPic  = htmlspecialchars(strip_tags($this->coverPic));

            // bind data ie :something
            $stmt->bindParam(':movieName', $this->movieName);
            $stmt->bindParam(':category',  $this->category);
            $stmt->bindParam(':language',  $this->language);
            $stmt->bindParam(':movieFile', $this->movieFile);
            $stmt->bindParam(':coverPic', $this->coverPic);

            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // create subtitles
        public function createSubtitle() {
            // create query
            $query = 'INSERT INTO ' . $this->subtitleTable . '
                SET
                    movieName    = :movieName,
                    subtitle  = :subtitle
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName    = htmlspecialchars(strip_tags($this->movieName));
            $this->subtitle  = htmlspecialchars(strip_tags($this->subtitle));
            // $this->createdAt    = htmlspecialchars(strip_tags($this->createdAt));

            // bind data ie :something
            $stmt->bindParam(':movieName',    $this->movieName);
            $stmt->bindParam(':subtitle',  $this->subtitle);
            // $stmt->bindParam(':createdAt',    $this->createdAt);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // create discriptions
        public function creatediscription() {
            // create query
            $query = 'INSERT INTO ' . $this->discriptionTable . '
                SET
                    movieName = :movieName,
                    discription  = :discription
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName = htmlspecialchars(strip_tags($this->movieName));
            $this->discription  = htmlspecialchars(strip_tags($this->discription));
            // $this->createdAt = htmlspecialchars(strip_tags($this->createdAt));

            // bind data ie :something
            $stmt->bindParam(':movieName', $this->movieName);
            $stmt->bindParam(':discription',  $this->discription);
            // $stmt->bindParam(':createdAt', $this->createdAt);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // create characters
        public function createcharacters() {
            // create query
            $query = 'INSERT INTO ' . $this->charactersTable . '
                SET
                    movieName = :movieName,
                    characters    = :characters  
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName = htmlspecialchars(strip_tags($this->movieName));
            $this->characters    = htmlspecialchars(strip_tags($this->characters));
            // $this->createdAt = htmlspecialchars(strip_tags($this->createdAt));

            // bind data ie :something
            $stmt->bindParam(':movieName', $this->movieName);
            $stmt->bindParam(':characters',    $this->characters);
            // $stmt->bindParam(':createdAt', $this->createdAt);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }


        // create seasonNo
        public function createSeasonNo() {
            // create query
            $query = 'INSERT INTO ' . $this->seasonNoTable . '
                SET
                    movieName = :movieName,
                    seasonNo  = :seasonNo 
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName = htmlspecialchars(strip_tags($this->movieName));
            $this->seasonNo  = htmlspecialchars(strip_tags($this->seasonNo));
            // $this->createdAt = htmlspecialchars(strip_tags($this->createdAt));

            // bind data ie :something
            $stmt->bindParam(':movieName', $this->movieName);
            $stmt->bindParam(':seasonNo',  $this->seasonNo);
            // $stmt->bindParam(':createdAt', $this->createdAt);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // create series movies
        public function createSeries() {
            // create query
            $query = 'INSERT INTO ' . $this->seriesTable . '
                SET
                    movieName = :movieName,
                    category  = :category,
                    language  = :language,
                    movieFile = :movieFile,
                    coverPic  = :coverPic
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName = htmlspecialchars(strip_tags($this->movieName));
            $this->category  = htmlspecialchars(strip_tags($this->category));
            $this->language  = htmlspecialchars(strip_tags($this->language));
            $this->movieFile = htmlspecialchars(strip_tags($this->movieFile));
            $this->coverPic = htmlspecialchars(strip_tags($this->coverPic));

            // bind data ie :something
            $stmt->bindParam(':movieName', $this->movieName);
            $stmt->bindParam(':category',  $this->category);
            $stmt->bindParam(':language',  $this->language);
            $stmt->bindParam(':movieFile', $this->movieFile);
            $stmt->bindParam(':coverPic', $this->coverPic);

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