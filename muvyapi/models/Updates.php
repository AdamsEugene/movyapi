<?php
    class Updates {
        // DB stuff
        private $conn;
        private $seriesTable        = 'series';
        private $singleTable        = 'singles';
        private $seasonNoTable      = 'seasonNo';
        private $charactersTable        = 'characters';
        private $subtitleTable      = 'subtitle';
        private $discriptionTable   = 'discription';

        //  Update properties
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
        
        // Update single movies
        public function UpdateSingle() {
            // Update query
            $query = 'UPDATE ' . $this->singleTable . '
                SET
                    movieName = :movieName,
                    category  = :category,
                    language  = :language,
                    movieFile = :movieFile,
                    coverPic = :coverPic
                WHERE 
                    id = :id
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName = htmlspecialchars(strip_tags($this->movieName));
            $this->category  = htmlspecialchars(strip_tags($this->category));
            $this->language  = htmlspecialchars(strip_tags($this->language));
            $this->movieFile = htmlspecialchars(strip_tags($this->movieFile));
            $this->coverPic = htmlspecialchars(strip_tags($this->coverPic));
            $this->id        = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':movieName', $this->movieName);
            $stmt->bindParam(':category',  $this->category);
            $stmt->bindParam(':language',  $this->language);
            $stmt->bindParam(':movieFile', $this->movieFile);
            $stmt->bindParam(':coverPic', $this->coverPic);
            $stmt->bindParam(':id', $this->id);

            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // Update subtitles
        public function UpdateSubtitle() {
            // Update query
            $query = 'UPDATE ' . $this->subtitleTable . '
                SET
                    movieName    = :movieName,
                    subtitle  = :subtitle
                WHERE
                    id = :id
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName    = htmlspecialchars(strip_tags($this->movieName));
            $this->subtitle     = htmlspecialchars(strip_tags($this->subtitle));
            $this->id           = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':movieName',    $this->movieName);
            $stmt->bindParam(':subtitle',  $this->subtitle);
            $stmt->bindParam(':id',    $this->id);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // Update discriptions
        public function Updatediscription() {
            // Update query
            $query = 'UPDATE ' . $this->discriptionTable . '
                SET
                    movieName = :movieName,
                    discription  = :discription
                WHERE
                    id = :id
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName = htmlspecialchars(strip_tags($this->movieName));
            $this->discription  = htmlspecialchars(strip_tags($this->discription));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':movieName', $this->movieName);
            $stmt->bindParam(':discription',  $this->discription);
            $stmt->bindParam(':id', $this->id);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // Update characters
        public function Updatecharacters() {
            // Update query
            $query = 'UPDATE ' . $this->charactersTable . '
                SET
                    movieName = :movieName,
                    characters    = :characters
                WHERE
                    id = :id  
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName = htmlspecialchars(strip_tags($this->movieName));
            $this->characters    = htmlspecialchars(strip_tags($this->characters));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':movieName', $this->movieName);
            $stmt->bindParam(':characters',    $this->characters);
            $stmt->bindParam(':id', $this->id);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }


        // Update seasonNo
        public function UpdateSeasonNo() {
            // Update query
            $query = 'UPDATE ' . $this->seasonNoTable . '
                SET
                    movieName = :movieName,
                    seasonNo  = :seasonNo
                WHERE
                    id = :id 
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName = htmlspecialchars(strip_tags($this->movieName));
            $this->seasonNo  = htmlspecialchars(strip_tags($this->seasonNo));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':movieName', $this->movieName);
            $stmt->bindParam(':seasonNo',  $this->seasonNo);
            $stmt->bindParam(':id', $this->id);
            
            // execute
            if($stmt->execute()){
                return true;
            }else{
                printf('Error: %s.\n', $stmt->error);
                return false;
            }
        }



        // Update series movies
        public function UpdateSeries() {
            // Update query
            $query = 'UPDATE ' . $this->seriesTable . '
                SET
                    movieName = :movieName,
                    category  = :category,
                    language  = :language,
                    movieFile = :movieFile,
                    coverPic = :coverPic
                WHERE
                    id = :id
                ';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // clean up data
            $this->movieName = htmlspecialchars(strip_tags($this->movieName));
            $this->category  = htmlspecialchars(strip_tags($this->category));
            $this->language  = htmlspecialchars(strip_tags($this->language));
            $this->movieFile = htmlspecialchars(strip_tags($this->movieFile));
            $this->coverPic = htmlspecialchars(strip_tags($this->coverPic));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // bind data ie :something
            $stmt->bindParam(':movieName', $this->movieName);
            $stmt->bindParam(':category',  $this->category);
            $stmt->bindParam(':language',  $this->language);
            $stmt->bindParam(':movieFile', $this->movieFile);
            $stmt->bindParam(':coverPic', $this->coverPic);
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