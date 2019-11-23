<?php
    class Reads {
        // DB stuff
        private $conn;
        private $seriesTable        = 'series';
        private $singleTable        = 'singles';
        private $seasonNoTable      = 'seasonNo';
        private $charactersTable    = 'characters';
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

        // constructor with DB
        public function __construct($db){
            $this->conn = $db;
        }

        // get single movies
        public function getSingleMovies() {
            $query = 'SELECT 
                    sm.id, 
                    sm.movieName,
                    sm.language,
                    sm.category, 
                    sm.movieFile,
                    sm.createdAt,
                    sm.coverPic,
                    a.characters as characters,
                    s.subtitle as subtitle,
                    d.discription as discription
                FROM 
                    ' . $this->singleTable . ' sm
                LEFT JOIN '
                    . $this->charactersTable .' a ON sm.movieName = a.movieName
                LEFT JOIN '
                    . $this->subtitleTable .' s ON sm.movieName = s.movieName
                LEFT JOIN '
                    . $this->discriptionTable .' d ON sm.movieName = d.movieName
                ORDER BY sm.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute
            $stmt->execute();

            return $stmt;
        }


        // get only one single movie
        public function getOneMovie() {
            $query = 'SELECT 
                    sm.id, 
                    sm.movieName,
                    sm.language,
                    sm.category, 
                    sm.movieFile,
                    sm.createdAt,
                    sm.coverPic,
                    a.characters as characters,
                    s.subtitle as subtitle,
                    d.discription as discription
                FROM 
                    ' . $this->singleTable . ' sm
                LEFT JOIN '
                    . $this->charactersTable .' a ON sm.movieName = a.movieName
                LEFT JOIN '
                    . $this->subtitleTable .' s ON sm.movieName = s.movieName
                LEFT JOIN '
                    . $this->discriptionTable .' d ON sm.movieName = d.movieName
                WHERE sm.id = ? LIMIT 0,1';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind ID to ?
            $stmt->bindParam(1, $this->id);
            
            // Execute
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set properties
            $this->id           = $row['id'];
            $this->movieName    = $row['movieName'];
            $this->language     = $row['language'];
            $this->category     = $row['category'];
            $this->movieFile    = $row['movieFile'];
            $this->discription  = $row['discription'];
            $this->characters   = $row['characters'];
            $this->subtitle     = $row['subtitle'];
            $this->createdAt    = $row['createdAt'];
            $this->coverPic     = $row['coverPic'];
        }




        // get series movies
        public function getSeriesMovies() {
            $query = 'SELECT 
                    sm.id, 
                    sm.movieName,
                    sm.language,
                    sm.category, 
                    sm.movieFile,
                    sm.createdAt,
                    sm.coverPic,
                    n.seasonNo as seasonNumber,
                    a.characters as characters,
                    s.subtitle as subtitle,
                    d.discription as discription
                FROM 
                    ' . $this->seriesTable . ' sm
                LEFT JOIN '
                    . $this->seasonNoTable .' n ON sm.movieName = n.movieName    
                LEFT JOIN '
                    . $this->charactersTable .' a ON sm.movieName = a.movieName
                LEFT JOIN '
                    . $this->subtitleTable .' s ON sm.movieName = s.movieName
                LEFT JOIN '
                    . $this->discriptionTable .' d ON sm.movieName = d.movieName
                ORDER BY sm.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute
            $stmt->execute();

            return $stmt;
        }


        // get only one series movie
        public function getOneSeries() {
            $query = 'SELECT 
                    sm.id, 
                    sm.movieName,
                    sm.language,
                    sm.category, 
                    sm.movieFile,
                    sm.createdAt,
                    sm.coverPic,
                    n.seasonNo as seasonNumber,
                    a.characters as characters,
                    s.subtitle as subtitle,
                    d.discription as discription
                FROM 
                    ' . $this->singleTable . ' sm
                LEFT JOIN '
                    . $this->seasonNoTable .' n ON sm.movieName = n.movieName       
                LEFT JOIN '
                    . $this->charactersTable .' a ON sm.movieName = a.movieName
                LEFT JOIN '
                    . $this->subtitleTable .' s ON sm.movieName = s.movieName
                LEFT JOIN '
                    . $this->discriptionTable .' d ON sm.movieName = d.movieName
                WHERE sm.id = ? LIMIT 0,1';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind ID to ?
            $stmt->bindParam(1, $this->id);
            
            // Execute
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set properties
            $this->id           = $row['id'];
            $this->movieName    = $row['movieName'];
            $this->language     = $row['language'];
            $this->category     = $row['category'];
            $this->movieFile    = $row['movieFile'];
            $this->seasonNo     = $row['seasonNumber'];
            $this->discription  = $row['discription'];
            $this->characters       = $row['characters'];
            $this->subtitle     = $row['subtitle'];
            $this->createdAt    = $row['createdAt'];
            $this->coverPic     = $row['coverPic'];
        }



        // get discription
        public function getDiscription() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.discription,
                    d.createdAt
                FROM 
                    ' . $this->discriptionTable . ' d
                ORDER BY d.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute
            $stmt->execute();

            return $stmt;
        }


        // get subtitle
        public function getSubtitle() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.Subtitle,
                    d.createdAt
                FROM 
                    ' . $this->subtitleTable . ' d
                ORDER BY d.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute
            $stmt->execute();

            return $stmt;
        }


        // get series number
        public function getseasonNo() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.seasonNo,
                    d.createdAt
                FROM 
                    ' . $this->seasonNoTable . ' d
                ORDER BY d.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute
            $stmt->execute();

            return $stmt;
        }


        // get characters
        public function getcharacters() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.characters,
                    d.createdAt
                FROM 
                    ' . $this->charactersTable . ' d
                ORDER BY d.createdAt DESC';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute
            $stmt->execute();

            return $stmt;
        }



        // get only one discription movie
        public function getOneDiscription() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.discription as discription,
                    d.createdAt as createdAt
                FROM 
                    ' . $this->discriptionTable . ' d
                WHERE d.id = ? LIMIT 0,1';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind ID to ?
            $stmt->bindParam(1, $this->id);
            
            // Execute
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set properties
            $this->id           = $row['id'];
            $this->movieName    = $row['movieName'];
            $this->discription  = $row['discription'];
            $this->createdAt    = $row['createdAt'];
        }


        // get only one characters
        public function getOnecharacters() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.characters as characters,
                    d.createdAt as createdAt
                FROM 
                    ' . $this->charactersTable . ' d
                WHERE d.id = ? LIMIT 0,1';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind ID to ?
            $stmt->bindParam(1, $this->id);
            
            // Execute
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set properties
            $this->id           = $row['id'];
            $this->movieName    = $row['movieName'];
            $this->characters  = $row['characters'];
            $this->createdAt    = $row['createdAt'];
        }



        // get only one subtitle movie
        public function getOnesubtitle() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.subtitle as subtitle,
                    d.createdAt as createdAt
                FROM 
                    ' . $this->discriptionTable . ' d
                WHERE d.id = ? LIMIT 0,1';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind ID to ?
            $stmt->bindParam(1, $this->id);
            
            // Execute
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set properties
            $this->id           = $row['id'];
            $this->movieName    = $row['movieName'];
            $this->subtitle  = $row['subtitle'];
            $this->createdAt    = $row['createdAt'];
        }


        // get only one series number
        public function getOneSeasonNo() {
            $query = 'SELECT 
                    d.id, 
                    d.movieName,
                    d.seasonNo as seasonNo,
                    d.createdAt as createdAt
                FROM 
                    ' . $this->discriptionTable . ' d
                WHERE d.id = ? LIMIT 0,1';
            
            // prepare statement
            $stmt = $this->conn->prepare($query);

            // bind ID to ?
            $stmt->bindParam(1, $this->id);
            
            // Execute
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set properties
            $this->id           = $row['id'];
            $this->movieName    = $row['movieName'];
            $this->seasonNo  = $row['seasonNo'];
            $this->createdAt    = $row['createdAt'];
        }

    }
?>
